<?php

namespace Earls\LeaseBundle\Controller;

use Doctrine\Tests\Common\Annotations\Null;
use Earls\LeaseBundle\Entity\Licenses;
use Earls\LeaseBundle\Entity\Liquorlicenses;
use Earls\LeaseBundle\Entity\Rentandmaintenances;
use Earls\LeaseBundle\Entity\Riskinfo;
use Earls\LeaseBundle\Entity\Utilities;
use Earls\LeaseBundle\Entity\Utilitytypes;
use Earls\LeaseBundle\Form\Model\StoreInformationModel;
use Earls\LeaseBundle\Form\Type\StoreInformationType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

// these import the form
use Earls\LeaseBundle\Form\Type\RestaurantFinderType;
use Earls\LeaseBundle\Form\Model\RestaurantFinder;

use Earls\LeaseBundle\Entity\Restaurants;
use Symfony\Component\BrowserKit\Request;
use Symfony\Component\HttpFoundation\Response;

// these import the "@Route" and "@Template" annotations
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;


// these import the Store Information form
use Earls\LeaseBundle\Form\Type\LandlordSectionType;
use Earls\LeaseBundle\Form\Model\LandlordSectionModel;


class StoreInformationController extends Controller
{
    /**
     * @Route("/", name="_storeinformation")
     * @Template()
     */
    public function indexAction()
    {

        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery('SELECT c FROM EarlsLeaseBundle:Restaurants c');

        $data = $query->getResult();
        $restaurantID = $data[0]->getRestaurantid();

        return $this->redirect($this->generateUrl('_storeinformation_display', array('id' => $restaurantID)));

    }

    /**
     * @Route("/{id}", name="_storeinformation_display")
     * @Template()
     */
    public function displayAction($id)
    {

        $restaurantObj = $this->getDoctrine()
            ->getRepository('EarlsLeaseBundle:Restaurants')
            ->find($id);


        $totalSeats = $restaurantObj->getDiningroomseating() + $restaurantObj->getLoungeseating() + $restaurantObj->getPatioseating();
        $totalTables = $restaurantObj->getDiningroomtable() + $restaurantObj->getLoungetable() + $restaurantObj->getPatiotable();

        $licenseObj = $restaurantObj->getLicenseid();
        if (isset($licenseObj)) {
            $licenseid = $licenseObj->getLicenseid();
            $license = $this->getDoctrine()
                ->getRepository('EarlsLeaseBundle:Licenses')
                ->find($licenseid);
        } else {
            $license = new Licenses();
            $this->addLicenseEntry($license);
            $this->setLicense($restaurantObj, $license);
        }

        $liquorlicenseidObj = $this->getDoctrine()
            ->getRepository('EarlsLeaseBundle:Liquorlicenses')
            ->findOneBy(array(
                'restaurantid' => $id
            ));
        if (empty($liquorlicenseidObj)) {
            $liquorlicensesObj = new Liquorlicenses();
            $this->addLiquorLicenseEntry($liquorlicensesObj, $restaurantObj);
        }


        $riskinfoObj = $this->getDoctrine()
            ->getRepository('EarlsLeaseBundle:Riskinfo')
            ->findOneBy(array(
                'restaurantid' => $id
            ));
        if (empty($riskinfoObj)) {
            $this->addRiskInfoEntry(new Riskinfo(), $restaurantObj);
        }

        $rentandmaintenancesObj = $this->getDoctrine()
            ->getRepository('EarlsLeaseBundle:Rentandmaintenances')
            ->findOneBy(array(
                'restaurantid' => $id
            ));
        if (empty($rentandmaintenancesObj)) {
            $this->addRentAndMaintenanceEntry(new Rentandmaintenances(), $restaurantObj);
        }

        $utilitiestype1 = $this->getDoctrine()
            ->getRepository('EarlsLeaseBundle:Utilitytypes')
            ->find(1);

        $utilitiestype2 = $this->getDoctrine()
            ->getRepository('EarlsLeaseBundle:Utilitytypes')
            ->find(2);

        $utilitiestype3 = $this->getDoctrine()
            ->getRepository('EarlsLeaseBundle:Utilitytypes')
            ->find(3);

        $utilitiesObj1 = $this->getDoctrine()
            ->getRepository('EarlsLeaseBundle:Utilities')
            ->findOneBy(array(
                'restaurantid' => $id,
                'utilitytypeid' => $utilitiestype1
            ));

        if (empty($utilitiesObj1)) {
            $utilitiesObj1 = new Utilities();
            $this->addUtilitiesEntry($utilitiesObj1, $restaurantObj, $utilitiestype1);
        }

        $utilitiesObj2 = $this->getDoctrine()
            ->getRepository('EarlsLeaseBundle:Utilities')
            ->findOneBy(array(
                'restaurantid' => $id,
                'utilitytypeid' => $utilitiestype2
            ));

        if (empty($utilitiesObj2)) {
            $utilitiesObj2 = new Utilities();
            $this->addUtilitiesEntry($utilitiesObj2, $restaurantObj, $utilitiestype2);
        }

        $utilitiesObj3 = $this->getDoctrine()
            ->getRepository('EarlsLeaseBundle:Utilities')
            ->findOneBy(array(
                'restaurantid' => $id,
                'utilitytypeid' => $utilitiestype3
            ));

        if (empty($utilitiesObj3)) {
            $utilitiesObj3 = new Utilities();
            $this->addUtilitiesEntry($utilitiesObj3, $restaurantObj, $utilitiestype3);
        }


        $selectedRestaurant = new RestaurantFinder();
        $selectedRestaurant->setRestaurant($restaurantObj);
        $formRequested = $this->createForm(new RestaurantFinderType(), $selectedRestaurant);

        $request = $this->getRequest();
        $formRequested->handleRequest($request);


        if ($formRequested->isValid()) {
            $restaurantObjRequested = $formRequested->getData()->getRestaurant();
            $restaurantID = $restaurantObjRequested->getRestaurantid();

            return $this->redirect($this->generateUrl('_storeinformation_display', array('id' => $restaurantID)));
        }

        /** Store Information Form */
        $storeinformationnmodel = new StoreInformationModel();

        if (isset($restaurantObj))
            $storeinformationnmodel->setRestaurantinfo($restaurantObj);
        $storeinformationnmodel->setRestaurantId($id);
        if (isset($license))
            $storeinformationnmodel->setLicenseinfo($license);
        if (isset($liquorlicensesObj))
            $storeinformationnmodel->setLiquorlicense($liquorlicensesObj);
        if (isset($riskinfoObj))
            $storeinformationnmodel->setRiskinfo($riskinfoObj);
        if (isset($rentandmaintenancesObj))
            $storeinformationnmodel->setRentandmaintenance($rentandmaintenancesObj);
        if (isset($utilitiesObj1))
            $storeinformationnmodel->setUtilities1($utilitiesObj1);
        if (isset($utilitiesObj2))
            $storeinformationnmodel->setUtilities2($utilitiesObj2);
        if (isset($utilitiesObj3))
            $storeinformationnmodel->setUtilities3($utilitiesObj3);

        $storeInfoForm = $this->createForm(new StoreInformationType(), $storeinformationnmodel, array(
            'action' => $this->generateUrl('_storeinformation_update', array('id' => $id))
        ));


        return $this->render('EarlsLeaseBundle:StoreInformation:index.html.twig',
            array(
                'storeFinderForm' => $formRequested->createView(),
                'storeInfoForm' => $storeInfoForm->createView(),
                'totals' => array('totalSeats' => $totalSeats, 'totalTables' => $totalTables),
            )
        );

    }

    /**
     * @Route("/update/{id}", name="_storeinformation_update")
     * @Template()
     */
    public function UpdateAction($id)
    {
        $request = $this->getRequest();

        $em = $this->getDoctrine()->getManager();

        $storeInfoObj = new StoreInformationModel();
        $restaurant = $em->getRepository('EarlsLeaseBundle:Restaurants')->find($id);
        $storeInfoObj->setRestaurantinfo($restaurant);

        $license = $restaurant->getLicenseid()->getLicenseid();
        $licenseObj = $em->getRepository('EarlsLeaseBundle:Licenses')->find($license);
        if (isset($licenseObj)) {
            $storeInfoObj->setLicenseinfo($licenseObj);
        }

        $liquorlicenseidObj = $em->getRepository('EarlsLeaseBundle:Liquorlicenses')->findOneBy(array(
            'restaurantid' => $id
        ));
        if (isset($liquorlicenseidObj)) {
            $storeInfoObj->setLiquorlicense($liquorlicenseidObj);
        }

        $riskinfo = $em->getRepository('EarlsLeaseBundle:Riskinfo')->findOneBy(array(
            'restaurantid' => $id
        ));
        if (isset($riskinfo))
            $storeInfoObj->setRiskinfo($riskinfo);

        $rentandmaintenance = $em->getRepository('EarlsLeaseBundle:Rentandmaintenances')->findOneBy(array(
            'restaurantid' => $id
        ));

        if (isset($rentandmaintenance))
            $storeInfoObj->setRentandmaintenance($rentandmaintenance);

        $utilitiestype1 = $this->getDoctrine()
            ->getRepository('EarlsLeaseBundle:Utilitytypes')
            ->find(1);

        $utilitiesObj1 = $this->getDoctrine()->getRepository('EarlsLeaseBundle:Utilities')->findOneBy(array(
                'restaurantid' => $id,
                'utilitytypeid' => $utilitiestype1
            ));

        if (isset($utilitiesObj1))
            $storeInfoObj->setUtilities1($utilitiesObj1);

        $utilitiestype2 = $this->getDoctrine()
            ->getRepository('EarlsLeaseBundle:Utilitytypes')
            ->find(2);

        $utilitiesObj2 = $this->getDoctrine()->getRepository('EarlsLeaseBundle:Utilities')->findOneBy(array(
                'restaurantid' => $id,
                'utilitytypeid' => $utilitiestype2
            ));

        if (isset($utilitiesObj2))
            $storeInfoObj->setUtilities2($utilitiesObj2);

        $utilitiestype3 = $this->getDoctrine()
            ->getRepository('EarlsLeaseBundle:Utilitytypes')
            ->find(3);

        $utilitiesObj3 = $this->getDoctrine()->getRepository('EarlsLeaseBundle:Utilities')->findOneBy(array(
                'restaurantid' => $id,
                'utilitytypeid' => $utilitiestype3
            ));

        if (isset($utilitiesObj3))
            $storeInfoObj->setUtilities3($utilitiesObj3);

        $selectedRestaurant = new RestaurantFinder();
        $selectedRestaurant->setRestaurant($restaurant);
        $formRequested = $this->createForm(new RestaurantFinderType(), $selectedRestaurant);

        $request = $this->getRequest();
        $formRequested->handleRequest($request);


        if ($formRequested->isValid()) {
            $restaurantObjRequested = $formRequested->getData()->getRestaurant();
            $restaurantID = $restaurantObjRequested->getRestaurantid();

            return $this->redirect($this->generateUrl('_storeinformation_display', array('id' => $restaurantID)));
        }

        $form = $this->createForm(new StoreInformationType(), $storeInfoObj);


        if ($request->isMethod('POST')) {
            $form->submit($request);

            if ($form->isValid()) {
                $corporateName = $storeInfoObj->getRestaurantinfo()->getCorporateid()->getCorporatename();
                $em->flush();
                $restaurant = $em->getRepository('EarlsLeaseBundle:Restaurants')->find($id);
                $restaurant->setTenant($corporateName);
                $em->flush();
                return $this->redirect($this->generateUrl('_storeinformation_display', array('id' => $id)));
            } 
        } else {
            print_r($request->getMethod());
        }


        return $this->render('EarlsLeaseBundle:StoreInformation:index.html.twig',
            array('storeFinderForm' => $formRequested->createView(),'storeInfoForm' => $form->createView())
        );

    }

    private function addLiquorLicenseEntry(Liquorlicenses $liquorlicense, Restaurants $id)
    {
        $liquorlicense->setRestaurantid($id);
        $liquorlicense->setBusinesslicense(Null);
        $liquorlicense->setLiquorlicense(Null);
        //$liquorlicense->setLicensedate('0000-00-00');

        $em = $this->getDoctrine()->getManager();
        $em->persist($liquorlicense);
        $em->flush();

        return 1;
    }

    private function addLicenseEntry(Licenses $license)
    {
        $em = $this->getDoctrine()->getManager();
        $em->persist($license);
        $em->flush();

        return 1;
    }

    private function setLicense(Restaurants $restaurant, Licenses $license)
    {
        $em = $this->getDoctrine()->getManager();
        $restaurant->setLicenseid($license);
        $em->flush();
        return 1;
    }

    private function addRiskInfoEntry(Riskinfo $riskinfo, Restaurants $id)
    {
        $riskinfo->setRestaurantid($id);

        $em = $this->getDoctrine()->getManager();
        $em->persist($riskinfo);
        $em->flush();

        return 1;
    }

    private function addRentAndMaintenanceEntry(Rentandmaintenances $rentandmaintenance, Restaurants $id)
    {
        $rentandmaintenance->setRestaurantid($id);

        $em = $this->getDoctrine()->getManager();
        $em->persist($rentandmaintenance);
        $em->flush();

        return 1;
    }

    private function addUtilitiesEntry(Utilities $utilities, Restaurants $id, Utilitytypes $utilitiestype)
    {
        $utilities->setRestaurantid($id);
        $utilities->setUtilitytypeid($utilitiestype);
        $em = $this->getDoctrine()->getManager();
        $em->persist($utilities);
        $em->flush();

        return 1;
    }

}

?>