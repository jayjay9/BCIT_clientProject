<?php

namespace Earls\CorporateBundle\Controller;

// import relevant entities
use Earls\CorporateBundle\Entity\Corporations;
use Earls\CorporateBundle\Entity\Offices;
use Earls\CorporateBundle\Entity\Jurisdictions;
use Earls\CorporateBundle\Entity\Corporatedirectors;
use Earls\CorporateBundle\Entity\Memberships;

// import models and types
use Earls\CorporateBundle\Form\Model\CorpInfoModel;
use Earls\CorporateBundle\Form\Type\CorpInfoType;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\BrowserKit\Request;
use Symfony\Component\HttpFoundation\Response;

class AddCorporationInformationController extends Controller {

    /**
     * @Route("/", name="_addCorporation")
     * @Template()
     */
    public function indexAction(){
       $corporation = new Corporations();
       //$office = new Offices();
       $jurisdiction = new Jurisdictions();
       $corpdirector = new Corporatedirectors();
       $membership = new Memberships();

       $corpinfomodel = new CorpInfoModel();
       $corpinfomodel->setCorporationInfo($corporation);
       //$corpinfomodel->setOfficeInfo($office);
       $corpinfomodel->setJurisdictionInfo($jurisdiction);
       $corpinfomodel->setCorpdirectorInfo($corpdirector);
       $corpinfomodel->setMembershipInfo($membership);


       $form = $this->createForm(new CorpInfoType, $corpinfomodel, array(
           'action' => $this->generateUrl('_addCorporationdata')
       ));

        return $this->render('EarlsCorporateBundle:CorporateInformation:addCorporation.html.twig',
            array(
                'corporateForm' => $form->createView()
            )
        );

    }

    /**
     * @Route("/addCorporationdata", name="_addCorporationdata")
     * @Template()
     */
    public function addCorporationdataAction(){

        $em = $this->getDoctrine()->getEntityManager();
        $form = $this->createForm(new CorpInfoType());

        $request = $this->getRequest();
        $form->handleRequest($request);

        if($form->isValid()){

             return $this->redirect($this->generateUrl('_corporateinformation'));
        
        }else{
            print_r('is not Valid');
            print_r($form->getErrorsAsString());
        }

        return $this->render('EarlsCorporateBundle:CorporateInformation:addCorporation.html.twig',
            array(
                'corporateForm' => $form->createView()
            )
        );

    }

} 