<?php

// src/Acme/CorporateBundle/Controller/SummaryByCompanyController.php
namespace Earls\CorporateBundle\Controller;

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
        return $this->render('EarlsCorporateBundle:SummaryCompany:index.html.twig');

    }

}

?>