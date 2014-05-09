<?php
/**
 * Created by PhpStorm.
 * User: JayJay
 * Date: 11/15/13
 * Time: 1:09 PM
 */

namespace Earls\LeaseBundle\Controller;

use Earls\LeaseBundle\Form\Type\LandlordsPropManagerType;
use Earls\LeaseBundle\Form\Type\PropertyManagerType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Earls\LeaseBundle\Form\Type\LandlordsType;
use Earls\LeaseBundle\Form\Type\BuildingTypesType;
use Earls\LeaseBundle\Form\Type\StoreclassType;
use Symfony\Component\BrowserKit\Request;
use Symfony\Component\HttpFoundation\Response;
use Earls\LeaseBundle\Entity\Landlordspropertymanagers;
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

        $landlordAndPropManagerlist = $this->getDoctrine()
            ->getRepository('EarlsLeaseBundle:Landlordspropertymanagers')
            ->findAll();

        $allLandlordAndPropManager = array();


        foreach($landlordAndPropManagerlist as $landlordAndPropManager){
            $landlordAndPropManagerObj = array('landlordpropertymanid' => $landlordAndPropManager->getLandlordpropertymanid(), 'name' => $landlordAndPropManager->getName(), 'address'=> $landlordAndPropManager->getAddress());
            array_push($allLandlordAndPropManager, $landlordAndPropManagerObj);
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
                'allLandlordAndPropManager' => $allLandlordAndPropManager,
                'allStoreclasses' => $allStoreclasses,
                'allBuildingtypes' => $allBuildingtypes
            )
        );

    }

    /**
 * @Route("/getLandlordPM/{id}", name="_manage_tables_landlord_get_id")
 * @Template()
 */

    public function getLandlordPMAction($id)
    {
        $landlordAndPropManager = $this->getDoctrine()
            ->getRepository('EarlsLeaseBundle:Landlordspropertymanagers')
            ->find($id);

        $form = $this->createForm(new LandlordsPropManagerType(), $landlordAndPropManager, array(
        'action' => $this->generateUrl('_manage_tables_landlordPM_update_id', array('id' => $id))
        ));

        return $this->render('EarlsLeaseBundle:ManageTables:landlordsPM.html.twig',
            array(
                'landlordPMForm' => $form->createView()
            )
        );

    }

    /**
     * @Route("/updateLandlordPM/{id}", name="_manage_tables_landlordPM_update_id")
     * @Template()
     */
    public function updateLandlordPMAction($id)
    {

        $request = $this->getRequest();

        $em = $this->getDoctrine()->getManager();
        $landlordAndPropManager = $em->getRepository('EarlsLeaseBundle:Landlordspropertymanagers')->find($id);

        $form = $this->createForm(new LandlordsPropManagerType(), $landlordAndPropManager);

        if ($request->isMethod('POST')) {
            $form->submit($request);
            if ($form->isValid()) {
                $em->flush();
                return $this->redirect($this->generateUrl('_manage_tables'));
            }
        }

       return $this->render('landlordsPM.html.twig',
           array(
               'landlordPMForm' => $form->createView()
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
     * @Route("/getstoreclass/{id}", name="_manage_tables_storeclasses_get_id")
     * @Template()
     */

    public function getStoreclassAction($id)
    {

        $storeclass = $this->getDoctrine()
            ->getRepository('EarlsLeaseBundle:Storeclasses')
            ->find($id);

        $form = $this->createForm(new StoreclassType(), $storeclass, array(
            'action' => $this->generateUrl('_manage_tables_storeclasses_update_id', array('id' => $id))
        ));

        return $this->render('EarlsLeaseBundle:ManageTables:editstoreClasses.html.twig',
            array(
                'storeclassForm' => $form->createView()
            )
        );

    }

    /**
     * @Route("/updatestoreclass/{id}", name="_manage_tables_storeclasses_update_id")
     * @Template()
     */
    public function updateStoreclassAction($id)
    {
        $request = $this->getRequest();

        $em = $this->getDoctrine()->getManager();
        $storeclass = $em->getRepository('EarlsLeaseBundle:Storeclasses')->find($id);

        $form = $this->createForm(new StoreclassType(), $storeclass);

        if ($request->isMethod('POST')) {
            $form->submit($request);
            if ($form->isValid()) {
                $em->flush();
                return $this->redirect($this->generateUrl('_manage_tables').'#storeclass');
            }
        }

        return $this->render('EarlsLeaseBundle:ManageTables:editstoreClasses.html.twig',
            array(
                'storeclassForm' => $form->createView()
            )
        );
    }

    /**
     * @Route("/LandlordPMDelete/{id}", name="_manage_tables_landlord_delete_id")
     * @Template()
     */

    public function landlordPMDeleteAction($id)
    {

        $restaurantlist = $this->getDoctrine()
            ->getRepository('EarlsLeaseBundle:Restaurants')
            ->findAll();

        foreach($restaurantlist as $restaurant){
            $landlordObj = $restaurant->getLandlordid();
            $propertyManObj = $restaurant->getPropertymanagerid();
            if(isset($landlordObj)){
                $landlordid =  $landlordObj->getLandlordpropertymanid();
                if($landlordid==$id){
                    $em = $this->getDoctrine()->getManager();
                    $restaurant->setLandlordid(Null);
                    $em->flush();
                }
            }
            if(isset($propertyManObj)){
                $propertyManid =  $propertyManObj->getLandlordpropertymanid();
                if($propertyManid==$id){
                    $em = $this->getDoctrine()->getManager();
                    $restaurant->setPropertymanagerid(Null);
                    $em->flush();
                }
            }
        }

        $em = $this->getDoctrine()->getManager();
        $landlordPropertyMan = $this->getDoctrine()
            ->getRepository('EarlsLeaseBundle:Landlordspropertymanagers')
            ->find($id);

        $em->remove($landlordPropertyMan);
        $em->flush();

        return $this->redirect($this->generateUrl('_manage_tables'));
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
     * @Route("/LandlordPMAdd", name="_manage_tables_landlord_add")
     * @Template()
     */

    public function landlordPMAddAction()
    {

        $em = $this->getDoctrine()->getEntityManager();
        $landlordPropManager = new Landlordspropertymanagers();

        $form = $this->createForm(new LandlordsPropManagerType(), $landlordPropManager, array(
            'action' => $this->generateUrl('_manage_tables_landlord_add'))
        );

        $request = $this->getRequest();

        $form->handleRequest($request);

        if ($form->isValid()) {
            $landlordPropManagerObj = $form->getData();

            $em->persist($landlordPropManagerObj);
            $em->flush();

            return $this->redirect($this->generateUrl('_manage_tables'));
        }

        return $this->render('EarlsLeaseBundle:ManageTables:addLandlordPM.html.twig',
            array(
                'landlordPMForm' => $form->createView()
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