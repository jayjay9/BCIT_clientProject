<?php


namespace Earls\LeaseBundle\Controller;

use Earls\LeaseBundle\Entity\Leasereportsinfo;
use Earls\LeaseBundle\Entity\Leases;
use Earls\LeaseBundle\Entity\Leasecriticaltasks;
use Earls\LeaseBundle\Entity\Renewals;
use Earls\LeaseBundle\Entity\Restaurants;
use Earls\LeaseBundle\Form\Model\LeaseCollectionModel;
use Earls\LeaseBundle\Form\Type\LeaseCollectionType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Doctrine\ORM\NoResultException;
use Earls\LeaseBundle\Form\Model\LeasesModel;
use Earls\LeaseBundle\Form\Type\LeasesType;
use Earls\LeaseBundle\Form\Type\LeasesInfoType;
use Earls\LeaseBundle\Form\Type\LeaseCriticalTasksType;
use Earls\LeaseBundle\Form\Type\RenewalsType;

class LeaseInformationController extends Controller{

    /**
     * @Route("/{id}", name="_leaseinformation")
     * @Template()
     */
    public function indexAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $restaurantObj = $this->getDoctrine()
            ->getRepository('EarlsLeaseBundle:Restaurants')
            ->find($id);

        $restaurantName = $restaurantObj->getStorenickname();

        $leaseinfo = $this->getDoctrine()
            ->getRepository('EarlsLeaseBundle:Leases')
            ->findBy(array('restaurantid' => $id));

        $formarray = array();

        if(empty($leaseinfo)){
            $leaseinfoObj = new Leases();
            $leaseinfo = array();
            $this->addLeaseinfo($leaseinfoObj, $restaurantObj);
            array_push($leaseinfo, $leaseinfoObj);
        }


        foreach($leaseinfo as $leaseinfoObj){

        $leaseId = $leaseinfoObj->getLeaseid();

        $leasereportinfoObj = $this->getDoctrine()
            ->getRepository('EarlsLeaseBundle:Leasereportsinfo')
            ->findOneBy(array('leaseid' => $leaseId));

        if(empty($leasereportinfoObj)) {
            $leasereportinfoObj = new Leasereportsinfo();
            $this->addLeaseReportInfoEntry($leasereportinfoObj, $leaseinfoObj);
        }

        $leasecriticaltaskObj = $this->getDoctrine()
            ->getRepository('EarlsLeaseBundle:Leasecriticaltasks')
            ->findBy(array('leaseid' => $leaseId));

        if(empty($leasecriticaltaskObj)) {
            $leasecriticaltaskObj = new Leasecriticaltasks();
            $this->addLeaseCriticalTaskEntry($leasecriticaltaskObj, $leaseinfoObj);
            $temparray = array();
            array_push($temparray, $leasecriticaltaskObj);
            $leasecriticaltaskObj = array();
            $leasecriticaltaskObj = $temparray;
        }

        $renewalObj = $this->getDoctrine()
            ->getRepository('EarlsLeaseBundle:Renewals')
            ->findBy(array('leaseid' => $leaseId));

        if(empty($renewalObj)) {
            $renewalObj = new Renewals();
            $this->addRenewalEntry($renewalObj, $leaseinfoObj);
            $temparray = array();
            array_push($temparray, $renewalObj);
            $renewalObj = array();
            $renewalObj = $temparray;
        }

        $model = new LeasesModel();

        if (isset($leaseinfoObj))
        $model->setLeaseInfo($leaseinfoObj);
        $model->setLeaseid($leaseId);

        if (isset($leasereportinfoObj))
        $model->setLeasereportinfo($leasereportinfoObj);

        if (isset($leasecriticaltaskObj))
        $model->setLeasecriticaltasks($leasecriticaltaskObj);

        if (isset($renewalObj))
        $model->setRenewals($renewalObj);

        array_push($formarray, $model);
    }

        $request = $this->getRequest();
        $leasecollection = new LeaseCollectionModel();
        $leasecollection->setLeaseInfo($formarray);
        $leasecollection->setrestaurantName($restaurantName);
        $leasecollection->setrestaurantid($id);
        $collectionform = $this->createForm(new LeaseCollectionType(), $leasecollection);

        if ($request->isMethod('POST')) {
            $collectionform->submit($request);
            if ($collectionform->isValid()) {
                $em->flush();
                return $this->redirect($this->generateUrl('_leaseinformation', array('id' => $id)));
            }else{
                print_r($collectionform->getErrorsAsString());
            }
        }

        return $this->render('EarlsLeaseBundle:LeaseInformation:index.html.twig',
            array(
                'leaseInfoForm' => $collectionform->createView()
            )
        );
    }

    private function addLeaseinfo(Leases $lease, Restaurants $restaurant){

        $lease->setRestaurantid($restaurant);

        $em = $this->getDoctrine()->getManager();
        $em->persist($lease);
        $em->flush();

        return 1;
    }

    private function addLeaseReportInfoEntry(Leasereportsinfo $leasereportsinfo, Leases $lease){
        $leasereportsinfo->setLeaseid($lease);
        $em = $this->getDoctrine()->getManager();
        $em->persist($leasereportsinfo);
        $em->flush();

        return 1;
    }

    private function addLeaseCriticalTaskEntry(Leasecriticaltasks $leasecriticaltask, Leases $lease){
        $leasecriticaltask->setLeaseid($lease);
        $em = $this->getDoctrine()->getManager();
        $em->persist($leasecriticaltask);
        $em->flush();

        return 1;
    }

    private function addRenewalEntry(Renewals $renewal, Leases $lease){
        $renewal->setLeaseid($lease);
        $em = $this->getDoctrine()->getManager();
        $em->persist($renewal);
        $em->flush();

        return 1;
    }

    /**
     * @Route("/getRenewal/{id}", name="_getRenewal_id")
     * @Template()
     */
    public function getRenewalAction($id)
    {
        $renewal = new Renewals();

        $form = $this->createForm(new RenewalsType(), $renewal, array(
            'action' => $this->generateUrl('_addRenewal_id', array('id' => $id))
        ));

        return $this->render('EarlsLeaseBundle:LeaseInformation:renewals.html.twig',
            array(
                'renewalForm' => $form->createView()
            )
        );
    }

    /**
     * @Route("/addRenewal/{id}", name="_addRenewal_id")
     * @Template()
     */
    public function addRenewalAction($id)
    {

        $leaseObj = $this->getDoctrine()
            ->getRepository('EarlsLeaseBundle:Leases')
            ->find($id);

        $restaurantid = $leaseObj->getRestaurantid()->getRestaurantid();

        $request = $this->getRequest();

        $em= $this->getDoctrine()->getEntityManager();

        $renewal = new Renewals();
        $renewal->setLeaseid($leaseObj);

        $form = $this->createForm(new RenewalsType(),$renewal);

        $form->handleRequest($request);

        if($form->isValid()){

            $renewals = $form->getData();
            $em->persist($renewals);
            $em->flush();

            return $this->redirect($this->generateUrl('_leaseinformation', array('id' => $restaurantid)));

        }

        return $this->render('EarlsLeaseBundle:LeaseInformation:renewals.html.twig',
            array(
                'renewalForm' => $form->createView()
            )
        );
    }

    /**
     * @Route("/getTasks/{id}", name="_getTasks_id")
     * @Template()
     */
    public function getTasksAction($id)
    {
        $tasks = new Leasecriticaltasks();

        $form = $this->createForm(new LeaseCriticalTasksType(), $tasks, array(
            'action' => $this->generateUrl('_addTasks_id', array('id' => $id))
        ));

        return $this->render('EarlsLeaseBundle:LeaseInformation:tasks.html.twig',
            array(
                'tasksForm' => $form->createView()
            )
        );
    }

    /**
     * @Route("/addTasks/{id}", name="_addTasks_id")
     * @Template()
     */
    public function addTasksAction($id)
    {

        $leaseObj = $this->getDoctrine()
            ->getRepository('EarlsLeaseBundle:Leases')
            ->find($id);

        $restaurantid = $leaseObj->getRestaurantid()->getRestaurantid();

        $request = $this->getRequest();

        $em= $this->getDoctrine()->getEntityManager();

        $tasks = new Leasecriticaltasks();
        $tasks->setLeaseid($leaseObj);

        $form = $this->createForm(new LeaseCriticalTasksType(),$tasks);

        $form->handleRequest($request);

        if($form->isValid()){

            $tasks = $form->getData();
            $em->persist($tasks);
            $em->flush();

            return $this->redirect($this->generateUrl('_leaseinformation', array('id' => $restaurantid)));

        }

        return $this->render('EarlsLeaseBundle:LeaseInformation:tasks.html.twig',
            array(
                'tasksForm' => $form->createView()
            )
        );
    }

}