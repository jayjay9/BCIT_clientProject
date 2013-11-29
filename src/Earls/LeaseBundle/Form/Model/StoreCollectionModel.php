<?php
/**
 * Created by PhpStorm.
 * User: JayJay
 * Date: 11/23/13
 * Time: 3:05 PM
 */

namespace Earls\LeaseBundle\Form\Model;

use Earls\LeaseBundle\Form\Model\StoreInformationModel;
use Earls\LeaseBundle\Form\Model\DropDownModel;
use Earls\LeaseBundle\Form\Model\LeasesModel;

class StoreCollectionModel {

    protected $storeInfoForm;

    protected $leaseInfoForm;

    protected $manageAreaInfoForm;

    public function setStoreInfoForm(StoreInformationModel $storeInfoForm)
    {
        $this->storeInfoForm = $storeInfoForm;
    }

    public function getStoreInfoForm()
    {
        return $this->storeInfoForm;
    }

    public function setLeaseInfoForm(LeasesModel $leaseInfoForm)
    {
        $this->leaseInfoForm = $leaseInfoForm;
    }

    public function getLeaseInfoForm()
    {
        return $this->leaseInfoForm;
    }

    public function setManageAreaForm(DropDownModel $manageAreaInfoForm){
        $this->manageAreaInfoForm = $manageAreaInfoForm;
    }

    public function getManageAreaForm()
    {
        return $this->manageAreaInfoForm;
    }
} 