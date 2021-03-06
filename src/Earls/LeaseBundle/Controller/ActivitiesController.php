<?php

namespace Earls\LeaseBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Acme\DemoBundle\Form\ContactType;

// these import the "@Route" and "@Template" annotations
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class ActivitiesController extends Controller
{
    /**
     * @Route("/", name="_activities")
     * @Template()
     */
    public function indexAction()
    {
        return array();
    }

    /**
     * @Route("/storeinfo/{name}", name="_activities_storeinformation")
     * @Template()
     */
    public function storeinfoAction($name)
    {
        return array('name' => $name);
    }

    /**
     * @Route("/manageareas/{name}", name="_activities_manageArea")
     * @Template()
     */
    public function manageareasAction($name)
    {
        return array('name' => $name);
    }
}

?>