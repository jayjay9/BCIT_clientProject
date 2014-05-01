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
use Earls\LeaseBundle\Form\Type\BuildingTypesType;
use Symfony\Component\BrowserKit\Request;
use Symfony\Component\HttpFoundation\Response;
use Earls\LeaseBundle\Entity\Landlords;
use Earls\LeaseBundle\Entity\Propertymanagers;
use Earls\LeaseBundle\Entity\Storeclasses;
use Earls\LeaseBundle\Entity\Buildingtypes;
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
                return $this->redirect($this->generateUrl('_manage_tables').'#propertymanager');
            }
        }

        return $this->render('EarlsLeaseBundle:ManageTables:propertymanagers.html.twig',
            array(
                'propertyManagerForm' => $form->createView()
            )
        );
    }

    /**
     * @Route("/getBuildingtype/{id}", name="_manage_tables_buildingTypes_get_id")
     * @Template()
     */

    public function getBuildingtypeAction($id)
    {

        $buildingType = $this->getDoctrine()
            ->getRepository('EarlsLeaseBundle:Buildingtypes')
            ->find($id);

        $form = $this->createForm(new BuildingTypesType(), $buildingType, array(
            'action' => $this->generateUrl('_manage_tables_buildingTypes_update_id', array('id' => $id))
        ));

        return $this->render('EarlsLeaseBundle:ManageTables:buildingtypes.html.twig',
            array(
                'buildingTypesForm' => $form->createView()
            )
        );

    }

    /**
     * @Route("/updateBuildingtype/{id}", name="_manage_tables_buildingTypes_update_id")
     * @Template()
     */
    public function updateBuildingtypeAction($id)
    {
        $request = $this->getRequest();

        $em = $this->getDoctrine()->getManager();
        $buildingType = $em->getRepository('EarlsLeaseBundle:Buildingtypes')->find($id);

        $form = $this->createForm(new BuildingTypesType(), $buildingType);

        if ($request->isMethod('POST')) {
            $form->submit($request);
            if ($form->isValid()) {
                $em->flush();
                return $this->redirect($this->generateUrl('_manage_tables').'#buildingtypes');
            }
        }

        return $this->render('EarlsLeaseBundle:ManageTables:buildingtypes.html.twig',
            array(
                'buildingTypesForm' => $form->createView()
            )
        );
    }

    /**
     * @Route("/LandlordDelete/{id}", name="_manage_tables_landlord_delete_id")
     * @Template()
     */

    public function landlordDeleteAction($id)
    {

        $restaurantlist = $this->getDoctrine()
            ->getRepository('EarlsLeaseBundle:Restaurants')
            ->findAll();

        foreach($restaurantlist as $restaurant){
            $landlordObj = $restaurant->getLandlordid();
            if(isset($landlordObj)){
                $landlordid =  $landlordObj->getLandlordid();
                if($landlordid==$id){
                    $em = $this->getDoctrine()->getManager();
                    $restaurant->setLandlordid(Null);
                    $em->flush();
                }
            }
        }

        $em = $this->getDoctrine()->getManager();
        $landlord = $this->getDoctrine()
            ->getRepository('EarlsLeaseBundle:Landlords')
            ->find($id);

        $em->remove($landlord);
        $em->flush();

        return $this->redirect($this->generateUrl('_manage_tables'));
    }


    /**
     * @Route("/PropertyManagerDelete/{id}", name="_manage_tables_propertyManager_delete_id")
     * @Template()
     */

    public function propertyManagerDeleteAction($id)
    {
        $restaurantlist = $this->getDoctrine()
            ->getRepository('EarlsLeaseBundle:Restaurants')
            ->findAll();

        foreach($restaurantlist as $restaurant){
            $propertymanObj = $restaurant->getPropertymanagerid();
            if(isset($propertymanObj)){
                $propertymanid =  $propertymanObj->getPropertymanagerid();
                if($propertymanid==$id){
                    $em = $this->getDoctrine()->getManager();
                    $restaurant->setPropertymanagerid(Null);
                    $em->flush();
                }
            }
        }

        $em = $this->getDoctrine()->getManager();
        $propertymanager = $this->getDoctrine()
            ->getRepository('EarlsLeaseBundle:Propertymanagers')
            ->find($id);

        $em->remove($propertymanager);
        $em->flush();

        return $this->redirect($this->generateUrl('_manage_tables').'#propertymanager');

    }

    /**
     * @Route("/StoreClassesDelete/{id}", name="_manage_tables_storeClasses_delete_id")
     * @Template()
     */

    public function storeClassesDeleteAction($id)
    {
        $restaurantlist = $this->getDoctrine()
            ->getRepository('EarlsLeaseBundle:Restaurants')
            ->findAll();

        foreach($restaurantlist as $restaurant){
            $storeClassObj = $restaurant->getStoreclassid();
            if(isset($storeClassObj)){
                $storeclassid =  $storeClassObj->getStoreclassid();
                if($storeclassid==$id){
                    $em = $this->getDoctrine()->getManager();
                    $restaurant->setStoreclassid(Null);
                    $em->flush();
                }
            }
        }

        $em = $this->getDoctrine()->getManager();
        $storeClasses = $this->getDoctrine()
            ->getRepository('EarlsLeaseBundle:Storeclasses')
            ->find($id);

        $em->remove($storeClasses);
        $em->flush();

        return $this->redirect($this->generateUrl('_manage_tables').'#storeclasses');

    }

    /**
     * @Route("/BuildingTypesDelete/{id}", name="_manage_tables_buildingtypes_delete_id")
     * @Template()
     */

    public function buildingTypesDeleteAction($id)
    {

        $restaurantlist = $this->getDoctrine()
            ->getRepository('EarlsLeaseBundle:Restaurants')
            ->findAll();

        foreach($restaurantlist as $restaurant){
            $buildingtypeObj = $restaurant->getBuildingtype();
            if(isset($buildingtypeObj)){
                $buildingtypeid =  $buildingtypeObj->getBuildingtypeid();
                if($buildingtypeid==$id){
                    $em = $this->getDoctrine()->getManager();
                    $restaurant->setBuildingtype(Null);
                    $em->flush();
                }
            }
        }

        $em = $this->getDoctrine()->getManager();
        $buildingtypes = $this->getDoctrine()
            ->getRepository('EarlsLeaseBundle:Buildingtypes')
            ->find($id);

        $em->remove($buildingtypes);
        $em->flush();

        return $this->redirect($this->generateUrl('_manage_tables').'#buildingtypes');

    }

    /**
     * @Route("/LandlordAdd", name="_manage_tables_landlord_add")
     * @Template()
     */

    public function landlordAddAction()
    {

        $em = $this->getDoctrine()->getEntityManager();
        $landlord = new Landlords();

        $form = $this->createForm(new LandlordsType(), $landlord, array(
            'action' => $this->generateUrl('_manage_tables_landlord_add'))
        );

        $request = $this->getRequest();

        $form->handleRequest($request);

        if ($form->isValid()) {
            $landlordObj = $form->getData();

            $em->persist($landlordObj);
            $em->flush();

            return $this->redirect($this->generateUrl('_manage_tables'));
        }

        return $this->render('EarlsLeaseBundle:ManageTables:addLandlord.html.twig',
            array(
                'landlordForm' => $form->createView()
            )
        );

    }

    /**
     * @Route("/PropertyManagerAdd", name="_manage_tables_propertyManager_add")
     * @Template()
     */

    public function propertyManagerAddAction()
    {

        $em = $this->getDoctrine()->getEntityManager();
        $propertymanager = new Propertymanagers();

        $form = $this->createForm(new PropertyManagerType(), $propertymanager, array(
                'action' => $this->generateUrl('_manage_tables_propertyManager_add'))
        );

        $request = $this->getRequest();

        $form->handleRequest($request);

        if ($form->isValid()) {
            $propertymanagerObj = $form->getData();

            $em->persist($propertymanagerObj);
            $em->flush();

            return $this->redirect($this->generateUrl('_manage_tables').'#propertymanager');
        }

        return $this->render('EarlsLeaseBundle:ManageTables:addPropertymanager.html.twig',
            array(
                'propertyManagerForm' => $form->createView()
            )
        );

    }

    /**
     * @Route("/StoreClassesAdd", name="_manage_tables_storeClasses_add")
     * @Template()
     */

    public function storeClassesAddAction()
    {
        $em = $this->getDoctrine()->getEntityManager();
        $storeClass = new Storeclasses();

        $form = $this->createFormBuilder($storeClass)
            ->setAction($this->generateUrl('_manage_tables_storeClasses_add'))
            ->add('storeclass', 'text')
            ->getForm();

        $request = $this->getRequest();

        $form->handleRequest($request);

        if ($form->isValid()) {

            $storeClassObj = $form->getData();

            $em->persist($storeClassObj);
            $em->flush();

            return $this->redirect($this->generateUrl('_manage_tables').'#storeclasses');
        }

        return $this->render('EarlsLeaseBundle:ManageTables:addstoreClasses.html.twig',
            array(
                'storeclassesForm' => $form->createView()
            )
        );

    }

    /**
     * @Route("/BuildingTypesAdd", name="_manage_tables_buildingtypes_add")
     * @Template()
     */

    public function buildingTypesAddAction()
    {

        $em = $this->getDoctrine()->getEntityManager();
        $buildingtypes = new Buildingtypes();

        $form = $this->createFormBuilder($buildingtypes)
            ->setAction($this->generateUrl('_manage_tables_buildingtypes_add'))
            ->add('buildingtype', 'text')
            ->getForm();

        $request = $this->getRequest();

        $form->handleRequest($request);

        if ($form->isValid()) {

            $buildingtypesObj = $form->getData();

            $em->persist($buildingtypesObj);
            $em->flush();

            return $this->redirect($this->generateUrl('_manage_tables').'#buildingtypes');
        }

        return $this->render('EarlsLeaseBundle:ManageTables:addBuildingTypes.html.twig',
            array(
                'buildingTypesForm' => $form->createView()
            )
        );

    }

} 