<?php

namespace Earls\LeaseBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
    	$leasereportAll = $this->getDoctrine()
            ->getRepository('EarlsLeaseBundle:Leasereportsinfo')
			->findAll();

		$today = date('Y-m-d');
		$nextMonth = date('Y-m-d', strtotime("+1 month"));
		$arrayDuedate = array();
		$arrayDueInAMonth = array();
		$total = 0;

		foreach ($leasereportAll as $leasereportObj){
			$duedate = $leasereportObj->getDuedate();
			if($duedate == null){
				$duedate = '0-0-0';
			}else{
    			$duedate = $duedate->format('Y-m-d');
    		}
			if($duedate <= $today && $duedate != '0-0-0' ){
				$restaurantid = $leasereportObj->getLeaseid()->getRestaurantid()->getRestaurantid();
				$restaurantName = $leasereportObj->getLeaseid()->getRestaurantid()->getStorenickname();
				array_push($arrayDuedate,array("name"=>$restaurantName,"due"=>$duedate, "id"=>$restaurantid));
				$total++;
			}elseif($duedate >= $today && $duedate <= $nextMonth ){
				$restaurantid = $leasereportObj->getLeaseid()->getRestaurantid()->getRestaurantid();
				$restaurantName = $leasereportObj->getLeaseid()->getRestaurantid()->getStorenickname();
				array_push($arrayDueInAMonth,array("name"=>$restaurantName,"due"=>$duedate, "id"=> $restaurantid));
				$total++;
			}else{

			}
		};

        return $this->render('EarlsLeaseBundle:Default:index.html.twig',
        	array(
                'dueDates' => $arrayDuedate,
                'dueDatesinAMonth' => $arrayDueInAMonth,
                'total' => $total
            )
        );
    }
}
