<?php

namespace Earls\LeaseBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Acme\DemoBundle\Form\ContactType;

// these import the "@Route" and "@Template" annotations
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

// these import the form
use Earls\LeaseBundle\Form\StoreInformation;

class StoreInformationController extends Controller
{
    /**
     * @Route("/", name="_storeinformation")
     * @Template()
     */
    public function indexAction()
    {
        //return array();

        $newInfo = new StoreInformation();
    	$form = $this->createForm(new StoreInformation(), $newInfo);

    	$request = $this->getRequest();
    	if($request->getMethod() == 'POST'){
    		$form->bindRequest($request);

    		if($form->isValid()){

    			return $this->redirect($this->generateUrl('_storeinformation'));
    		}
    	}

    	return $this->render('EarlsLeaseBundle:StoreInformation:index.html.twig', 
    		array(
    			'form'=> $form->createView()
    			)
    		);
    }

	
/*    public function storeInfoAction()
    {
    	
    }*/


}

?>