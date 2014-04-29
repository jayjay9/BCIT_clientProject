<?php

// src/Acme/CorporateBundle/Controller/CorporateManageTablesController.php
namespace Earls\CorporateBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;

// these import the "@Route" and "@Template" annotations
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class CorporateManageTablesController extends Controller

{
    /**
     * @Route("/", name="_corporate_manage_tables")
     * @Template()
     */
    public function indexAction()
    {   
        return $this->render('EarlsCorporateBundle:CorporateManageTables:index.html.twig');

    }

}

?>