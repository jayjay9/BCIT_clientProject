<?php
/**
 * Created by PhpStorm.
 * User: JayJay
 * Date: 11/15/13
 * Time: 12:50 PM
 */

namespace Earls\LeaseBundle\Form\Model;


class ManageTablesModel {

    protected $landlord;

    public function setLandlord(Landlords $landlord){
        $this->landlord = $landlord;
    }

    public function getLandlord(){
        return $this->landlord;
    }

} 