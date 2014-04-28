<?php

// src/Acme/CorporateBundle/Controller/CorporateInformationController.php
namespace Earls\CorporateBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;

// these import the "@Route" and "@Template" annotations
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class CorporateInformationController extends Controller

{
    /**
     * @Route("/", name="_corporateinformation")
     * @Template()
     */
    public function indexAction()
    {   
        return $this->render('EarlsCorporateBundle:CorporateInformation:index.html.twig');

    }

}

?>