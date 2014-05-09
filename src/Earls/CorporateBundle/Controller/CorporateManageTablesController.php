<?php

// src/Acme/CorporateBundle/Controller/CorporateManageTablesController.php
namespace Earls\CorporateBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;

// relevant entities
use Earls\CorporateBundle\Entity\Directors;
use Earls\CorporateBundle\Entity\Offices;
use Earls\CorporateBundle\Entity\Sharetypes;
use Earls\CorporateBundle\Entity\Northamericancities;
use Earls\CorporateBundle\Entity\Provincestate;

// relevant forms
use Earls\CorporateBundle\Form\Type\DirectorsType;
use Earls\CorporateBundle\Form\Type\OfficesType;
use Earls\CorporateBundle\Form\Type\SharetypesType;

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

        // get the director objects

        $directorlist = $this->getDoctrine()
            ->getRepository('EarlsCorporateBundle:Directors')
            ->findAll();

        $allDirectors = array();
        $directorObj = array();

        foreach($directorlist as $director){
            // Getting data from northamericancities and provicestate tables

            $directorcity = " ";
            $directorprovincestate = " ";

            $northamericancityObj = $director->getCity();
            $provincestateObj = $director->getProvincestateid();

            if (!empty($northamericancityObj)){
                $directorcity = $northamericancityObj->getCity();
            }

            if (!empty($provincestateObj)){
                $directorprovincestate = $provincestateObj->getDescription();
            }

            // Place everything into allDirectors array to be used by the view
            $directorObj = array('directorid' => $director->getDirectorid(), 'directorname' => $director->getDirectorname(), 'address' => $director->getAddress(), 'city' => $directorcity, 'provincestate' => $directorprovincestate);
            array_push($allDirectors, $directorObj);
        }

        // get the office objects

        $officelist = $this->getDoctrine()
            ->getRepository('EarlsCorporateBundle:Offices')
            ->findAll();

        $allOffices = array();
        $officeObj = array();

        foreach($officelist as $office){
            $officecity = " ";
            $officeprovincestate = " ";

            $northamericancityObj = $office->getCity();
            $provincestateObj = $office->getProvincestateid();

            if (!empty($northamericancityObj)){
                $officecity = $northamericancityObj->getCity();
            }

            if (!empty($provincestateObj)){
                $officeprovincestate = $provincestateObj->getDescription();
            }

            $officeObj = array('officeid' => $office->getOfficeid(), 'officename' => $office->getOfficename(), 'address' => $office->getAddress(), 'city' => $officecity, 'provincestate' => $officeprovincestate);
            array_push($allOffices, $officeObj);
        }

        // get the share type objects

        $sharetypelist = $this->getDoctrine()
            ->getRepository('EarlsCorporateBundle:Sharetypes')
            ->findAll();

        $allSharetypes = array();
        $sharetypeObj = array();

        foreach($sharetypelist as $sharetype){
            $sharetypeObj = array('sharetypeid' => $sharetype->getSharetypeid(), 'sharetype' => $sharetype->getSharetype());
            array_push($allSharetypes, $sharetypeObj);
        }

        // Render the page with all the tab arrays

        return $this->render('EarlsCorporateBundle:CorporateManageTables:index.html.twig',
            array(
                'allDirectors' => $allDirectors,
                'allOffices' => $allOffices,
                'allSharetypes' => $allSharetypes
            )
        );
    }

    /////////////////////////////////////////////////////////////
    //
    // Director: Add, Edit, Delete Methods
    //
    ///////////////////////////////////////////////////////////

    /**
     * @Route("/directoradd", name="_manage_corporate_tables_director_add")
     * @Template()
     */

    public function directorAddAction()
    {

        $em = $this->getDoctrine()->getEntityManager();
        $director = new Directors();

        $form = $this->createForm(new DirectorsType(), $director, array(
                'action' => $this->generateUrl('_manage_corporate_tables_director_add'))
        );

        $request = $this->getRequest();

        $form->handleRequest($request);

        if ($form->isValid()) {
            $directorObj = $form->getData();

            $em->persist($directorObj);
            $em->flush();

            return $this->redirect($this->generateUrl('_corporate_manage_tables'));
        }

        return $this->render('EarlsCorporateBundle:CorporateManageTables:addDirector.html.twig',
            array(
                'directorForm' => $form->createView()
            )
        );

    }

    /**
     * @Route("/getdirector/{id}", name="_manage_corporate_tables_director_get_id")
     * @Template()
     */

    public function getDirectorAction($id)
    {
        $director = $this->getDoctrine()
            ->getRepository('EarlsCorporateBundle:Directors')
            ->find($id);

        $form = $this->createForm(new DirectorsType(), $director, array(
            'action' => $this->generateUrl('_manage_corporate_tables_director_update_id', array('id' => $id))
        ));

        return $this->render('EarlsCorporateBundle:CorporateManageTables:director.html.twig',
            array(
                'directorForm' => $form->createView()
            )
        );

    }

    /**
     * @Route("/updatedirector/{id}", name="_manage_corporate_tables_director_update_id")
     * @Template()
     */
    public function updateDirectorAction($id)
    {

        $request = $this->getRequest();

        $em = $this->getDoctrine()->getManager();
        $director = $em->getRepository('EarlsCorporateBundle:Directors')->find($id);

        $form = $this->createForm(new DirectorsType(), $director);

        if ($request->isMethod('POST')) {
            $form->submit($request);
            if ($form->isValid()) {
                $em->flush();
                return $this->redirect($this->generateUrl('_corporate_manage_tables'));
            }
        }

        return $this->render('EarlsCorporateBundle:CorporateManageTables:director.html.twig',
            array(
                'directorForm' => $form->createView()
            )
        );
    }


    /**
     * @Route("/directordelete/{id}", name="_manage_corporate_tables_director_delete_id")
     * @Template()
     */

    public function directorDeleteAction($id)
    {

        // delete Director info in Memberships table
        $membershiplist = $this->getDoctrine()
            ->getRepository('EarlsCorporateBundle:Memberships')
            ->findAll();

        foreach($membershiplist as $membership){
            $directorObj = $membership->getDirectorid();
            if(isset($directorObj)){
                $directorid =  $directorObj->getDirectorid();
                if($directorid==$id){
                    $em = $this->getDoctrine()->getManager();
                    $membership->setDirectorid(Null);
                    $em->flush();
                }
            }
        }

        // delete Director in Director table
        $em = $this->getDoctrine()->getManager();
        $director = $this->getDoctrine()
            ->getRepository('EarlsCorporateBundle:Directors')
            ->find($id);

        $em->remove($director);
        $em->flush();

        return $this->redirect($this->generateUrl('_corporate_manage_tables'));
    }

    /////////////////////////////////////////////////////////////
    //
    // Registered & Records Office: Add, Edit, Delete Methods
    //
    ///////////////////////////////////////////////////////////

    /**
     * @Route("/officeadd", name="_manage_corporate_tables_office_add")
     * @Template()
     */

    public function officeAddAction()
    {

        $em = $this->getDoctrine()->getEntityManager();
        $office = new Offices();

        $form = $this->createForm(new OfficesType(), $office, array(
                'action' => $this->generateUrl('_manage_corporate_tables_office_add'))
        );

        $request = $this->getRequest();

        $form->handleRequest($request);

        if ($form->isValid()) {
            $officeObj = $form->getData();

            $em->persist($officeObj);
            $em->flush();

            return $this->redirect($this->generateUrl('_corporate_manage_tables').'#office');
        }

        return $this->render('EarlsCorporateBundle:CorporateManageTables:addOffice.html.twig',
            array(
                'officeForm' => $form->createView()
            )
        );

    }

    /**
     * @Route("/getoffice/{id}", name="_manage_corporate_tables_office_get_id")
     * @Template()
     */

    public function getOfficeAction($id)
    {
        $office = $this->getDoctrine()
            ->getRepository('EarlsCorporateBundle:Offices')
            ->find($id);

        $form = $this->createForm(new OfficesType(), $office, array(
            'action' => $this->generateUrl('_manage_corporate_tables_office_update_id', array('id' => $id))
        ));

        return $this->render('EarlsCorporateBundle:CorporateManageTables:office.html.twig',
            array(
                'officeForm' => $form->createView()
            )
        );

    }

    /**
     * @Route("/updateoffice/{id}", name="_manage_corporate_tables_office_update_id")
     * @Template()
     */
    public function updateOfficeAction($id)
    {

        $request = $this->getRequest();

        $em = $this->getDoctrine()->getManager();
        $office = $em->getRepository('EarlsCorporateBundle:Offices')->find($id);

        $form = $this->createForm(new OfficesType(), $office);

        if ($request->isMethod('POST')) {
            $form->submit($request);
            if ($form->isValid()) {
                $em->flush();
                return $this->redirect($this->generateUrl('_corporate_manage_tables').'#office');
            }
        }

        return $this->render('EarlsCorporateBundle:CorporateManageTables:office.html.twig',
            array(
                'officeForm' => $form->createView()
            )
        );
    }


    /**
     * @Route("/officedelete/{id}", name="_manage_corporate_tables_office_delete_id")
     * @Template()
     */

    public function officeDeleteAction($id)
    {
        // delete Office in Offices table
        $em = $this->getDoctrine()->getManager();
        $office = $this->getDoctrine()
            ->getRepository('EarlsCorporateBundle:Offices')
            ->find($id);

        $em->remove($office);
        $em->flush();

        return $this->redirect($this->generateUrl('_corporate_manage_tables').'#office');
    }

    /////////////////////////////////////////////////////////////
    //
    // Share Types: Add & Delete Methods
    //
    ///////////////////////////////////////////////////////////

    /**
     * @Route("/sharetypeadd", name="_manage_corporate_tables_sharetype_add")
     * @Template()
     */

    public function sharetypeAddAction()
    {

        $em = $this->getDoctrine()->getEntityManager();
        $sharetype = new Sharetypes();

        $form = $this->createForm(new SharetypesType(), $sharetype, array(
                'action' => $this->generateUrl('_manage_corporate_tables_sharetype_add').'#sharetype')
        );

        $request = $this->getRequest();

        $form->handleRequest($request);

        if ($form->isValid()) {
            $sharetypeObj = $form->getData();

            $em->persist($sharetypeObj);
            $em->flush();

            return $this->redirect($this->generateUrl('_corporate_manage_tables'));
        }

        return $this->render('EarlsCorporateBundle:CorporateManageTables:addSharetype.html.twig',
            array(
                'sharetypeForm' => $form->createView()
            )
        );

    }

    /**
     * @Route("/getsharetype/{id}", name="_manage_corporate_tables_sharetype_get_id")
     * @Template()
     */

    public function getSharetypeAction($id)
    {
        $sharetype = $this->getDoctrine()
            ->getRepository('EarlsCorporateBundle:Sharetypes')
            ->find($id);

        $form = $this->createForm(new SharetypesType(), $sharetype, array(
            'action' => $this->generateUrl('_manage_corporate_tables_sharetype_update_id', array('id' => $id))
        ));

        return $this->render('EarlsCorporateBundle:CorporateManageTables:sharetype.html.twig',
            array(
                'sharetypeForm' => $form->createView()
            )
        );

    }

    /**
     * @Route("/updatesharetype/{id}", name="_manage_corporate_tables_sharetype_update_id")
     * @Template()
     */
    public function updateSharetypeAction($id)
    {

        $request = $this->getRequest();

        $em = $this->getDoctrine()->getManager();
        $sharetype = $em->getRepository('EarlsCorporateBundle:Sharetypes')->find($id);

        $form = $this->createForm(new SharetypesType(), $sharetype);

        if ($request->isMethod('POST')) {
            $form->submit($request);
            if ($form->isValid()) {
                $em->flush();
                return $this->redirect($this->generateUrl('_corporate_manage_tables').'#sharetype');
            }
        }

        return $this->render('EarlsCorporateBundle:CorporateManageTables:sharetypes.html.twig',
            array(
                'sharetypeForm' => $form->createView()
            )
        );
    }

    /**
     * @Route("/sharetypedelete/{id}", name="_manage_corporate_tables_sharetype_delete_id")
     * @Template()
     */

    public function sharetypeDeleteAction($id)
    {

        // delete Share Type info in Memberships table
        $membershiplist = $this->getDoctrine()
            ->getRepository('EarlsCorporateBundle:Memberships')
            ->findAll();

        foreach($membershiplist as $membership){
            $sharetypeObj = $membership->getSharetypeid();
            if(isset($sharetypeObj)){
                $sharetypeid =  $sharetypeObj->getSharetypeid();
                if($sharetypeid==$id){
                    $em = $this->getDoctrine()->getManager();
                    $membership->setSharetypeid(Null);
                    $em->flush();
                }
            }
        }

        // delete Share Type in Sharetypes table
        $em = $this->getDoctrine()->getManager();
        $sharetype = $this->getDoctrine()
            ->getRepository('EarlsCorporateBundle:Sharetypes')
            ->find($id);

        $em->remove($sharetype);
        $em->flush();

        return $this->redirect($this->generateUrl('_corporate_manage_tables').'#sharetype');
    }
}

?>