<?php
/**
 * Created by PhpStorm.
 * User: JayJay
 * Date: 11/23/13
 * Time: 2:48 PM
 */

namespace Earls\LeaseBundle\Controller;

use Earls\LeaseBundle\Entity\Leasecriticaltasks;
use Earls\LeaseBundle\Entity\Liquorlicenses;
use Earls\LeaseBundle\Entity\Rentandmaintenances;
use Earls\LeaseBundle\Entity\Utilities;
use Earls\LeaseBundle\Entity\Restaurants;
use Earls\LeaseBundle\Entity\Riskinfo;
use Earls\LeaseBundle\Entity\Leases;
use Earls\LeaseBundle\Entity\Leasereportsinfo;
use Earls\LeaseBundle\Entity\Renewals;
use Earls\LeaseBundle\Entity\Areas;
use Earls\LeaseBundle\Entity\Licenses;
use Earls\LeaseBundle\Form\Model\LeasesModel;
use Earls\LeaseBundle\Form\Model\DropDownModel;
use Earls\LeaseBundle\Form\Model\StoreCollectionModel;
use Earls\LeaseBundle\Form\Model\StoreInformationModel;
use Earls\LeaseBundle\Form\Type\StoreCollectionType;
use Earls\LeaseBundle\Form\Type\LeaseCriticalTasksType;
use Earls\LeaseBundle\Form\Type\StoreInformationType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\BrowserKit\Request;
use Symfony\Component\HttpFoundation\Response;


class AddStoreInformationController extends Controller {

    /**
     * @Route("/", name="_addStore")
     * @Template()
     */
    public function indexAction(){
       $restaurant = new Restaurants();
       $liquorlicense = new Liquorlicenses();
       $riskinfo = new Riskinfo();
       $licenseinfo = new Licenses();
       $rentandmaintenance = new Rentandmaintenances();

        $utilitiestype1 = $this->getDoctrine()
            ->getRepository('EarlsLeaseBundle:Utilitytypes')
            ->find(1);

        $utilitiestype2 = $this->getDoctrine()
            ->getRepository('EarlsLeaseBundle:Utilitytypes')
            ->find(2);

        $utilitiestype3 = $this->getDoctrine()
            ->getRepository('EarlsLeaseBundle:Utilitytypes')
            ->find(3);

       $utilities1 = new Utilities();
       $utilities1->setUtilitytypeid($utilitiestype1);

       $utilities2 = new Utilities();
        $utilities2->setUtilitytypeid($utilitiestype2);

       $utilities3 = new Utilities();
        $utilities3->setUtilitytypeid($utilitiestype3);

       $storeinfomodel = new StoreInformationModel();
       $storeinfomodel->setRestaurantinfo($restaurant);
       $storeinfomodel->setLiquorlicense($liquorlicense);
       $storeinfomodel->setLicenseinfo($licenseinfo);
       $storeinfomodel->setRiskinfo($riskinfo);
       $storeinfomodel->getRentandmaintenance($rentandmaintenance);
       $storeinfomodel->setUtilities1($utilities1);
       $storeinfomodel->setUtilities2($utilities2);
       $storeinfomodel->setUtilities3($utilities3);

       $leaseinfo = new Leases();
       $leasereportinfo = new Leasereportsinfo();

       $leasecriticaltasksObj = array();
       $leasecriticaltasks= new Leasecriticaltasks();
       array_push($leasecriticaltasksObj, $leasecriticaltasks);

       $renewalsObj = array();
       $renewals = new Renewals();
      array_push($renewalsObj, $renewals);

       $leaseinfomodel = new LeasesModel();
       $leaseinfomodel->setLeaseinfo($leaseinfo);
       $leaseinfomodel->setLeasereportinfo($leasereportinfo);
       $leaseinfomodel->setLeasecriticaltasks($leasecriticaltasksObj);
       $leaseinfomodel->setRenewals($renewalsObj);

       $area1 = new Areas();
       $area2 = new Areas();
       $area3 = new Areas();

       $manageareamodel = new DropDownModel();
       $manageareamodel->setArea1($area1);
       $manageareamodel->setArea2($area2);
       $manageareamodel->setArea3($area3);

       $addStoreModel = new StoreCollectionModel();
       $addStoreModel->setStoreInfoForm($storeinfomodel);
       $addStoreModel->setLeaseInfoForm($leaseinfomodel);
       $addStoreModel->setManageAreaForm($manageareamodel);

       $form = $this->createForm(new StoreCollectionType, $addStoreModel, array(
           'action' => $this->generateUrl('_addStoredata')
       ));

        return $this->render('EarlsLeaseBundle:StoreInformation:addStore.html.twig',
            array(
                'addStoreForm' => $form->createView()
            )
        );

    }

    /**
     * @Route("/addStoredata", name="_addStoredata")
     * @Template()
     */
    public function addStoredataAction(){

        $em = $this->getDoctrine()->getEntityManager();
        $form = $this->createForm(new StoreCollectionType(), new StoreCollectionModel());

        $request = $this->getRequest();
        $form->handleRequest($request);

        if($form->isValid()){

            $storeinfo = $form->getData()->getStoreInfoForm();
                $licenseinfo = $storeinfo->getLicenseinfo();
                    $em->persist($licenseinfo);
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

             return $this->redirect($this->generateUrl('_storeinformation'));
        }else{
            print_r('is not Valid');
            print_r($form->getErrorsAsString());
        }

        return $this->render('EarlsLeaseBundle:StoreInformation:addStore.html.twig',
            array(
                'addStoreForm' => $form->createView()
            )
        );

    }
} 