<?php
/**
 * Created by PhpStorm.
 * User: alfredo-ub
 * Date: 06/11/13
 * Time: 7:27 PM
 */

namespace Earls\LeaseBundle\Form\Model;

use Earls\LeaseBundle\Entity\Restaurants;
use Proxies\__CG__\Earls\LeaseBundle\Entity\Landlords;
use Symfony\Component\Validator\Constraints as Assert;

//use Earls\LeaseBundle\Form\Model\LandlordSectionModel;


class StoreInformationModel {


    protected $restaurantinfo;

    protected $riskinfo;



    public function setRestaurantinfo(Restaurants $restaurantinfo)
    {
        $this->restaurantinfo = $restaurantinfo;
    }

    public function getRestaurantinfo()
    {
        return $this->restaurantinfo;
    }

    public function setRiskinfo(Buildingtypes $riskinfo)
    {
        $this->riskinfo = $riskinfo;
    }

    public function getRiskinfo()
    {
        return $this->riskinfo;
    }


} 