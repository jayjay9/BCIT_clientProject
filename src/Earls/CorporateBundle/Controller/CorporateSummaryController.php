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
		
		/*****RECORD OFFICE****/
		$recordsofficeId = $corporationObj->getRecordsofficeid()->getOfficeid();
		
		$recordsOfficeObj = $this->getDoctrine()
            ->getRepository('EarlsCorporateBundle:Offices')
            ->find($recordsofficeId);
		
		$recordsProvinceName = $recordsOfficeObj->getProvincestateid()->getDescription();
		
		/***Extra-provincial jurisdictions***/
		
		$jurisdictionsObj = $this->getDoctrine()
            ->getRepository('EarlsCorporateBundle:Jurisdictions')
			->findBy( array('corporateid' => $id));
			
		
		/***Directors***/
		
		$directorsObj = $this->getDoctrine()
            ->getRepository('EarlsCorporateBundle:Corporatedirectors')
			->findBy( array('corporateid' => $id));
			
		 /***Memberships***/	
		$membershipsObj = $this->getDoctrine()
            ->getRepository('EarlsCorporateBundle:Memberships')
			->findBy( array('corporateid' => $id));
			
		$corporationArray = array(
			'corporationid' => $id,
			'provinceName' => $provinceName,
			'registrationDate' => $registrationDate,
			'registeredProvince' => $registeredProvinceName,
			'recordsProvince' => $recordsProvinceName
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
				'DirectorsObj' => $directorsObj,
				'Memberships' => $membershipsObj
				)
		);
		
	}
}

?>