<?php

namespace Earls\LeaseBundle\Controller;

use Doctrine\Tests\Common\Annotations\Null;
use Earls\LeaseBundle\Entity\Liquorlicenses;
use Earls\LeaseBundle\Entity\Rentandmaintenances;
use Earls\LeaseBundle\Entity\Riskinfo;
use Earls\LeaseBundle\Entity\Utilities;
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


        $liquorlicenseidObj = $this->getDoctrine()
            ->getRepository('EarlsLeaseBundle:Liquorlicenses')
            ->findOneBy(array(
                'restaurantid' => $id
            ));
        if(empty($liquorlicenseidObj)) {
            $liquorlicensesObj = new Liquorlicenses();
            $this->addLiquorLicenseEntry($liquorlicensesObj, $restaurantObj);
        }


        $riskinfoObj = $this->getDoctrine()
            ->getRepository('EarlsLeaseBundle:Riskinfo')
            ->findOneBy(array(
                'restaurantid' => $id
            ));
        if(empty($riskinfoObj)){
            $this->addRiskInfoEntry(new Riskinfo(), $restaurantObj);
        }

        $rentandmaintenancesObj = $this->getDoctrine()
            ->getRepository('EarlsLeaseBundle:Rentandmaintenances')
            ->findOneBy(array(
                'restaurantid' => $id
            ));
        if(empty($rentandmaintenancesObj)){
            $this->addRentAndMaintenanceEntry(new Rentandmaintenances(), $restaurantObj);
        }

        $utilitiesObj = $this->getDoctrine()
            ->getRepository('EarlsLeaseBundle:Utilities')
            ->findOneBy(array(
                'restaurantid' => $id
            ));
        if(empty($utilitiesObj)){
            $this->addUtilitiesEntry(new Utilities(), $restaurantObj);
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

        if (isset($restaurantObj) )
        $storeinformationnmodel->setRestaurantinfo($restaurantObj);
        if(isset($liquorlicensesObj))
        $storeinformationnmodel->setLiquorlicense($liquorlicensesObj);
        if(isset($riskinfoObj))
        $storeinformationnmodel->setRiskinfo($riskinfoObj);
        if(isset($rentandmaintenancesObj))
        $storeinformationnmodel->setRentandmaintenance($rentandmaintenancesObj);
        if(isset($utilitiesObj))
        $storeinformationnmodel->setUtilities($utilitiesObj);

        $storeInfoForm = $this->createForm(new StoreInformationType(), $storeinformationnmodel, array(
            'action' => $this->generateUrl('_storeinformation_update', array('id' => $id))
        ));


        return $this->render('EarlsLeaseBundle:StoreInformation:index.html.twig',
            array(
                'storeFinderForm' => $formRequested->createView(),
                'storeInfoForm' => $storeInfoForm->createView()
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


        $liquorlicenseidObj = $em->getRepository('EarlsLeaseBundle:Liquorlicenses')->findOneBy(array(
            'restaurantid' => $id
        ));
        if(isset($liquorlicenseidObj)){
             $storeInfoObj->setLiquorlicense($liquorlicenseidObj);
        }

        $riskinfo = $em->getRepository('EarlsLeaseBundle:Riskinfo')->findOneBy(array(
            'restaurantid' => $id
        ));
        if(isset($riskinfo))
        $storeInfoObj->setRiskinfo($riskinfo);

        $rentandmaintenance = $em->getRepository('EarlsLeaseBundle:Rentandmaintenances')->findOneBy(array(
            'restaurantid' => $id
        ));
        if(isset($rentandmaintenance))
        $storeInfoObj->setRentandmaintenance($rentandmaintenance);

        $utilities = $em->getRepository('EarlsLeaseBundle:Utilities')->findOneBy(array(
            'restaurantid' => $id
        ));
        if(isset($utilities))
        $storeInfoObj->setUtilities($utilities);


        $form = $this->createForm(new StoreInformationType(), $storeInfoObj);


        if ($request->isMethod('POST')) {
            $form->submit($request);

            if ($form->isValid()) {

                $em->flush();
                return $this->redirect($this->generateUrl('_storeinformation_display', array('id' => $id)));

            }else{

                print_r('is not Valid');
                print_r($form->getErrorsAsString());

            }
        }else{

            print_r($request->getMethod());

        }


        return $this->render('EarlsLeaseBundle:StoreInformation:index.html.twig',
            array('form' => $form->createView())
        );

    }

    private function addLiquorLicenseEntry(Liquorlicenses $liquorlicense, Restaurants $id){
        $liquorlicense->setRestaurantid($id);
        $liquorlicense->setBusinesslicense(Null);
        $liquorlicense->setLiquorlicense(Null);
        $liquorlicense->setLicensedate('0000-00-00');

        $em = $this->getDoctrine()->getManager();
        $em->persist($liquorlicense);
        $em->flush();

        return 1;
    }

    private function addRiskInfoEntry(Riskinfo $riskinfo, Restaurants $id){
        $riskinfo->setRestaurantid($id);

        $em = $this->getDoctrine()->getManager();
        $em->persist($riskinfo);
        $em->flush();

        return 1;
    }

    private function addRentAndMaintenanceEntry(Rentandmaintenances $rentandmaintenance, Restaurants $id){
        $rentandmaintenance->setRestaurantid($id);

        $em = $this->getDoctrine()->getManager();
        $em->persist($rentandmaintenance);
        $em->flush();

        return 1;
    }

    private function addUtilitiesEntry(Utilities $utilities, Restaurants $id){
        $utilities->setRestaurantid($id);

        $em = $this->getDoctrine()->getManager();
        $em->persist($utilities);
        $em->flush();

        return 1;
    }

}

?>