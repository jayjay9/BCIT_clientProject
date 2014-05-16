<?php


namespace Earls\CorporateBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;

// these import the "@Route" and "@Template" annotations
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use Earls\CorporateBundle\Entity\Corporations;
use Earls\CorporateBundle\Entity\Directors;
use Earls\CorporateBundle\Entity\Jurisdictions;
use Earls\CorporateBundle\Entity\Offices;
use Earls\CorporateBundle\Entity\Recordsoffices;
use Earls\CorporateBundle\Entity\Regions;
use Earls\CorporateBundle\Entity\Provincestate;
use Earls\CorporateBundle\Entity\Memberships;
use Earls\CorporateBundle\Entity\Registeredoffices;
use Earls\CorporateBundle\Entity\Sharetypes;
use Earls\CorporateBundle\Entity\Corporatedirectors;
use Earls\CorporateBundle\Entity\Northamericancities;
use Earls\LeaseBundle\Entity\Restaurants;

use Earls\CorporateBundle\Form\Model\CorporationFinder;
use Earls\CorporateBundle\Form\Type\CorporationFinderType;

class CorporateSummaryController extends Controller{

	/**
     * @Route("/", name="_corporatesummary")
     * @Template()
     */
    public function indexAction()
    {

        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery('SELECT c FROM EarlsCorporateBundle:Corporations c');

        $data = $query->getResult();
        $corporateID = $data[0]->getCorporateid();

        return $this->redirect($this->generateUrl('_corporateSummary_get_id', array('id' => $corporateID)));

    }

/**
     * @Route("/{id}", name="_corporateSummary_get_id")
     * @Template()
     */
    public function getAction($id)
    {
        $corporationObj = $this->getDoctrine()
            ->getRepository('EarlsCorporateBundle:Corporations')
            ->find($id);
		
		$selectedCorporation = new CorporationFinder();
        $selectedCorporation->setCorporation($corporationObj);
        $formRequested = $this->createForm(new CorporationFinderType(), $selectedCorporation);

        $request = $this->getRequest();
        $formRequested->handleRequest($request);
		
		/****CORPORATION INFORMATION***/
		
		$corporationObj = $this->getDoctrine()
            ->getRepository('EarlsCorporateBundle:Corporations')
            ->find($id);
			
		$provinceName = $corporationObj->getProvincestateid()->getDescription();
		$registrationDate = $corporationObj->getRegistrationdate()->format('Y-m-d');
		
		/****REGISTERED OFFICE***/
		$registeredofficeId = $corporationObj->getRegisteredofficeid()->getOfficeid();
		
		$registeredOfficesObj = $this->getDoctrine()
            ->getRepository('EarlsCorporateBundle:Offices')
            ->find($registeredofficeId);
		
		$registeredProvinceName = $registeredOfficesObj->getProvincestateid()->getDescription();
        $registeredCity         = $registeredOfficesObj->getCity()->getCity();
		
		/*****RECORD OFFICE****/
		$recordsofficeId = $corporationObj->getRecordsofficeid()->getOfficeid();
		
		$recordsOfficeObj = $this->getDoctrine()
            ->getRepository('EarlsCorporateBundle:Offices')
            ->find($recordsofficeId);
		
		$recordsProvinceName = $recordsOfficeObj->getProvincestateid()->getDescription();
        $recordsCity         = $recordsOfficeObj->getCity()->getCity();
		
		/***Extra-provincial jurisdictions***/
		
		$jurisdictionsObj = $this->getDoctrine()
            ->getRepository('EarlsCorporateBundle:Jurisdictions')
			->findBy( array('corporateid' => $id));
			
		
		/***Directors***/
		$directorArray = array();
		$directorsObj = $this->getDoctrine()
            ->getRepository('EarlsCorporateBundle:Corporatedirectors')
			->findBy( array('corporateid' => $id));

        foreach($directorsObj as $director){
            $directorid      = $director->getDirectorid()->getDirectorid();
            $directorsObj = $this->getDoctrine()
                ->getRepository('EarlsCorporateBundle:Directors')
                ->find($directorid);

            $directorName       = $directorsObj->getDirectorname();
            $directorPosition   = $director->getPosition();
            $directorAddress    = $directorsObj->getAddress();
            $directorCityObj       = $directorsObj->getCity();
            if(empty($directorCity)){
                $directorCity = "";
            }else{
                $directorCity = $directorCityObj->getCity();
            }
            $directorPropState  = $directorsObj->getProvincestateid();
            if(empty($directorPropState)){
                $directorProvince = "";
            }else{
                $directorProvince = $directorCityObj->getDescription();
            }
            $directorZipCode    = $directorsObj->getPostalzip();

            $directorObj = array(
                    'directorName' => $directorName,
                    'directorPosition' => $directorPosition,
                    'directorAddress' => $directorAddress,
                    'directorCity' => $directorCity,
                    'directorPropState' => $directorProvince,
                    'directorZipCode' => $directorZipCode 
                );

            array_push($directorArray, $directorObj);
        }
			
		 /***Memberships***/	
		$membershipsObj = $this->getDoctrine()
            ->getRepository('EarlsCorporateBundle:Memberships')
			->findBy( array('corporateid' => $id));
			
		$corporationArray = array(
			'corporationid'         => $id,
			'provinceName'          => $provinceName,
			'registrationDate'      => $registrationDate,
			'registeredProvince'    => $registeredProvinceName,
            'registeredCity'        => $registeredCity,
			'recordsProvince'       => $recordsProvinceName,
            'recordsCity'           => $recordsCity
		);
		
		
		 if ($formRequested->isValid()) {
            $corporationObjRequested = $formRequested->getData()->getCorporation();
            $corporationID = $corporationObjRequested->getCorporateid();

            return $this->redirect($this->generateUrl('_corporateSummary_get_id', array('id' => $corporationID)));
        }
		
		$RestaurantObj = $this->getDoctrine()
            ->getRepository('EarlsLeaseBundle:Restaurants')
            ->findoneby(array('restaurantid' => $id));


		
		 return $this->render('EarlsCorporateBundle:CorporateSummary:index.html.twig',
		   array(
                'corporationArray' => $corporationArray,
				'corporationFinderForm' => $formRequested->createView(),
				'CorporationObj' => $corporationObj,
				'RegisteredObj' => $registeredOfficesObj,
				'RecordsofficeObj' => $recordsOfficeObj,
				'JurisdictionsObj' => $jurisdictionsObj,
				'DirectorsObj' => $directorArray,
				'Memberships' => $membershipsObj
				)
		);
		
	}


    /**
     * @Route("export/{id}", name="_summary_corporate_createreport")
     * @Template()
     */
    function createReportAction($id){

        $corporationObj = $this->getDoctrine()
            ->getRepository('EarlsCorporateBundle:Corporations')
            ->find($id);

        //Corporate name
        $corporationName    = $corporationObj->getCorporatename();
        $corporateFileNo    = $corporationObj->getFilenumber();


        $respSolicitor      = $corporationObj->getRespsolicitor();
        $usage              = $corporationObj->getCorporateusage();



        $jurisdictionPS     = $corporationObj->getProvincestateid()->getDescription();
        $fiscalYearEnd      = $corporationObj->getFiscalyearend();
        $registrationNo     = $corporationObj->getRegistrationnumber();
        $registrationDate   = $corporationObj->getRegistrationdate();
        if(empty($registrationDate)){
            $registrationDateFormatted = "";
        }else{
            $registrationDateFormatted = $registrationDate->format('F d, Y');
        }

        $seal               = $corporationObj->getSeal();
        $locationSeal       = $corporationObj->getLocationseal();


        /****REGISTERED OFFICE***/
        $registeredofficeId = $corporationObj->getRegisteredofficeid()->getOfficeid();
        $registeredOfficesObj = $this->getDoctrine()
            ->getRepository('EarlsCorporateBundle:Offices')
            ->find($registeredofficeId);

        $registeredOfficeName       = $registeredOfficesObj->getOfficename();
        $registeredOfficeAddress    = $registeredOfficesObj->getAddress();
        $registeredOfficeProvState  = $registeredOfficesObj->getProvincestateid()->getDescription();
        $registeredOfficeCity       = $registeredOfficesObj->getCity()->getCity();
        $registeredOfficeZipCode    = $registeredOfficesObj->getPostalzip();



        /*****RECORD OFFICE****/
        $recordsofficeId = $corporationObj->getRecordsofficeid()->getOfficeid();
        $recordsOfficeObj = $this->getDoctrine()
            ->getRepository('EarlsCorporateBundle:Offices')
            ->find($recordsofficeId);

        $recordsOfficeName          = $recordsOfficeObj->getOfficename();
        $recordsOfficeAddress       = $recordsOfficeObj->getAddress();
        $recordsOfficeProvState     = $recordsOfficeObj->getProvincestateid()->getDescription();
        $recordsOfficeCity          = $recordsOfficeObj->getCity()->getCity();
        $recordsOfficeZipCode       = $recordsOfficeObj->getPostalzip();



        /***Extra-provincial jurisdictions***/
        $jurisdictionsObj = $this->getDoctrine()
            ->getRepository('EarlsCorporateBundle:Jurisdictions')
            ->findBy( array('corporateid' => $id));

        $jurisdictionPropState = "";
        $jurisdictionRegistrationNo = "";
        foreach($jurisdictionsObj as $jurisdiction){
            $jurisdictionPropState      = $jurisdiction->getProvincestateid()->getDescription();
            $jurisdictionRegisteredDate = $jurisdiction->getRegistereddate();
            $jurisdictionRegistrationNo = $jurisdiction->getRegistrationnumber();
        }
        if(empty($jurisdictionRegisteredDate)){
            $jurisdictionRegisteredDateFormatted = "";
        }else{
            $jurisdictionRegisteredDateFormatted = $jurisdictionRegisteredDate->format('F d, Y');
        }



        /*** Directors ***/

        $directorsObj = $this->getDoctrine()
            ->getRepository('EarlsCorporateBundle:Corporatedirectors')
            ->findBy( array('corporateid' => $id));
        $directorName       = "";
        $directorPosition   = "";
        $directorAddress    = "";
        $directorCity       = "";
        $directorPropState  = "";
        $directorZipCode    = "";
        foreach($directorsObj as $director){
            $directorName       = $director->getDirectorid()->getDirectorname();
            $directorPosition   = $director->getPosition();
            $directorAddress    = $director->getDirectorid()->getAddress();
            $directorCityObj       = $director->getDirectorid()->getCity();
            if(empty($directorCityObj)){
                $directorCity = "";
            }else{
                $directorCity = $directorCityObj->getCity();
            }
            $directorPropStateObj  = $director->getDirectorid()->getProvincestateid();
            if(empty($directorPropStateObj)){
                $directorPropState = "";
            }else{
                $directorPropState = $directorPropStateObj->getDescription();
            }
            $directorZipCode    = $director->getDirectorid()->getPostalzip();
        }


        /*** Capital Structure ***/
        $capitalStructure = $corporationObj->getCapitalstructure();


        /*** Memberships ***/
        $membershipsObj = $this->getDoctrine()
            ->getRepository('EarlsCorporateBundle:Memberships')
            ->findBy( array('corporateid' => $id));
        $membershipShareType    = "";
        $membershipDirector     = "";
        $membershipNoOfShares   = "";
        foreach($membershipsObj as $membership){
            $membershipShareType    = $membership->getSharetypeid()->getSharetype();
            $membershipDirector     = $membership->getDirectorid()->getDirectorname();
            $membershipNoOfShares   = $membership->getNumberofshares();
        }

        /*** Name Changes ***/
        $nameChanges = $corporationObj->getNamechanges();

        /****
         *  Write into a word file using a template
         */

        $PHPWord = new \PHPWord();
        $templatePath = __DIR__.'/Templates/rptCorporateSummary.docx';
        $document = $PHPWord->loadTemplate($templatePath);

        $trimmedValue = $document->getReplacements();


        $document->setValue($trimmedValue['Value1'], $corporationName);
        $document->setValue($trimmedValue['Value2'], $corporateFileNo);


        $document->setValue($trimmedValue['Value3'], $respSolicitor);
        $document->setValue($trimmedValue['Value4'], $usage);


        $document->setValue($trimmedValue['Value5'], $jurisdictionPS);
        $document->setValue($trimmedValue['Value6'], $fiscalYearEnd);
        $document->setValue($trimmedValue['Value7'], $registrationNo);
        $document->setValue($trimmedValue['Value8'], $registrationDateFormatted);
        $document->setValue($trimmedValue['Value9'], $seal);
        $document->setValue($trimmedValue['Value10'], $locationSeal);


        $document->setValue($trimmedValue['Value11'], $registeredOfficeName);
        $document->setValue($trimmedValue['Value12'], $registeredOfficeAddress);
        $document->setValue($trimmedValue['Value13'], $registeredOfficeProvState);
        $document->setValue($trimmedValue['Value14'], $registeredOfficeCity);
        $document->setValue($trimmedValue['Value15'], $registeredOfficeZipCode);


        $document->setValue($trimmedValue['Value16'], $recordsOfficeName);
        $document->setValue($trimmedValue['Value17'], $recordsOfficeAddress);
        $document->setValue($trimmedValue['Value18'], $recordsOfficeProvState);
        $document->setValue($trimmedValue['Value19'], $recordsOfficeCity);
        $document->setValue($trimmedValue['Value20'], $recordsOfficeZipCode);


        $document->setValue($trimmedValue['Value21'], $jurisdictionPropState);
        $document->setValue($trimmedValue['Value22'], $jurisdictionRegisteredDateFormatted);
        $document->setValue($trimmedValue['Value23'], $jurisdictionRegistrationNo);


        $document->setValue($trimmedValue['Value24'], $directorName);
        $document->setValue($trimmedValue['Value25'], $directorPosition);
        $document->setValue($trimmedValue['Value26'], $directorAddress);
        $document->setValue($trimmedValue['Value27'], $directorCity);
        $document->setValue($trimmedValue['Value28'], $directorPropState);
        $document->setValue($trimmedValue['Value29'], $directorZipCode);


        $document->setValue($trimmedValue['Value30'], $capitalStructure);


        $document->setValue($trimmedValue['Value31'], $membershipShareType);
        $document->setValue($trimmedValue['Value32'], $membershipDirector);
        $document->setValue($trimmedValue['Value33'], $membershipNoOfShares);


        $document->setValue($trimmedValue['Value34'], $nameChanges);


        $outputFilePath = __DIR__.'/Templates/Reports/CorporateSummary.docx';
        $document->save($outputFilePath);

        header("Content-Description: File Transfer");
        header("Content-Type: application/octet-stream");
        header("Content-Disposition: attachment; filename=CorporateSummary.docx");
        header("Content-Transfer-Encoding: binary");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
        header("Pragma: public");
        header('Content-Length: ' . filesize($outputFilePath));
//        ob_clean();
        flush();
        readfile($outputFilePath);



        return $this->redirect($this->generateUrl('_corporateSummary_get_id', array('id' => $id)));


    }


}

?>