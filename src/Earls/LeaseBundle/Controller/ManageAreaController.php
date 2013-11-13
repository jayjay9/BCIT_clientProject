<?php

namespace Earls\LeaseBundle\Controller;

use Earls\LeaseBundle\Entity\Areas;
use Earls\LeaseBundle\Entity\Areatypes;
use Earls\LeaseBundle\Entity\Restaurants;
use Earls\LeaseBundle\Form\Type\DropDownList;
use Earls\LeaseBundle\Form\Type\ManageArea;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Earls\LeaseBundle\Form\Model\DropDownModel;
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
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery(
            'SELECT p
            FROM EarlsLeaseBundle:Restaurants p');

        $data = $query->getResult();
        $restaurantid = $data[0]->getRestaurantid();

        print_r($restaurantid);

        return $this->redirect($this->generateUrl('_manageArea_get_id', array('id'=> $restaurantid)));
    }

    /**
     * @Route("/get/{id}", name="_manageArea_get_id")
     * @Template()
     */

    public function getAction($id){

        $area1 = $this->getDoctrine()
            ->getRepository('EarlsLeaseBundle:Areas')
            ->findOneBy(array('restaurantid' => $id, 'areatypeid' => '1'));

        $area2 = $this->getDoctrine()
            ->getRepository('EarlsLeaseBundle:Areas')
            ->findOneBy(array('restaurantid' => $id, 'areatypeid' => '2'));

        $area3 = $this->getDoctrine()
            ->getRepository('EarlsLeaseBundle:Areas')
            ->findOneBy(array('restaurantid' => $id, 'areatypeid' => '3'));

        $selectedRestaurant = $this->getDoctrine()
            ->getRepository('EarlsLeaseBundle:Restaurants')
            ->find($id);

        $model = new DropDownModel();

        $model->setArea1($area1);
        $model->setArea2($area2);
        $model->setArea3($area3);
        $model->setStorefileNumber($selectedRestaurant);

        $form = $this->createForm(new DropDownList(), $model);

        $request = $this->getRequest();
        $form->handleRequest($request);

        if($form->isValid()){
            if ($form->get('go')->isClicked()) {
                $data = $form->getData()->getStorefileNumber()->getRestaurantid();
                return $this->redirect($this->generateUrl('_manageArea_get_id', array('id'=> $data)));
            }elseif($form->get('update')->isClicked()){
                $request = $this->getRequest();
                if ($request->isMethod('POST')) {
                    if ($form->isValid())
                    {
                        //print_r($request);
                        $em = $this->getDoctrine()->getEntityManager();
                        $em->flush();          // entity is already persisted and managed by doctrine.

                        // return success response
                    }
                }

                return $this->redirect($this->generateUrl('_manageArea_get_id', array('id'=> $id)));
            }
        }

        return $this->render('EarlsLeaseBundle:ManageArea:index.html.twig', array('form' => $form->createView()));

    }
}

?>