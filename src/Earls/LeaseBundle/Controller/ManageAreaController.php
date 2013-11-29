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

        //print_r($restaurantid);

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

        $areatypeid1 = $this->getDoctrine()
            ->getRepository('EarlsLeaseBundle:Areatypes')
            ->find(1);

        $areatypeid2 = $this->getDoctrine()
            ->getRepository('EarlsLeaseBundle:Areatypes')
            ->find(2);

        $areatypeid3 = $this->getDoctrine()
            ->getRepository('EarlsLeaseBundle:Areatypes')
            ->find(3);

        $model = new DropDownModel();

        if (empty($area1) ){
            $area1= new Areas();
            $this->addAreaSquareFootage($area1, $areatypeid1, $selectedRestaurant);
        }

            $totalArea1 = $this->addTotal($area1);
            $area1->setTotalarea($totalArea1);
            $model->setArea1($area1);


        if(empty($area2)){
            $area2 = new Areas();
            $this->addAreaSquareFootage($area2, $areatypeid2, $selectedRestaurant);
        }
            $totalArea2 = $this->addTotal($area2);
            $area2->setTotalarea($totalArea2);
            $model->setArea2($area2);


        if(empty($area3)){
            $area3 = new Areas();
            $this->addAreaSquareFootage($area3, $areatypeid3, $selectedRestaurant);
        }
            $totalArea3 = $this->addTotal($area3);
            $area3->setTotalarea($totalArea3);
            $model->setArea3($area3);


        if (isset($selectedRestaurant) )
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
                        $em = $this->getDoctrine()->getEntityManager();
                        $em->flush();
                    }
                }

                return $this->redirect($this->generateUrl('_manageArea_get_id', array('id'=> $id)));
            }
        }

        return $this->render('EarlsLeaseBundle:ManageArea:index.html.twig', array(
            'form' => $form->createView(),
            'totalArea1' => (String)$totalArea1,
            'totalArea2' => (String)$totalArea2,
            'totalArea3' => (String)$totalArea3
        ));

    }

    private function addAreaSquareFootage(Areas $area, Areatypes $areatypes, Restaurants $restaurantid){
        $em = $this->getDoctrine()->getManager();
            $area->setAreatypeid($areatypes);
            $area->setRestaurantid($restaurantid);
            $area->setEntry(0);
            $area->setBar(0);
            $area->setLounge(0);
            $area->setDining(0);
            $area->setWashrooms(0);
            $area->setBoh(0);
            $area->setPatio(0);
            $area->setTotalarea(0);
        $em->persist($area);
        $em->flush();

        return 1;
    }

    private function addTotal(Areas $area){

        $entryNumber = $area->getEntry();
        $barNumber = $area->getBar();
        $loungeNumber = $area->getLounge();
        $diningNumber = $area->getDining();
        $washroomNumber = $area->getWashrooms();
        $bohNumber = $area->getBoh();
        $patioNumber = $area->getPatio();

        $total = $entryNumber + $barNumber + $loungeNumber + $diningNumber + $washroomNumber + $bohNumber + $patioNumber;

        return $total;
    }
}

?>