<?php

namespace Earls\LeaseBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Acme\DemoBundle\Form\ContactType;

// these import the "@Route" and "@Template" annotations
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class BuildingTypesController extends Controller
{
    /**
     * @Route("/", name="_building_types")
     * @Template()
     */
    public function indexAction()
    {
        return array();

		/*$province = $this->getDoctrine()
    	->getRepository('EarlsLeaseBundle:Provincestate')
    	->find($id);

    	if (!$province) {
    		throw $this->createNotFoundException(
    			'No province found for id '.$id
    			);
    	}

    	print_r($province->getDescription());

    	return array('province' => $province->getDescription());*/

    	

    	//$this->render('EarlsLeaseBundle:BuildingTypes:index.html.twig', array('province' => $province->getDescription() ));

    }

  	/**
     * @Route("/hello/{id}", name="_building_types_show")
     * @Template("EarlsLeaseBundle:BuildingTypes:index.html.twig")
     */
    public function showAction($id)
    {
    	
    	$province = $this->getDoctrine()
    	->getRepository('EarlsLeaseBundle:Provincestate')
    	->find($id);

    	if (!$province) {
    		throw $this->createNotFoundException(
    			'No province found for id '.$id
    			);
    	}

    	print_r($province->getDescription());

    	return array('province' => $province->getDescription());

    	

    	//$this->render('EarlsLeaseBundle:BuildingTypes:index.html.twig', array('province' => $province->getDescription() ));
    // ... do something, like pass the $product object into a template
    }



}

?>