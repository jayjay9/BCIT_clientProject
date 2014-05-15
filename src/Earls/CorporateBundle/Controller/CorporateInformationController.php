<?php

// src/Acme/CorporateBundle/Controller/CorporateInformationController.php
namespace Earls\CorporateBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;

use Doctrine\Tests\Common\Annotations\Null;
use Earls\LeaseBundle\Entity\Licenses;
use Earls\LeaseBundle\Entity\Liquorlicenses;
use Earls\LeaseBundle\Entity\Rentandmaintenances;
use Earls\LeaseBundle\Entity\Riskinfo;
use Earls\LeaseBundle\Entity\Utilities;
use Earls\LeaseBundle\Entity\Utilitytypes;
use Earls\LeaseBundle\Form\Model\StoreInformationModel;
use Earls\LeaseBundle\Form\Type\StoreInformationType;

// MY IMPORTS
use Earls\CorporateBundle\Entity\Corporations;
use Earls\CorporateBundle\Form\Model\CorpInfoModel;
use Earls\CorporateBundle\Form\Type\CorpInfoType;
use Earls\CorporateBundle\Entity\Registeredoffices;
use Earls\CorporateBundle\Entity\Offices;
use Earls\CorporateBundle\Entity\Recordsoffices;
use Earls\CorporateBundle\Entity\Regions;
use Earls\CorporateBundle\Entity\Provincestate;
use Earls\CorporateBundle\Entity\Directors;

use Earls\CorporateBundle\Form\Type\DirectorsType;

use Earls\CorporateBundle\Form\Type\CorporationFinderType;
use Earls\CorporateBundle\Form\Model\CorporationFinder;



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


class CorporateInformationController extends Controller

{
    /**
     * @Route("/", name="_corporateinformation")
     * @Template()
     */
    public function indexAction()
    {   
    
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery('SELECT c FROM EarlsCorporateBundle:Corporations c');

        $data = $query->getResult();
        $corporationID = $data[0]->getCorporateid();

    	return $this->redirect($this->generateUrl('_corporateinformation_display', array('id' => $corporationID)));

    }

    /**
     * @Route("/{id}", name="_corporateinformation_display")
     * @Template()
     */
    public function displayAction($id)
    {

        $corporationObj = $this->getDoctrine()
            ->getRepository('EarlsCorporateBundle:Corporations')
            ->find($id);
            
        $directorlist = $this->getDoctrine()
            ->getRepository('EarlsCorporateBundle:Corporatedirectors')
            ->findBy(array('corporateid' => $id));
       
        $membershiplist = $this->getDoctrine()
            ->getRepository('EarlsCorporateBundle:Memberships')
            ->findBy(array('corporateid' => $id));

        $jurisdictionlist = $this->getDoctrine()
            ->getRepository('EarlsCorporateBundle:Jurisdictions')
            ->findBy(array('corporateid' => $id));

        $selectedCorporation = new CorporationFinder();
        $selectedCorporation->setCorporation($corporationObj);
        $formRequested = $this->createForm(new CorporationFinderType(), $selectedCorporation);

        $request = $this->getRequest();
        $formRequested->handleRequest($request);


        if ($formRequested->isValid()) {
            $corporationObjRequested = $formRequested->getData()->getCorporation();
            $corporationID = $corporationObjRequested->getCorporateid();

            return $this->redirect($this->generateUrl('_corporateinformation_display', array('id' => $corporationID)));
        }
        
        $corpinfomodel = new CorpInfoModel();
        
        if (isset($corporationObj))
        	$corpinfomodel -> setCorporationInfo($corporationObj);
            $corpinfomodel -> setJurisdictionInfo($jurisdictionlist);         	
        	$corpinfomodel -> setCorpdirectorInfo($directorlist);
        	$corpinfomodel -> setMembershipInfo($membershiplist);           
        	
        	
        	$corpInfoForm = $this -> createForm(new CorpInfoType(), $corpinfomodel, array(
        		'action' => $this -> generateUrl('_corporateinformation_update', array('id' => $id))
        	));

        return $this->render('EarlsCorporateBundle:CorporateInformation:index.html.twig',
            array(
                'corpFinderForm' => $formRequested->createView(),
                'corpInfoForm' => $corpInfoForm->createView()
            )
        );

    }
    
    /**
     * @Route("/update/{id}", name="_corporateinformation_update")
     * @Template()
     */
  public function UpdateAction($id)
    {
        $request = $this->getRequest();

        $em = $this->getDoctrine()->getManager();

        $corpInfoObj = new CorpInfoModel();
        $corporation = $em->getRepository('EarlsCorporateBundle:Corporations')->find($id);
        $director = $em->getRepository('EarlsCorporateBundle:Corporatedirectors')->findBy(array('corporateid' => $id));
        $membership = $em->getRepository('EarlsCorporateBundle:Memberships')->findBy(array('corporateid' => $id));
        $jurisdiction = $em->getRepository('EarlsCorporateBundle:Jurisdictions')->findBy(array('corporateid' => $id));
        $corpInfoObj->setCorporationInfo($corporation);
        $corpInfoObj->setJurisdictionInfo($jurisdiction);
        $corpInfoObj->setCorpdirectorInfo($director);
        $corpInfoObj->setMembershipInfo($membership);

        $selectedCorporation = new CorporationFinder();
        $selectedCorporation->setCorporation($corporation);
        $formRequested = $this->createForm(new CorporationFinderType(), $selectedCorporation);

        $request = $this->getRequest();
        $formRequested->handleRequest($request);


        if ($formRequested->isValid()) {
            $corporationObjRequested = $formRequested->getData()->getCorporation();
            $corporationID = $corporationObjRequested->getCorporateid();

            return $this->redirect($this->generateUrl('_corporateinformation_display', array('id' => $corporationID)));
        }

        $form = $this->createForm(new CorpInfoType(), $corpInfoObj);

        if ($request->isMethod('POST')) {
            $form->submit($request);
            if ($form->isValid()) {
                $corporationObj = $corpInfoObj->getCorporationInfo();
                $jurisdictionArray = $corpInfoObj->getJurisdictionInfo();
                $directorArray = $corpInfoObj->getCorpdirectorInfo();
                $membershipArray = $corpInfoObj->getMembershipInfo();
                $this->add($jurisdictionArray,$corporationObj);
                $this->deleteJurisdiction($jurisdictionArray);
                $this->add($directorArray,$corporationObj);
                 $this->deleteDirector($directorArray);
                $this->add($membershipArray,$corporationObj);
                 $this->deleteMembership($membershipArray);
                $em->flush();
                return $this->redirect($this->generateUrl('_corporateinformation_display', array('id' => $id)));
            } else {

            }
        } else {

            print_r($request->getMethod());

        }


        return $this->render('EarlsCorporateBundle:CorporateInformation:index.html.twig',
            array(
                'corpFinderForm' => $formRequested->createView(),
                'corpInfoForm' => $form->createView()
            )
        );

    }

    private function add( $tempArray, Corporations $corporationObj){
        foreach($tempArray as $tempObj){
            if($tempObj->getCorporateid() == null){
            $tempObj->setCorporateid($corporationObj);
            $em = $this->getDoctrine()->getManager();
            $em->persist($tempObj);
            $em->flush();
            }
        }
    }

    private function deleteJurisdiction($tempArray){
        foreach($tempArray as $tempObj){
            if($tempObj->getRegistereddate() == null && $tempObj->getRegistrationnumber() == null){
                $em = $this->getDoctrine()->getManager();
                $em->remove($tempObj);
                $em->flush();
            }
        }
    }

    private function deleteDirector($tempArray){
        foreach($tempArray as $tempObj){
            if($tempObj->getPosition() == null){
                $em = $this->getDoctrine()->getManager();
                $em->remove($tempObj);
                $em->flush();
            }
        }
    }

    private function deleteMembership($tempArray){
        foreach($tempArray as $tempObj){
            if($tempObj->getNumberofshares() == null){
                $em = $this->getDoctrine()->getManager();
                $em->remove($tempObj);
                $em->flush();
            }
        }
    }


}

?>


