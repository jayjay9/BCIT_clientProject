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
     * @Route("/", name="_summarycompany")
     * @Template()
     */
    public function indexAction()
    {   
    	$companylist = $this->getDoctrine()
            ->getRepository('EarlsCorporateBundle:Corporations')
            ->findAll();

        $companyArray = array();
        $companyObj = array();

        foreach($companylist as $company){
        	$corporateName = $company->getCorporatename(); 
        

      		$companyObj = array(
        		'corporateName' => $corporateName
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