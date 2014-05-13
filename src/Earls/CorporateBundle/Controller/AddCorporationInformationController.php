<?php

namespace Earls\CorporateBundle\Controller;

// import relevant entities
use Earls\CorporateBundle\Entity\Corporations;
use Earls\CorporateBundle\Entity\Offices;
use Earls\CorporateBundle\Entity\Jurisdictions;
use Earls\CorporateBundle\Entity\Directors;
use Earls\CorporateBundle\Entity\Membership;

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
       $office = new Offices();
       $jurisdiction = new Jurisdictions();
       $director = new Directors();
       $membership = new Memberships();

       $corpinfomodel = new CorpInfoModel();
       $corpinfomodel->setCorporationInfo($corporation);
       $corpinfomodel->setOfficeInfo($office);
       $corpinfomodel->setJurisdictionInfo($jurisdiction);
       $corpinfomodel->setDirectorInfo($director);
       $corpinfomodel->setMembershipInfo($membership);


       $form = $this->createForm(new CorpInfoType, $corpinfomodel, array(
           'action' => $this->generateUrl('_addcorpdata')
       ));

        return $this->render('EarlsCorporateBundle:CorporateInformation:addCorporation.html.twig',
            array(
                'addCorporationForm' => $form->createView()
            )
        );

    }

    /**
     * @Route("/addcorporationdata", name="_addcorporationdata")
     * @Template()
     */
    public function addStoredataAction(){

        $em = $this->getDoctrine()->getEntityManager();
        $form = $this->createForm(new CorpInfoTypeType(), new CorpInfoModel());

        $request = $this->getRequest();
        $form->handleRequest($request);

        if($form->isValid()){

            $corporationinfo = $form->getData()->getCorporationInfo();
                
                

                //do at end
                $em->persist($corporationinfo);
                $em->flush();






                $restaurant = $storeinfo->getRestaurantinfo();
                $restaurant->setLicenseid($licenseinfo);
                    $em->persist($restaurant);
                    $em->flush();

                $liquorlicense = $storeinfo->getLiquorlicense();
                $liquorlicense->setRestaurantid($restaurant);
                    $em->persist($liquorlicense);
                    $em->flush();

                $riskinfo = $storeinfo->getRiskinfo();
                $riskinfo->setRestaurantid($restaurant);
                    $em->persist($riskinfo);
                    $em->flush();

                $rentandmaintenance = $storeinfo->getRentandmaintenance();
                $rentandmaintenance->setRestaurantid($restaurant);
                    $em->persist($rentandmaintenance);
                    $em->flush();

            $utilitiestype1 = $this->getDoctrine()
                ->getRepository('EarlsLeaseBundle:Utilitytypes')
                ->find(1);

            $utilitiestype2 = $this->getDoctrine()
                ->getRepository('EarlsLeaseBundle:Utilitytypes')
                ->find(2);

            $utilitiestype3 = $this->getDoctrine()
                ->getRepository('EarlsLeaseBundle:Utilitytypes')
                ->find(3);

                $utilities1 = $storeinfo->getUtilities1();
                $utilities1->setRestaurantid($restaurant);
                $utilities1->setUtilitytypeid($utilitiestype1);
                    $em->persist($utilities1);
                    $em->flush();

                $utilities2 = $storeinfo->getUtilities2();
                $utilities2->setRestaurantid($restaurant);
                $utilities2->setUtilitytypeid($utilitiestype2);
                    $em->persist($utilities2);
                    $em->flush();

                $utilities3 = $storeinfo->getUtilities3();
                $utilities3->setRestaurantid($restaurant);
                $utilities3->setUtilitytypeid($utilitiestype3);
                    $em->persist($utilities3);
                    $em->flush();

            $leaseinfo = $form->getData()->getLeaseInfoForm();
                $leaseinformation= $leaseinfo->getLeaseinfo();
                $leaseinformation->setRestaurantid($restaurant);
                    $em->persist($leaseinformation);
                    $em->flush();

                $leasereportinfo = $leaseinfo->getLeasereportinfo();
                $leasereportinfo->setLeaseid($leaseinformation);
                    $em->persist($leasereportinfo);
                    $em->flush();

                $leasecriticaltask = $leaseinfo->getLeasecriticaltasks();
                foreach($leasecriticaltask as $task){
                    $task->setLeaseid($leaseinformation);
                    $em->persist($task);
                    $em->flush();
                }

                $renewals = $leaseinfo->getRenewals();
                foreach($renewals as $renewal){
                    $renewal->setLeaseid($leaseinformation);
                    $em->persist($renewal);
                    $em->flush();
                }

            $areatypeid1 = $this->getDoctrine()
                ->getRepository('EarlsLeaseBundle:Areatypes')
                ->find(1);

            $areatypeid2 = $this->getDoctrine()
                ->getRepository('EarlsLeaseBundle:Areatypes')
                ->find(2);

            $areatypeid3 = $this->getDoctrine()
                ->getRepository('EarlsLeaseBundle:Areatypes')
                ->find(3);

            $managearea = $form->getData()->getManageAreaForm();
                $area1 = $managearea->getArea1();
                $area1->setRestaurantid($restaurant);
                $area1->setAreatypeid($areatypeid1);
                    $em->persist($area1);
                    $em->flush();

                $area2 = $managearea->getArea2();
                $area2->setRestaurantid($restaurant);
                $area2->setAreatypeid($areatypeid2);
                    $em->persist($area2);
                    $em->flush();

                $area3 = $managearea->getArea3();
                $area3->setRestaurantid($restaurant);
                $area3->setAreatypeid($areatypeid3);
                    $em->persist($area3);
                    $em->flush();

             return $this->redirect($this->generateUrl('_corporateinformation'));
        }else{
            print_r('is not Valid');
            print_r($form->getErrorsAsString());
        }

        return $this->render('EarlsCorporateBundle:CorporateInformation:addCorporation.html.twig',
            array(
                'addCorporationForm' => $form->createView()
            )
        );

    }
} 