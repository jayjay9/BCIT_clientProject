<?php

// src/Acme/CorporateBundle/Controller/SummaryByCompanyController.php
namespace Earls\CorporateBundle\Controller;

use Earls\CorporateBundle\Entity\Corporations;
use Earls\CorporateBundle\Entity\Memberships;
use Earls\CorporateBundle\Entity\Directors;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;

// these import the "@Route" and "@Template" annotations
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class SummaryByCompanyController extends Controller

{
    /**
     * @Route("/", name="_shareholdersummary")
     * @Template()
     */
    public function indexAction()
    {   

        //

    	$companylist = $this->getDoctrine()
            ->getRepository('EarlsCorporateBundle:Memberships')
            ->findAll();

        $companyArray = array();
        $companyObj = array();

        foreach($companylist as $company){
        	$numberofshares = $company->getNumberofshares(); 
            
            //a link to grab data from Corporations table
            $corporationlink = $company->getCorporateid();

            $CorporationObj = $this->getDoctrine()
            ->getRepository('EarlsCorporateBundle:Corporations')
            ->findoneby(array('corporateid' => $corporationlink));

            if(empty($CorporationObj)){
            $CorporationObj = new Corporations();
            }

            $corporatename = $CorporationObj->getCorporatename();


            //Getting data from Directors table
            $directorlink = $company->getDirectorid();

            $DirectorObj = $this->getDoctrine()
            ->getRepository('EarlsCorporateBundle:Directors')
            ->findoneby(array('directorid' => $directorlink));

            if(empty($DirectorObj)){
            $DirectorObj = new Directors();
            }

            $directorname = $DirectorObj->getDirectorname();

            //Getting data from Sharetypes table
            $sharetypelink = $company->getSharetypeid();

            $SharetypeObj = $this->getDoctrine()
            ->getRepository('EarlsCorporateBundle:Sharetypes')
            ->findoneby(array('sharetypeid' => $sharetypelink));

            if(empty($SharetypeObj)){
            $SharetypeObj = new Sharetypes();
            }

            $sharetype = $SharetypeObj->getSharetype();


            //add everything into the companyObj
      		$companyObj = array(
        		'corporatename' => $corporatename,
                'directorname' => $directorname,
                'sharetype' => $sharetype,
                'numberofshares' => $numberofshares
        	);

        	array_push($companyArray, $companyObj);

    	}


        return $this->render('EarlsCorporateBundle:SummaryCompany:index.html.twig',
        	array(
                'shareholderByCompany' => $companyArray
            )
        );

    }

}



?>