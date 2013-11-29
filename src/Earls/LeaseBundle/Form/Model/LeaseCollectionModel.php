<?php
/**
 * Created by PhpStorm.
 * User: JayJay
 * Date: 11/20/13
 * Time: 5:13 PM
 */

namespace Earls\LeaseBundle\Form\Model;


class LeaseCollectionModel {

    protected $leaseinfo;

    protected $restaurantname;

    protected $restaurantid;

    public function setLeaseInfo($leasecollectioninfo)
    {
        $this->leaseinfo = $leasecollectioninfo;
    }

    public function getLeaseInfo()
    {
        return $this->leaseinfo;
    }

    public function setrestaurantName($restaurantname)
    {
        $this->restaurantname = $restaurantname;
    }

    public function getrestaurantname()
    {
        return $this->restaurantname;
    }

    public function setrestaurantid($restaurantid)
    {
        $this->restaurantid = $restaurantid;
    }

    public function getrestaurantid()
    {
        return $this->restaurantid;
    }

}