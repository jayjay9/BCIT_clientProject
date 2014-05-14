<?php

namespace Earls\LeaseBundle\Controller;

use Earls\LeaseBundle\Entity\Landlordspropertymanagers;
use Earls\LeaseBundle\Entity\Northamericancities;
use Earls\LeaseBundle\Entity\Rentandmaintenances;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Acme\DemoBundle\Form\ContactType;

// these import the "@Route" and "@Template" annotations
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use Earls\LeaseBundle\Form\Model\RestaurantFinder;
use Earls\LeaseBundle\Form\Type\RestaurantFinderType;

use Earls\LeaseBundle\Entity\Leases;
use Earls\LeaseBundle\Entity\Leasereportsinfo;
use Earls\LeaseBundle\Entity\Reportperiodtypes;
use Earls\LeaseBundle\Entity\Liquorlicenses;
use Earls\LeaseBundle\Entity\Buildingtypes;
use Earls\LeaseBundle\Entity\Storeclasses;
use Earls\LeaseBundle\Entity\Riskinfo;
use Earls\LeaseBundle\Entity\Renewals;
use Earls\LeaseBundle\Entity\Licenses;
use Earls\LeaseBundle\Entity\Leasecriticaltasks;
use Earls\LeaseBundle\Entity\Utilities;
use Earls\LeaseBundle\Entity\Provincestate;
use Earls\LeaseBundle\Entity\Billingowners;
use Earls\LeaseBundle\Entity\Owners;
use Earls\LeaseBundle\Entity\Constructiontypes;


class SummaryController extends Controller
{
    /**
     * @Route("/", name="_summary")
     * @Template()
     */
    public function indexAction()
    {


        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery('SELECT c FROM EarlsLeaseBundle:Restaurants c');

        $data = $query->getResult();
        $restaurantID = $data[0]->getRestaurantid();

        return $this->redirect($this->generateUrl('_summary_get_id', array('id' => $restaurantID)));

    }

    /**
     * @Route("/{id}", name="_summary_get_id")
     * @Template()
     */
    public function getAction($id)
    {
        $restaurantObj = $this->getDoctrine()
            ->getRepository('EarlsLeaseBundle:Restaurants')
            ->find($id);

        $restaurantarray = array('restaurantid' => $id);


        $selectedRestaurant = new RestaurantFinder();
        $selectedRestaurant->setRestaurant($restaurantObj);
        $formRequested = $this->createForm(new RestaurantFinderType(), $selectedRestaurant);

        $request = $this->getRequest();
        $formRequested->handleRequest($request);


        /**********   MORRIS   ************/

        /********************************/
        /** Restaurant Database Branch **/
        /********************************/

        $RestaurantObj = $this->getDoctrine()
            ->getRepository('EarlsLeaseBundle:Restaurants')
            ->findoneby(array('restaurantid' => $id));

        $totalseats = (($RestaurantObj->getDiningroomseating()) +  ($RestaurantObj->getLoungeseating()) + ($RestaurantObj->getPatioseating()));
        $totaltables = (($RestaurantObj->getDiningroomtable()) +  ($RestaurantObj->getLoungetable()) + ($RestaurantObj->getPatiotable()));

        $buildingtypeObj = $RestaurantObj->getBuildingtype();
        if(empty($buildingtypeObj)){
            $buildingtypeObj = new Buildingtypes();
        }

        $buildingtype = $buildingtypeObj->getBuildingtype();

        $storeClassObj = $RestaurantObj->getStoreclassid();
        if(empty($storeClassObj)){
            $storeClassObj = new Storeclasses();
        }

        $storeClass = $storeClassObj->getStoreclass();

        $storeCity = $RestaurantObj->getCity()->getCity();

        $provincestateid = $RestaurantObj->getProvincestateid();
        if(empty($provincestateid)){
            $provincestateid = new Provincestate();
        }

        $provincestateRestaurant = $provincestateid->getDescription();

        $restaurant= array(
            'buildingtype' => $buildingtype,
            'storeclass' => $storeClass,
            'totalSeats' => $totalseats,
            'totalTables' => $totaltables,
            'city' => $storeCity,
            'provinceState' => $provincestateRestaurant
        );

        /****LANDLORD *****/
        $landlordlink = $RestaurantObj->getLandlordid();

        $LandlordObj = $this->getDoctrine()
            ->getRepository('EarlsLeaseBundle:Landlordspropertymanagers')
            ->findoneby(array('landlordpropertymanid' => $landlordlink));

        if(empty($LandlordObj)){
            $LandlordObj = new Landlordspropertymanagers();
        }

        $provincestateid = $LandlordObj->getProvincestateid();
        if(empty($provincestateid)){
            $provincestateid = new Provincestate();
        }

        $provincestateLandlord = $provincestateid->getDescription();

        /****PROPERTY MANAGER *****/

        $propertymanagerlink = $RestaurantObj->getPropertymanagerid();

        $PropertymanagerObj = $this->getDoctrine()
            ->getRepository('EarlsLeaseBundle:Landlordspropertymanagers')
            ->findoneby(array('landlordpropertymanid' => $propertymanagerlink));

        if(empty($PropertymanagerObj)){
            $PropertymanagerObj = new Landlordspropertymanagers();
        }

        $provincestateid = $PropertymanagerObj->getProvincestateid();
        if(empty($provincestateid)){
            $provincestateid = new Provincestate();
        }


        $provincestateProperty = $provincestateid->getDescription();

        $cityid = $PropertymanagerObj->getCity();
        $citiesObj = $this->getDoctrine()
            ->getRepository('EarlsLeaseBundle:Northamericancities')
            ->findOneBy(array('northamericancityid' => $cityid));

        if(empty($citiesObj)){
            $citiesObj = new Northamericancities();
        }

        $propertyCity = $citiesObj ->getCity();

        $provinceState = array(
            'provinceLandlord' => $provincestateLandlord,
            'provinceProperty' => $provincestateProperty,
            'propertyCity'  => $propertyCity
        );

        /**** LIQUOR LICENSE *****/

        $LiquorlicenseObj = $this->getDoctrine()
            ->getRepository('EarlsLeaseBundle:Liquorlicenses')
            ->findOneby(array('restaurantid' => $id));

        if(empty($LiquorlicenseObj)){
            $LiquorlicenseObj = new Liquorlicenses();
        }

        /**** LICENSE *****/
        $licenselinkObj = $RestaurantObj->getLicenseid();

        if(empty($licenselinkObj)){
            $LicenseObj = array('expirarydate' => "");
        }else{
            $licenselink = $licenselinkObj->getLicenseid();

            $LicenseObject = $this->getDoctrine()
                ->getRepository('EarlsLeaseBundle:Licenses')
                ->find($licenselink);

            if(empty($LicenseObject)){
                $LicenseObject = new Licenses();
            }

            $expiry = $LicenseObject->getExpirarydate();

            if(isset($expiry)){
                $expiryformat = $expiry->format('F d, Y');
            }else{
                $expiryformat = "";
            }

            $LicenseObj = array('expirarydate' => $expiryformat);
        }


        /**** RISK INFO *****/

        $RiskinfoObj = $this->getDoctrine()
            ->getRepository('EarlsLeaseBundle:Riskinfo')
            ->findoneby(array('restaurantid' => $id));

        if(empty($RiskinfoObj)){
            $RiskinfoObj = new Riskinfo();
        }

        $insuredbyObj = $RiskinfoObj->getInsuredby();
        if(empty($insuredbyObj)){
            $insuredbyObj = new Owners();
        }

        $insuredBy = $insuredbyObj->getOwnertype();

        $constructionObj = $RiskinfoObj->getConstructionid();
        if(empty($constructionObj)){
            $constructionObj = new Constructiontypes();
        }

        $constructiontypes = $constructionObj->getConstructiontype();

        $risk = array(
            'insuredby' => $insuredBy,
            'constructiontypes' => $constructiontypes
        );

        /**** RENT AND MAINTENANCE *****/
        $RentandMaintenanceObj = $this->getDoctrine()
            ->getRepository('EarlsLeaseBundle:Rentandmaintenances')
            ->findoneby(array('restaurantid' => $id));

        if(empty($RentandMaintenanceObj)){
            $RentandMaintenanceObj = new Rentandmaintenances();
        }

        $roofReplaceObj = $RentandMaintenanceObj->getRoofreplace();
        if(empty($roofReplaceObj)){
            $roofReplaceObj = new Owners();
        }
        $roofReplace = $roofReplaceObj->getOwnertype();

        $roofRepairObj = $RentandMaintenanceObj->getRoofrepair();
        if(empty($roofRepairObj)){
            $roofRepairObj = new Owners();
        }
        $roofRepair = $roofRepairObj->getOwnertype();

        $hvacReplaceObj = $RentandMaintenanceObj->getHvacreplace();
        if(empty($hvacReplaceObj)){
            $hvacReplaceObj = new Owners();
        }
        $hvacReplace = $hvacReplaceObj->getOwnertype();

        $hvacRepairObj = $RentandMaintenanceObj->getHvacrepair();
        if(empty($hvacRepairObj)){
            $hvacRepairObj = new Owners();
        }
        $hvacRepair = $hvacRepairObj->getOwnertype();

        $rentAndMaintenance= array(
            'roofReplace' => $roofReplace,
            'roofRepair' => $roofRepair,
            'hvacReplace' => $hvacReplace,
            'hvacRepair' => $hvacRepair
        );

        /**** UTILITIES *****/

        $UtilitiesObj1 = $this->getDoctrine()
            ->getRepository('EarlsLeaseBundle:Utilities')
            ->findoneby(array('restaurantid' => $id, 'utilitytypeid' => 1));

        if(empty($UtilitiesObj1)){
            $UtilitiesObj1 = new Utilities();
        }
        $billingObj1 = $UtilitiesObj1->getBillingBy();

        if(empty($billingObj1)){
            $billingObj1 = new BillingOwners();
        }
        $billing1 = $billingObj1->getDescription();

        $UtilitiesObj2 = $this->getDoctrine()
            ->getRepository('EarlsLeaseBundle:Utilities')
            ->findoneby(array('restaurantid' => $id, 'utilitytypeid' => 2));

        if(empty($UtilitiesObj2)){
            $UtilitiesObj2 = new Utilities();
        }

        $billingObj2 = $UtilitiesObj2->getBillingBy();
        if(empty($billingObj2)){
            $billingObj2 = new BillingOwners();
        }

        $billing2 = $billingObj2->getDescription();

        $UtilitiesObj3 = $this->getDoctrine()
            ->getRepository('EarlsLeaseBundle:Utilities')
            ->findoneby(array('restaurantid' => $id, 'utilitytypeid' => 3));

        if(empty($UtilitiesObj3)){
            $UtilitiesObj3 = new Utilities();
        }

        $billingObj3 = $UtilitiesObj3->getBillingBy();
        if(empty($billingObj3)){
            $billingObj3 = new BillingOwners();
        }

        $billing3 = $billingObj3->getDescription();

        $billing = array(
            'billing1' => $billing1,
            'billing2' => $billing2,
            'billing3' => $billing3
        );

        /**** LEASE *****/
        $leaseList = $this->getDoctrine()
            ->getRepository('EarlsLeaseBundle:Leases')
            ->findby(array('restaurantid' => $id));

        $leaseObj = end($leaseList);

        if(empty($leaseObj)){
            $leaseObj = new Leases();
        }

        $leaseDateObj = $leaseObj->getLeasedate();
        if(empty($leaseDateObj)){
            $leasedate = "";
        }else{
            $leasedate = $leaseDateObj->format('F d, Y');
        }

        $commencementDateObj = $leaseObj->getCommencementdate();
        if(empty($commencementDateObj)){
            $commencementdate = "";
        }else{
            $commencementdate = $commencementDateObj->format('F d, Y');
        }

        $renewalOptionDateObj = $leaseObj->getRenewaloptiondate();
        if(empty($renewalOptionDateObj)){
            $renewalOptionDate = "";
        }else{
            $renewalOptionDate = $renewalOptionDateObj->format('F d, Y');
        }

        $leaseDates = array(
            'leasedate' => $leasedate,
            'commencementdate' => $commencementdate,
            'renewalOptionDate' => $renewalOptionDate
        );


        /**** LEASE REPORTS *****/
        $linklease = $leaseObj->getLeaseid();

        $LeasereportsinfoObj = $this->getDoctrine()
            ->getRepository('EarlsLeaseBundle:Leasereportsinfo')
            ->findoneby(array('leaseid' => $linklease));

        if(empty($LeasereportsinfoObj)){
            $LeasereportsinfoObj = new Leasereportsinfo();
        }

        $dueDateObj = $LeasereportsinfoObj->getDuedate();
        if(empty($dueDateObj)){
            $dueDate = "";
        }else{
            $dueDate = $dueDateObj->format('F d, Y');
        }

        $reportPeriodObj = $LeasereportsinfoObj->getReporttypeid();
        if(empty($reportPeriodObj)){
            $reportPeriodObj = new Reportperiodtypes();
        }

        $reporttype = $reportPeriodObj->getPeriodtype();

        $leaseReport = array(
            'dueDate' => $dueDate,
            'periodType' => $reporttype
        );

        /**** CRITICAL TASK *****/
        $LeasecriticaltaskObj = array();

        $LeasecriticaltaskObj =$this->getDoctrine()
            ->getRepository('EarlsLeaseBundle:Leasecriticaltasks')
            ->findby(array('leaseid' => $linklease));

        if(empty($LeasecriticaltaskObj)){
            $CriticalTask = new Leasecriticaltasks();
            array_push($LeasecriticaltaskObj, $CriticalTask);
        }

        $RenewalObj = array();

        $RenewalObj =$this->getDoctrine()
            ->getRepository('EarlsLeaseBundle:Renewals')
            ->findby(array('leaseid' => $linklease));

        if(empty($RenewalObj)){
            $Renewal = new Renewals();
            array_push($RenewalObj, $Renewal);
        }


        /**********   /MORRIS   ************/

        if ($formRequested->isValid()) {
            $restaurantObjRequested = $formRequested->getData()->getRestaurant();
            $restaurantID = $restaurantObjRequested->getRestaurantid();

            return $this->redirect($this->generateUrl('_summary_get_id', array('id' => $restaurantID)));
        }

        return $this->render('EarlsLeaseBundle:Summary:index.html.twig',
            array(
                'storeFinderForm' => $formRequested->createView(),
                'restaurantarray' => $restaurantarray,
                'restaurant' => $restaurant,
                'leaseObj' => $leaseObj,
                'leaseDates' => $leaseDates,
                'RestaurantObj' => $RestaurantObj,
                'LeasereportsinfoObj' => $LeasereportsinfoObj,
                'LeaseReport' => $leaseReport,
                'RiskinfoObj' => $RiskinfoObj,
                'risk' => $risk,
                'rentAndMaintenance' => $rentAndMaintenance,
                'LandlordObj' => $LandlordObj,
                'PropertymanagerObj' => $PropertymanagerObj,
                'ProvinceState' => $provinceState,
                'LiquorlicenseObj' => $LiquorlicenseObj,
                'RenewalObj' => $RenewalObj,
                'LeasecriticaltaskObj' => $LeasecriticaltaskObj,
                'LicenseObj' => $LicenseObj,
                'UtilitiesObj1' => $UtilitiesObj1,
                'UtilitiesObj2' => $UtilitiesObj2,
                'UtilitiesObj3' => $UtilitiesObj3,
                'billing' => $billing
            )
        );


    }

    /**
     * @Route("export/{id}", name="_summary_createreport")
     * @Template()
     */
    function createReportAction($id){



        $restaurantObj = $this->getDoctrine()
            ->getRepository('EarlsLeaseBundle:Restaurants')
            ->find($id);

        $restaurantid = $restaurantObj->getRestaurantid();

        $restaurantname = $restaurantObj->getStorenickname();
        $storenumber = $restaurantObj->getStorefilenumber();
        $tenantname = $restaurantObj->getTenant();
        $storeaddress = $restaurantObj->getAddress();
        $storecity = $restaurantObj->getCity()->getCity();
        $storeprovince = $restaurantObj->getProvincestateid()->getDescription();
        $storepostalcode = $restaurantObj->getPostalzip();
        $storelegaldescription = $restaurantObj->getLegaldescription();
        $storeopen = $restaurantObj->getRestaurantstate();
        if($storeopen == 1)
        {
            $storeopen = 'YES';
        } else{
            $storeopen = 'NO';
        }
        $dateopened = $restaurantObj->getOpeningdate();



        $landlordid = $restaurantObj->getLandlordid()->getLandlordpropertymanid();

        $landlordObj = $this->getDoctrine()
            ->getRepository('EarlsLeaseBundle:Landlordspropertymanagers')
            ->find($landlordid);

        $landlordname=$landlordObj->getName();
        $landlordaddress = $landlordObj->getAddress();
        $landattention = $landlordObj->getAttention();
        $landphone = $landlordObj->getPhone();
        $landfax = $landlordObj->getFax();

        $propertymanagerid = $restaurantObj->getPropertymanagerid()->getLandlordpropertymanid();

        $propertymanagerObj = $this->getDoctrine()
            ->getRepository('EarlsLeaseBundle:Landlordspropertymanagers')
            ->find($propertymanagerid);

        $propertycompanyname = $propertymanagerObj->getName();
        $propertyaddress = $propertymanagerObj->getAddress();
        $cityid = $propertymanagerObj->getCity();
        $citiesObj = $this->getDoctrine()
            ->getRepository('EarlsLeaseBundle:Northamericancities')
            ->findOneBy(array('northamericancityid' => $cityid));

        if(empty($citiesObj)){
            $citiesObj = new Northamericancities();
        }

        $propertycity = $citiesObj ->getCity();

        $provinceStateid = $propertymanagerObj->getProvincestateid();
        $provinceStateObj = $this->getDoctrine()
            ->getRepository('EarlsLeaseBundle:Provincestate')
            ->findOneBy(array('provincestateid' => $provinceStateid));
        if(empty($provinceStateObj)){
            $provinceStateObj = new Provincestate();
        }

        $propertyprovince = $provinceStateObj ->getDescription();

        $propertypostalcode = $propertymanagerObj->getPostalzip();
        $propertyattention = $propertymanagerObj->getAttention();
        $propertyphone = $propertymanagerObj->getPhone();
        $propertyfax = $propertymanagerObj->getFax();

        ///////////////////////////////
        ////      Liquour License
        ////
        ////////////////////////////////

        //$liquorlicenseid = $restaurantObj->getLiquorlicenseid();

        $liquorlicensedObj = $this->getDoctrine()
            ->getRepository('EarlsLeaseBundle:Liquorlicenses')
            ->findOneBy(array('restaurantid' => $restaurantid));

        if(empty($liquorlicenseObj)){
            $liquorlicensedObj = new Liquorlicenses();
        }
        $liquorlicense = $liquorlicensedObj ->getLiquorlicense();

        /////////////////////////////////
        ////
        ////      License
        ////
        /////////////////////////////////
        $businesslicense = $liquorlicensedObj->getBusinesslicense();

        $licenseid = $restaurantObj->getLicenseid()->getLicenseid();
        $licenseObj = $this->getDoctrine()
            ->getRepository('EarlsLeaseBundle:Licenses')
            ->find($licenseid);

        $license = "";
        $expiry = $licenseObj->getExpirarydate();

//        $expiryformat = $expiry->format('F d, Y');
//        print_r($expiryformat);
        if(isset($expiry)){
            $expiryformat = $expiry->format('F d, Y');
        }else{
            $expiryformat = "";
        }

        $building = $restaurantObj->getBuildingtype()->getBuildingtype();

        $buildingclass = $restaurantObj->getStoreclassid()->getStoreclass();

        $diningseats = $restaurantObj->getDiningroomseating();
        $diningtables = $restaurantObj->getDiningroomtable();
        $loungeseats = $restaurantObj->getLoungeseating();
        $loungetables = $restaurantObj->getLoungetable();
        $patioseats = $restaurantObj->getPatioseating();
        $patiotables = $restaurantObj->getPatiotable();

        $totalseats = $diningseats + $loungeseats + $patioseats;
        $totaltables = $diningtables + $loungetables + $patiotables;

        $leaseList = $this->getDoctrine()
            ->getRepository('EarlsLeaseBundle:Leases')
            ->findby(array('restaurantid' => $restaurantid));

        $leaseObj = end($leaseList);
        if(empty($leaseObj)){
            $leaseObj = new Leases();
        }
        $leaseid = $leaseObj->getLeaseid();

        $squareftmain = $leaseObj->getAreamain();
        $squareftupperbas = $leaseObj->getAreaupperfloor();
        $squareftmezzanin = $leaseObj->getAreamezzanine();
        $squareftpatio = $leaseObj->getAreapatio();
        $other = $leaseObj->getAreaother();
        $surveyed = $leaseObj->getSurveyeddescription();

        $riskObj = $this->getDoctrine()
            ->getRepository('EarlsLeaseBundle:Riskinfo')
            ->findOneBy(array('restaurantid' => $restaurantid));
        if(empty($riskObj)){
            $riskObj = new Riskinfo();
        }

        $constructionObj = $riskObj->getConstructionid();
//        if(empty($constructionObj)){
//            $constructionObj = new Constructiontypes();
//        }
        if(isset($constructionObj)){
            $buildingtype = $constructionObj->getConstructiontype();
        }else{
            $buildingtype = "";
        }

        $ownerObj = $riskObj ->getInsuredby();
        if(isset($ownerObj)){
           $buildinginsured = $ownerObj->getOwnertype();
        }else{
            $buildinginsured = "";
        }
        $rent = $riskObj->getRentabatement();
        $exterior = $riskObj->getExteriormaintenance();

        $rentandmaintenanceObj = $this->getDoctrine()
            ->getRepository('EarlsLeaseBundle:Rentandmaintenances')
            ->findOneBy(array('restaurantid' => $restaurantid));

        if(empty($rentandmaintenanceObj)){
            $rentandmaintenanceObj = new Rentandmaintenances();
        }

        $hvacrepairObj = $rentandmaintenanceObj->getHvacrepair();
        if(empty($hvacrepairObj)){
            $hvacrepairObj = new Owners();
        }
        $hvacrepair = $hvacrepairObj->getOwnertype();

        $hvacreplaceObj = $rentandmaintenanceObj->getHvacreplace();
        if(empty($hvacreplaceObj)){
            $hvacreplaceObj = new Owners();
        }
        $hvacreplace = $hvacreplaceObj->getOwnertype();

        $roofrepairObj = $rentandmaintenanceObj->getRoofrepair();
        if(empty($roofrepairObj)){
            $roofrepairObj = new Owners();
        }
        $roofrepair = $roofrepairObj->getOwnertype();

        $roofreplaceObj = $rentandmaintenanceObj->getRoofreplace();
        if(empty($roofreplaceObj)){
            $roofreplaceObj = new Owners();
        }
        $roofreplace = $roofreplaceObj->getOwnertype();

        $utilityWaterObj = $this->getDoctrine()
            ->getRepository('EarlsLeaseBundle:Utilities')
            ->findOneBy(array('restaurantid' => $restaurantid, 'utilitytypeid' => 1));

        if(empty($utilityWaterObj)){
            $utilityWaterObj = new Utilities();
        }
        $waterbillingbyObj = $utilityWaterObj->getBillingby();

        if(empty($waterbillingbyObj)){
            $waterbillingbyObj = new Billingowners();
        }
        $waterbillingby = $waterbillingbyObj->getDescription();
        $watermetered = $utilityWaterObj->getIsmetered();
        if($watermetered == 1){
            $watermetered = 'YES';
        }else{

        }
//        $watercam = $utilityWaterObj->getIscam();
        $watercam = ($utilityWaterObj->getIscam() == 1 ? 'YES' : 'NO' );

        $utilityElectricObj = $this->getDoctrine()
            ->getRepository('EarlsLeaseBundle:Utilities')
            ->findOneBy(array('restaurantid' => $restaurantid, 'utilitytypeid' => 2));

        if(empty($utilityElectricObj)){
            $utilityElectricObj = new Utilities();
        }
        $electricbillingbyObj = $utilityElectricObj->getBillingby();

        if(empty($electricbillingbyObj)){
            $electricbillingbyObj = new Billingowners();
        }
        $electricbillingby = $electricbillingbyObj->getDescription();
        $electricmetered = $utilityElectricObj->getIsmetered();
        if($electricmetered == 1){
            $electricmetered = 'YES';
        }else{
            $electricmetered = 'NO';
        }
        $electriccam = $utilityElectricObj->getIscam();
        if($electriccam == 1){
            $electriccam = 'YES';
        }else{
            $electriccam = 'NO';
        }

        $utilityGasObj = $this->getDoctrine()
            ->getRepository('EarlsLeaseBundle:Utilities')
            ->findOneBy(array('restaurantid' => $restaurantid, 'utilitytypeid' => 3));

        if(empty($utilityGasObj)){
            $utilityGasObj = new Utilities();
        }
        $gasbillingbyObj = $utilityGasObj->getBillingby();

        if(empty($gasbillingbyObj)){
            $gasbillingbyObj = new Billingowners();
        }
        $gasbillingby = $gasbillingbyObj->getDescription();
        $gasmetered = ($utilityGasObj->getIsmetered() == 1 ? 'YES' : 'NO' );
        $gascam = ($utilityGasObj->getIscam() == 1 ? 'YES' : 'NO' );


        $leasetype = $leaseObj->getLeasetype();
        $leasedateObj = $leaseObj->getLeasedate();
        if(empty($leasedateObj)){
            $leasedate = "";
        }else{
            $leasedate = $leasedateObj->format('F d, Y');
        }
        $term = $leaseObj->getTerm();
        $commencementObj = $leaseObj->getCommencementdate();
        if(empty($commencementObj)){
            $commencement = "";
        }else{
            $commencement = $commencementObj->format('F d, Y');
        }

        $leaseexpiryObj = $leaseObj->getExpirydate();
        if(empty($leaseexpiryObj)){
            $leaseexpiry = "";
        }else{
            $leaseexpiry = $leaseexpiryObj->format('F d, Y');
        }

        $optiontime = $leaseObj->getOptiontime();
        $renewaloptiondateObj = $leaseObj->getRenewaloptiondate();
        if(empty($renewaloptiondateObj)){
            $renewaloptiondate = "";
        }else{
            $renewaloptiondate = $renewaloptiondateObj->format('F d, Y');
        }

        $renewal = $leaseObj->getRenewalterms();

        $leasereportsObj = $this->getDoctrine()
            ->getRepository('EarlsLeaseBundle:Leasereportsinfo')
            ->findOneBy(array('leaseid' => $leaseid));

        if(empty($leasereportsObj)){
            $leasereportsObj = new Leasereportsinfo();
        }

        $reporttypeObj = $leasereportsObj->getReporttypeid();
        if(isset($reporttypeObj))
        $reportingperiod = $reporttypeObj->getPeriodtype();
        else
            $reportingperiod = "";
        $certsales = $leasereportsObj->getIscertifiedsales();
        $duedate = $leasereportsObj->getDuedate();
        $audit = $leasereportsObj->getIsaudit();
        $certified = $leasereportsObj->getIscertified();

        $exclusive = $leaseObj->getExclusiveuse();
        $TI = $leaseObj->getTiallowance();
        $radiusclause = $leaseObj->getRadiusclause();
        $indemnifier = $leaseObj->getIndemnifier();
        $indemnityperiod = $leaseObj->getIndemnityperiod();
        $indemnityexpiry = $leaseObj ->getIndemnityexpiry();

        $renewals = $this->getDoctrine()
            ->getRepository('EarlsLeaseBundle:Renewals')
            ->findBy(array('leaseid' => $leaseid));

//        $renewalRatesList = $this->getDoctrine()findBy('')
//        print_r($renewals->getLeaseid());

        $renewalratebegin1 = "";

        foreach($renewals as $renewalObj){
            $renewalrate = $renewalObj->getTerm();

            $renewalratebegin1 = '<w:tab/>'.$renewalratebegin1.$renewalrate.'<w:br/>';
        }

        $renewalexercisedyes = "";

        foreach($renewals as $renewalObj){
//            $exercised = $renewalObj->getExercised();
            $exercised = ($renewalObj->getExercised() == 1 ? 'YES' : 'NO');

            $renewalexercisedyes = '<w:tab/>'.$renewalexercisedyes.$exercised.'<w:br/>';
        }

        $renewalrateend = "";
        $renewalpsf = "";
        $renewalexercisedno ="";

        $criticalissues = $this->getDoctrine()
            ->getRepository('EarlsLeaseBundle:Leasecriticaltasks')
            ->findBy(array('leaseid' => $leaseid));

        $crdate="";

        foreach($criticalissues as $criticalObj){
            $criticaldate = $criticalObj->getCtdate();

            $crdate = $crdate.$criticaldate.'\n';
        }

        $crclause = "";

        foreach($criticalissues as $criticalObj){
            $criticalclause = $criticalObj->getCtclause();

            $crclause= $crclause.$criticalclause.'\n';
        }

        $crdescr= "";

        foreach($criticalissues as $criticalObj){
            $criticaldesc= $criticalObj->getCtdescription();

            $crdescr= $crdescr.$criticaldesc.'\n';
        }


        $PHPWord = new \PHPWord();

        $templatePath = __DIR__.'/Templates/rptLeaseSummary.docx';
//        print_r($templatePath);
        $document = $PHPWord->loadTemplate($templatePath);


        $trimmedValue = $document->getReplacements();
//Restaurant name
        $document->setValue($trimmedValue['Value1'], $restaurantname); //Earl's Albert Street

//Store Number
        $document->setValue($trimmedValue['Value2'], $storenumber); //10303

//Landlord info
        $document->setValue($trimmedValue['Value3'], $landlordname); //Kalamaki Properties Inc.
        $document->setValue($trimmedValue['Value4'], $landlordaddress ); //c/o Property Manager
        $document->setValue($trimmedValue['Value5'], $landattention); //landlord attention
        $document->setValue($trimmedValue['Value6'], $landphone );//landlord phone
        $document->setValue($trimmedValue['Value7'], $landfax); //landlord fax

////Property Manager Info
        $document->setValue($trimmedValue['Value8'], $propertycompanyname);// Colliers International Regina
        $document->setValue($trimmedValue['Value9'], $propertyaddress); // 1821 Scarth Street, Suite 200
        $document->setValue($trimmedValue['Value10'], $propertycity); // Regina
        $document->setValue($trimmedValue['Value11'], $propertyprovince); //SK
        $document->setValue($trimmedValue['Value12'], $propertypostalcode); //S4P 2G9
        $document->setValue($trimmedValue['Value13'], $propertyattention);// Marlene Portras
        $document->setValue($trimmedValue['Value14'], $propertyphone); // (306) 789-8300
        $document->setValue($trimmedValue['Value15'], $propertyfax); // (306) 757-4714

////Store Info
        $document->setValue($trimmedValue['Value16'], $tenantname); //Earl's Restaurant (Albert Street) Ltd.
        $document->setValue($trimmedValue['Value17'], $storeaddress); //2606 - 28th Avenue
        $document->setValue($trimmedValue['Value18'], $storecity); //Regina
        $document->setValue($trimmedValue['Value19'], $storeprovince); // SK
        $document->setValue($trimmedValue['Value20'], $storepostalcode); //S4S 6P3
        $document->setValue($trimmedValue['Value21'], $storelegaldescription); // 	See Schedule "A" of Lease
//
        $document->setValue($trimmedValue['Value22'], $storeopen); //OPEN: Yes or no
        $document->setValue($trimmedValue['Value23'], $dateopened); //December 10, 1998
        $document->setValue($trimmedValue['Value24'], $liquorlicense); //125814
        $document->setValue($trimmedValue['Value25'], $businesslicense);// n/a
        $document->setValue($trimmedValue['Value26'], $expiryformat); // expiry date

////Building Info
        $document->setValue($trimmedValue['Value27'], $building); //FS Mall
        $document->setValue($trimmedValue['Value28'], $buildingclass); //EHL Owned
        $document->setValue($trimmedValue['Value29'], $diningseats); //Dining Seats : 120
        $document->setValue($trimmedValue['Value30'], $diningtables); // Dining Tables : 3333
        $document->setValue($trimmedValue['Value31'], $loungeseats); //lounge seats : 93
        $document->setValue($trimmedValue['Value32'], $loungetables); //lounge tables : 18
        $document->setValue($trimmedValue['Value33'], $patioseats); //patio seats : 112
        $document->setValue($trimmedValue['Value34'], $patiotables); //patio tables : 28
        $document->setValue($trimmedValue['Value35'], $totalseats); //total seats : 325
        $document->setValue($trimmedValue['Value36'], $totaltables); //total tables : 3379

////Area breakdown Info
        $document->setValue($trimmedValue['Value37'], $squareftmain); //Main : 7190.0
        $document->setValue($trimmedValue['Value38'], $squareftupperbas); //Uppr/Bas : 0.0
        $document->setValue($trimmedValue['Value39'], $squareftmezzanin); //Mezzanin : 700.0
        $document->setValue($trimmedValue['Value40'], $squareftpatio); // Patio : 2178.0
        $document->setValue($trimmedValue['Value41'], $other); //Other : 0.0
        $document->setValue($trimmedValue['Value42'], $surveyed); //Surveyed:
//
////Risk Info
//        //$document->setValue('Value43', $buildingtypes); // Unknown
        $document->setValue($trimmedValue['Value44'], $buildinginsured); //tenant
        $document->setValue($trimmedValue['Value45'], $rent); // see 12.02 and 12.03
        $document->setValue($trimmedValue['Value46'], $exterior); //tenant see clause 11.01
//
////Rent and Maintenance Info
        $document->setValue($trimmedValue['Value47'], $hvacrepair); // Tenant
        $document->setValue($trimmedValue['Value48'], $hvacreplace); //Tenant
        $document->setValue($trimmedValue['Value49'], $roofrepair); // Tenant
        $document->setValue($trimmedValue['Value50'], $roofreplace); //Tenant
//
////Utilities Info
        $document->setValue($trimmedValue['Value51'], $waterbillingby); // utility
        $document->setValue($trimmedValue['Value52'], $watermetered); // metered
        $document->setValue($trimmedValue['Value53'], $watercam); // CAM
////
        $document->setValue($trimmedValue['Value54'], $electricbillingby); // Purchasing
        $document->setValue($trimmedValue['Value55'], $electricmetered); //metered
        $document->setValue($trimmedValue['Value56'], $electriccam); //CAM
////
        $document->setValue($trimmedValue['Value57'], $gasbillingby); // Purchasing
        $document->setValue($trimmedValue['Value58'], $gasmetered); //metered
        $document->setValue($trimmedValue['Value59'], $gascam); //CAM
//
////Lease Information
        $document->setValue($trimmedValue['Value60'], $leasetype); // Lease with TI
        $document->setValue($trimmedValue['Value61'], $leasedate); //January 12, 1998
        $document->setValue($trimmedValue['Value62'], $term); //15 years
        $document->setValue($trimmedValue['Value63'], $commencement); // December 10, 1998
        $document->setValue($trimmedValue['Value64'], $leaseexpiry); //December 31, 2013
        $document->setValue($trimmedValue['Value65'], $optiontime); //6 months
//
////Renewal Information
        $document->setValue($trimmedValue['Value66'], $renewaloptiondate); // June 30,2013
        $document->setValue($trimmedValue['Value67'], $renewal); //3x5 years
        $document->setValue($trimmedValue['Value68'], $renewalratebegin1); //Jan 1/XX
        $document->setValue($trimmedValue['Value69'], $renewalexercisedyes); //yes

//
////Report Information
        $document->setValue($trimmedValue['Value70'], $reportingperiod); // Month
        $document->setValue($trimmedValue['Value71'], $certsales); // certified sales?
        $document->setValue($trimmedValue['Value72'], $duedate); // 2/28/2014
        $document->setValue($trimmedValue['Value73'], $audit); // is audit?
        $document->setValue($trimmedValue['Value74'], $certified); // certified ?
//
////Special Terms and Conditions Information
        $document->setValue($trimmedValue['Value75'], $exclusive); // yes or no
        $document->setValue($trimmedValue['Value76'], $TI); // $700,000
        $document->setValue($trimmedValue['Value77'], $radiusclause); // yes or no
        $document->setValue($trimmedValue['Value78'], $other); // cap on op costs - see page 10 of lease
        $document->setValue($trimmedValue['Value79'], $indemnifier); // Earl's Restuarants Ltd.
        $document->setValue($trimmedValue['Value80'], $indemnityperiod); // end of 2nd Extension
        $document->setValue($trimmedValue['Value81'], $indemnityexpiry); // December 31, 2008
//
////Critical Issues
        $document->setValue($trimmedValue['Value82'], $crdate); // Date
        $document->setValue($trimmedValue['Value83'], $crclause); //Clause
        $document->setValue($trimmedValue['Value84'], $crdescr); // Description

//save the document
        $outputFilePath = __DIR__.'/Templates/Reports/LeaseSummary.docx';
        $document->save($outputFilePath);

        header("Content-Description: File Transfer");
        header("Content-Type: application/octet-stream");
        header("Content-Disposition: attachment; filename=LeaseSummary.docx");
        header("Content-Transfer-Encoding: binary");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
        header("Pragma: public");
        header('Content-Length: ' . filesize($outputFilePath));
//        ob_clean();
        flush();
        readfile($outputFilePath);

        return $this->redirect($this->generateUrl('_summary_get_id', array('id' => $id)));


    }


}

?>