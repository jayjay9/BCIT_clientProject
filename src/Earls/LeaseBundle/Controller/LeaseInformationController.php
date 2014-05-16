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
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Collections\ArrayCollection;

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
        $countLease = 0;

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

            $renewalObj = $this->getDoctrine()
            ->getRepository('EarlsLeaseBundle:Renewals')
            ->findBy(array('leaseid' => $leaseId));

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

            $countLease++;
        }

        $request = $this->getRequest();
        $leasecollection = new LeaseCollectionModel();
        $leasecollection->setLeaseInfo($formarray);
        $collectionform = $this->createForm(new LeaseCollectionType(), $leasecollection);

        $leaseInfoArray = array();

        if ($request->isMethod('POST')) {
            $collectionform->submit($request);
            if ($collectionform->isValid()) {
                $leaseInfoArray = $leasecollection->getLeaseInfo();
                $lastLeaseObj = end($leaseInfoArray);
                $leaseObj = $lastLeaseObj->getLeaseinfo();
                foreach($leaseInfoArray as $lease){
                    $leaseRenewals = $lease->getRenewals();
                    foreach($leaseRenewals as $leaseRenewal){
                        if($leaseRenewal->getLeaseid() == null && $leaseRenewal->getTerm() != null){
                            $leaseRenewal->setLeaseid($leaseObj);
                            $em = $this->getDoctrine()->getManager();
                            $em->persist($leaseRenewal);
                            $em->flush();
                        }elseif($leaseRenewal->getTerm() == null && $leaseRenewal->getExercised() == 0 && $leaseRenewal->getShowinleasereport() == 0){
                            $em = $this->getDoctrine()->getManager();
                            $em->remove($leaseRenewal);
                            $em->flush();
                        }
                    }
                    $leaseTasks = $lease->getLeasecriticaltasks();
                    foreach($leaseTasks as $leaseTask){
                        if($leaseTask->getLeasecriticaltaskid() == null){
                            $leaseTask->setLeaseid($leaseObj);
                            $em = $this->getDoctrine()->getManager();
                            $em->persist($leaseTask);
                            $em->flush();
                        }elseif($leaseTask->getCtdate() == null && $leaseTask->getCtclause() == null && $leaseTask->getCtdescription() == null){
                            $em = $this->getDoctrine()->getManager();
                            $em->remove($leaseTask);
                            $em->flush();
                        }

                    }
                }
                $em->flush();
                return $this->redirect($this->generateUrl('_leaseinformation', array('id' => $id)));
            }else{
                //print_r($collectionform->getErrorsAsString());
            }
        }

        return $this->render('EarlsLeaseBundle:LeaseInformation:index.html.twig',
            array(
                'leaseInfoForm' => $collectionform->createView(),
                'leaseCount' => $countLease,
                'restaurantId' => $id,
                'restaurantName' => $restaurantName
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

}