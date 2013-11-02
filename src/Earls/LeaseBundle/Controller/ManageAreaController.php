<?php

namespace Earls\LeaseBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Acme\DemoBundle\Form\ContactType;


// these import the "@Route" and "@Template" annotations
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

// imports Entity class
use Earls\LeaseBundle\Entity\Owners;

class ManageAreaController extends Controller
{
    /**
     * @Route("/", name="_manageArea")
     * @Template()
     */
    public function indexAction(Request $request)
    {
    	//return array();
    	// create a task and give it some dummy data for this example
        $owner = new Owners();
        //$task->setTask('Write a blog post');
        //$task->setDueDate(new \DateTime('tomorrow'));

        $form = $this->createFormBuilder($owner)
            //->add('ownerid', 'text')
            ->add('ownertype', 'text')
            ->add('save', 'submit')
            ->getForm();

        $form->handleRequest($request);

         if($form->isValid()){

         	print_r($owner);
         	$em = $this->getDoctrine()->getManager();
    		$em->persist($owner);
    		$em->flush();
         }

        return $this->render('EarlsLeaseBundle:ManageArea:index.html.twig', array(
            'form' => $form->createView(),
        ));
    }


}

?>