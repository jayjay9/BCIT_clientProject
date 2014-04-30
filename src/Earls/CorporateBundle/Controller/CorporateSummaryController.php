<?php

// src/Acme/CorporateBundle/Controller/CorporateSummaryController.php
namespace Earls\CorporateBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;

// these import the "@Route" and "@Template" annotations
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class CorporateSummaryController extends Controller

{
    /**
     * @Route("/", name="_corporatesummary")
     * @Template()
     */
    public function indexAction()
    {   
        return $this->render('EarlsCorporateBundle:CorporateSummary:index.html.twig');

    }

}

?>