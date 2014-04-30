<?php

// src/Acme/CorporateBundle/Controller/SummaryByShareholderController.php
namespace Earls\CorporateBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;

// these import the "@Route" and "@Template" annotations
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class SummaryByShareholderController extends Controller

{
    /**
     * @Route("/", name="_summaryshareholder")
     * @Template()
     */
    public function indexAction()
    {   
        return $this->render('EarlsCorporateBundle:SummaryShareholder:index.html.twig');

    }

}

?>