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
     * @Route("/", name="_addcorporation")
     * @Template()
     */
    public function indexAction(){

       $corporation = new Corporations();

       $corpinfomodel = new CorpInfoModel();
       $corpinfomodel->setCorporationInfo($corporation);

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
        $form = $this->createForm(new CorpInfoType(), new CorpInfoModel);

        $request = $this->getRequest();
        $form->handleRequest($request);

        if($form->isValid()){

            $corporationInfo = $form->getData()->getCorporationInfo();
            $em->persist($corporationInfo);
            $em->flush();

            $jurisdictionInfo = $form->getData()->getJurisdictionInfo();
                foreach($jurisdictionInfo as $jurisdiction){
                    $jurisdiction->setCorporateid($corporationInfo);
                    $em->persist($jurisdiction);
                    $em->flush();
                }

            $directorInfo = $form->getData()->getCorpdirectorInfo();
                foreach($directorInfo as $director){
                    $director->setCorporateid($corporationInfo);
                    $em->persist($director);
                    $em->flush();
                }

            $membershipInfo = $form->getData()->getMembershipInfo();
                foreach($membershipInfo as $membership){
                    $membership->setCorporateid($corporationInfo);
                    $em->persist($membership);
                    $em->flush();
                }

             return $this->redirect($this->generateUrl('_corporateinformation'));
        
        }else{
            //print_r('is not Valid');
            //print_r($form->getErrorsAsString());
        }

        return $this->render('EarlsCorporateBundle:CorporateInformation:addCorporation.html.twig',
            array(
                'corporateForm' => $form->createView()
            )
        );

    }

} 