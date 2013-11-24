<?php
/**
 * Created by PhpStorm.
 * User: JayJay
 * Date: 11/15/13
 * Time: 1:09 PM
 */

namespace Earls\LeaseBundle\Controller;

use Earls\LeaseBundle\Form\Type\PropertyManagerType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Earls\LeaseBundle\Form\Type\LandlordsType;
use Symfony\Component\BrowserKit\Request;
use Symfony\Component\HttpFoundation\Response;
use Earls\LeaseBundle\Entity\Landlords;
use Symfony\Component\HttpFoundation\RedirectResponse;

// these import the "@Route" and "@Template" annotations
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;


class ManageTablesController extends Controller {

    /**
     * @Route("/", name="_manage_tables")
     * @Template()
     */
    public function indexAction()
    {

        $landlordlist = $this->getDoctrine()
            ->getRepository('EarlsLeaseBundle:Landlords')
            ->findAll();

        $allLandlord = array();
        $landlordObj = array();

        foreach($landlordlist as $landlord){
            $landlordObj = array('landlordid' => $landlord->getLandlordid(), 'landlordname' => $landlord->getLandlordname(), 'address'=> $landlord->getAddress());
            array_push($allLandlord, $landlordObj);
        }

        $propertymanagerlist = $this->getDoctrine()
            ->getRepository('EarlsLeaseBundle:Propertymanagers')
            ->findAll();

        $allPropertymanager = array();
        $propertyManagerObj = array();

        foreach($propertymanagerlist as $propertymanager){
            $propertyManagerObj = array('propertymanagerid' => $propertymanager->getPropertymanagerid(), 'propertymanagername' => $propertymanager->getPropertymanagername(), 'address'=> $propertymanager->getAddress());
            array_push($allPropertymanager, $propertyManagerObj);
        }

        $storeclasseslist = $this->getDoctrine()
            ->getRepository('EarlsLeaseBundle:Storeclasses')
            ->findAll();

        $allStoreclasses = array();
        $storeclassesObj = array();

        foreach($storeclasseslist as $storeclasses){
            $storeclassesObj = array('storeclassid' => $storeclasses->getStoreclassid(), 'storeclass' => $storeclasses->getStoreclass());
            array_push($allStoreclasses, $storeclassesObj);
        }

        $buildingtypeslist = $this->getDoctrine()
            ->getRepository('EarlsLeaseBundle:Buildingtypes')
            ->findAll();

        $allBuildingtypes = array();
        $buildingtypesObj = array();

        foreach($buildingtypeslist as $buildingtypes){
            $buildingtypesObj = array('buildingtypeid' => $buildingtypes->getBuildingtypeid(), 'buildingtypes' => $buildingtypes->getBuildingtype());
            array_push($allBuildingtypes, $buildingtypesObj);
        }


        return $this->render('EarlsLeaseBundle:ManageTables:index.html.twig',
            array(
                'allLandlord' => $allLandlord,
                'allPropertymanager' => $allPropertymanager,
                'allStoreclasses' => $allStoreclasses,
                'allBuildingtypes' => $allBuildingtypes
            )
        );

    }

    /**
 * @Route("/getLandlord/{id}", name="_manage_tables_landlord_get_id")
 * @Template()
 */

    public function getLandlordAction($id)
    {
        $landlord = $this->getDoctrine()
            ->getRepository('EarlsLeaseBundle:Landlords')
            ->find($id);

        $form = $this->createForm(new LandlordsType(), $landlord, array(
        'action' => $this->generateUrl('_manage_tables_landlord_update_id', array('id' => $id))
        ));

        return $this->render('EarlsLeaseBundle:ManageTables:landlords.html.twig',
            array(
                'landlordForm' => $form->createView()
            )
        );

    }

    /**
     * @Route("/updateLandlord/{id}", name="_manage_tables_landlord_update_id")
     * @Template()
     */
    public function updateLandlordAction($id)
    {

        $request = $this->getRequest();

        $em = $this->getDoctrine()->getManager();
        $landlord = $em->getRepository('EarlsLeaseBundle:Landlords')->find($id);

        $form = $this->createForm(new LandlordsType(), $landlord);

        if ($request->isMethod('POST')) {
            $form->submit($request);
            if ($form->isValid()) {
                $em->flush();
                return $this->redirect($this->generateUrl('_manage_tables'));
            }
        }

       return $this->render('EarlsLeaseBundle:ManageTables:landlords.html.twig',
           array(
               'landlordForm' => $form->createView()
           )
       );
    }

    /**
     * @Route("/LandlordDelete/{id}", name="_manage_tables_landlord_delete_id")
     * @Template()
     */

    public function landlordDeleteAction($id)
    {

        echo $id;

    }

    /**
     * @Route("/getPropertymanager/{id}", name="_manage_tables_propertyManager_get_id")
     * @Template()
     */

    public function getPropertymanagerAction($id)
    {

        $propertymanager = $this->getDoctrine()
            ->getRepository('EarlsLeaseBundle:Propertymanagers')
            ->find($id);

        $form = $this->createForm(new PropertyManagerType(), $propertymanager, array(
            'action' => $this->generateUrl('_manage_tables_propertyManager_update_id', array('id' => $id))
        ));

        return $this->render('EarlsLeaseBundle:ManageTables:propertymanagers.html.twig',
            array(
                'propertyManagerForm' => $form->createView()
            )
        );

    }

    /**
     * @Route("/updatePropertymanager/{id}", name="_manage_tables_propertyManager_update_id")
     * @Template()
     */
    public function updatePropertymanagerAction($id)
    {
        $request = $this->getRequest();

        $em = $this->getDoctrine()->getManager();
        $propertymanager = $em->getRepository('EarlsLeaseBundle:Propertymanagers')->find($id);

        $form = $this->createForm(new PropertyManagerType(), $propertymanager);

        if ($request->isMethod('POST')) {
            $form->submit($request);
            if ($form->isValid()) {
                $em->flush();
                return $this->redirect($this->generateUrl('_manage_tables'));
            }
        }

        return $this->render('EarlsLeaseBundle:ManageTables:propertymanagers.html.twig',
            array(
                'propertyManagerForm' => $form->createView()
            )
        );
    }

    /**
     * @Route("/PropertyManagerDelete/{id}", name="_manage_tables_propertyManager_delete_id")
     * @Template()
     */

    public function propertyManagerDeleteAction($id)
    {

        echo $id;

    }

    /**
     * @Route("/StoreClassesDelete/{id}", name="_manage_tables_storeClasses_delete_id")
     * @Template()
     */

    public function storeClassesDeleteAction($id)
    {

        echo $id;

    }

    /**
     * @Route("/BuildingTypesDelete/{id}", name="_manage_tables_buildingtypes_delete_id")
     * @Template()
     */

    public function buildingTypesDeleteAction($id)
    {

        echo $id;

    }

} 