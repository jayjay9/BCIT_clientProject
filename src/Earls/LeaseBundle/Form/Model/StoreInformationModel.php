<?php
/**
 * Created by PhpStorm.
 * User: alfredo-ub
 * Date: 06/11/13
 * Time: 7:27 PM
 */

namespace Earls\LeaseBundle\Form\Model;

use Earls\LeaseBundle\Entity\Licenses;
use Earls\LeaseBundle\Entity\Liquorlicenses;
use Earls\LeaseBundle\Entity\Rentandmaintenances;
use Earls\LeaseBundle\Entity\Restaurants;
use Earls\LeaseBundle\Entity\Riskinfo;
use Earls\LeaseBundle\Entity\Utilities;
use Symfony\Component\Validator\Constraints as Assert;

//use Earls\LeaseBundle\Form\Model\LandlordSectionModel;


class StoreInformationModel {


    protected $restaurantinfo;

    protected $liquorlicense;

    protected $licenseinfo;

    protected $riskinfo;

    protected $rentandmaintenance;

    protected $utilities;

    protected $restaurantId;


    public function setRestaurantinfo(Restaurants $restaurantinfo)
    {
        $this->restaurantinfo = $restaurantinfo;
    }

    public function getRestaurantinfo()
    {
        return $this->restaurantinfo;
    }

    public function setLiquorlicense(Liquorlicenses $liquorlicense)
    {
        $this->liquorlicense = $liquorlicense;
    }

    public function getLiquorlicense()
    {
        return $this->liquorlicense;
    }

    public function setLicenseinfo(Licenses $licenseinfo)
    {
        $this->licenseinfo = $licenseinfo;
    }

    public function getLicenseinfo()
    {
        return $this->licenseinfo;
    }

    public function setRiskinfo(Riskinfo $riskinfo)
    {
        $this->riskinfo = $riskinfo;
    }

    public function getRiskinfo()
    {
        return $this->riskinfo;
    }

    public function setRentandmaintenance(Rentandmaintenances $rentandmaintenance)
    {
        $this->rentandmaintenance = $rentandmaintenance;
    }

    public function getRentandmaintenance()
    {
        return $this->rentandmaintenance;
    }

    public function setUtilities(Utilities $utilities)
    {
        $this->utilities = $utilities;
    }

    public function getUtilities()
    {
        return $this->utilities;
    }

    public function setRestaurantId($restaurantId)
    {
        $this->restaurantId = $restaurantId;
    }

    public function getRestaurantId()
    {
        return $this->restaurantId;
    }


} 