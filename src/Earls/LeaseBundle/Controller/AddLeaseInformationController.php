<?php
/**
 * Created by PhpStorm.
 * User: JayJay
 * Date: 11/25/13
 * Time: 5:32 PM
 */

namespace Earls\LeaseBundle\Controller;

use Earls\LeaseBundle\Entity\Leasecriticaltasks;
use Earls\LeaseBundle\Entity\Leases;
use Earls\LeaseBundle\Form\Model\LeasesModel;
use Earls\LeaseBundle\Form\Type\LeasesInfoType;
use Earls\LeaseBundle\Entity\Leasereportsinfo;
use Earls\LeaseBundle\Entity\Renewals;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\BrowserKit\Request;
use Symfony\Component\HttpFoundation\Response;

class AddLeaseInformationController extends Controller {

    /**
     * @Route("/{id}", name="_addLease_id")
     * @Template()
     */
    public function indexAction($id){

        $restaurant = $this->getDoctrine()
            ->getRepository('EarlsLeaseBundle:Restaurants')
            ->find($id);

        $restaurantNickname = $restaurant->getStorenickname();
        $storearray = array('restaurantNickname' => $restaurantNickname);

        $lease = new Leases();
        $leaseReportsinfo = new Leasereportsinfo();

        $leasecriticaltasksObj = array();
        $leasecriticaltasks= new Leasecriticaltasks();
        array_push($leasecriticaltasksObj, $leasecriticaltasks);

        $renewalsObj = array();
        $renewals = new Renewals();
        array_push($renewalsObj, $renewals);

        $leaseinfoModel = new LeasesModel();
        $leaseinfoModel->setLeaseinfo($lease);
        $leaseinfoModel->setLeasereportinfo($leaseReportsinfo);
        $leaseinfoModel->setLeasecriticaltasks($leasecriticaltasksObj);
        $leaseinfoModel->setRenewals($renewalsObj);

        $form = $this->createForm(new LeasesInfoType(), $leaseinfoModel, array(
            'action' => $this->generateUrl('_addLeasedata_id', array('id' => $id))
        ));

        return $this->render('EarlsLeaseBundle:LeaseInformation:addLease.html.twig',
            array(
                'leaseInfoForm' => $form->createView(),
                'restaurantInfo' => $storearray
            )
        );
    }

    /**
     * @Route("/addLease/{id}", name="_addLeasedata_id")
     * @Template()
     */
    public function addAction($id){

        $em = $this->getDoctrine()->getEntityManager();

        $restaurant = $this->getDoctrine()
            ->getRepository('EarlsLeaseBundle:Restaurants')
            ->find($id);
            
        $restaurantNickname = $restaurant->getStorenickname();
        $storearray = array('restaurantNickname' => $restaurantNickname);

        $form = $this->createForm(new LeasesInfoType(), new LeasesModel());

        $request = $this->getRequest();
        $form->handleRequest($request);

        if($form->isValid()){
            $data = $form->getData();

                $leaseinfo = $data->getLeaseinfo();
                $leaseinfo->setRestaurantid($restaurant);
                $em->persist($leaseinfo);
                $em->flush();

                $leasereport = $data->getLeasereportinfo();
                $leasereport->setLeaseid($leaseinfo);
                $em->persist($leasereport);
                $em->flush();

                $criticaltasklist = $data->getLeasecriticaltasks();
                foreach($criticaltasklist as $criticaltask){
                    $criticaltask->setLeaseid($leaseinfo);
                    $em->persist($criticaltask);
                    $em->flush();
                }

                $renewalslist = $data->getRenewals();
                foreach($renewalslist as $renewal){
                    $renewal->setLeaseid($leaseinfo);
                    $em->persist($renewal);
                    $em->flush();
                }

            return $this->redirect($this->generateUrl('_leaseinformation', array('id' => $id)));
        }else{
            //print_r($form->getErrorsAsString());
        }

        return $this->render('EarlsLeaseBundle:LeaseInformation:addLease.html.twig',
            array(
                'leaseInfoForm' => $form->createView(),
                'restaurantInfo' => $storearray
            )
        );

    }
} 