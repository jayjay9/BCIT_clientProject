<?php

namespace Earls\LeaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Restaurants
 */
class Restaurants
{
    /**
     * @var integer
     */
    private $storefilenumber;

    /**
     * @var string
     */
    private $tenant;

    /**
     * @var string
     */
    private $storenickname;

    /**
     * @var string
     */
    private $address;

    /**
     * @var string
     */
    private $postalzip;

    /**
     * @var string
     */
    private $openingdate;

    /**
     * @var string
     */
    private $legaldescription;

    /**
     * @var integer
     */
    private $diningroomseating;

    /**
     * @var integer
     */
    private $loungeseating;

    /**
     * @var integer
     */
    private $patioseating;

    /**
     * @var integer
     */
    private $diningroomtable;

    /**
     * @var integer
     */
    private $loungetable;

    /**
     * @var integer
     */
    private $patiotable;

    /**
     * @var integer
     */
    private $departmentnumber;

    /**
     * @var boolean
     */
    private $restaurantstate;

    /**
     * @var \DateTime
     */
    private $closedate;

    /**
     * @var string
     */
    private $royaltyfee;

    /**
     * @var \DateTime
     */
    private $yearbuilt;

    /**
     * @var string
     */
    private $comments;

    /**
     * @var integer
     */
    private $restaurantid;

    /**
     * @var \Earls\LeaseBundle\Entity\Rentandmaintenances
     */
    private $rentandmaintenanceid;

    /**
     * @var \Earls\LeaseBundle\Entity\Regions
     */
    private $regionid;

    /**
     * @var \Earls\LeaseBundle\Entity\Riskinfo
     */
    private $riskid;

    /**
     * @var \Earls\LeaseBundle\Entity\Storeclasses
     */
    private $storeclassid;

    /**
     * @var \Earls\LeaseBundle\Entity\Utilities
     */
    private $utilityid;

    /**
     * @var \Earls\LeaseBundle\Entity\Propertymanagers
     */
    private $propertymanagerid;

    /**
     * @var \Earls\LeaseBundle\Entity\Liquorlicenses
     */
    private $liquorlicenseid;

    /**
     * @var \Earls\LeaseBundle\Entity\Northamericancities
     */
    private $city;

    /**
     * @var \Earls\LeaseBundle\Entity\Corporations
     */
    private $corporateid;

    /**
     * @var \Earls\LeaseBundle\Entity\Buildingtypes
     */
    private $buildingtype;

    /**
     * @var \Earls\LeaseBundle\Entity\Landlords
     */
    private $landlordid;

    /**
     * @var \Earls\LeaseBundle\Entity\Licenses
     */
    private $licenseid;

    /**
     * @var \Earls\LeaseBundle\Entity\Provincestate
     */
    private $provincestateid;


    /**
     * Set storefilenumber
     *
     * @param integer $storefilenumber
     * @return Restaurants
     */
    public function setStorefilenumber($storefilenumber)
    {
        $this->storefilenumber = $storefilenumber;
    
        return $this;
    }

    /**
     * Get storefilenumber
     *
     * @return integer 
     */
    public function getStorefilenumber()
    {
        return $this->storefilenumber;
    }

    /**
     * Set tenant
     *
     * @param string $tenant
     * @return Restaurants
     */
    public function setTenant($tenant)
    {
        $this->tenant = $tenant;
    
        return $this;
    }

    /**
     * Get tenant
     *
     * @return string 
     */
    public function getTenant()
    {
        return $this->tenant;
    }

    /**
     * Set storenickname
     *
     * @param string $storenickname
     * @return Restaurants
     */
    public function setStorenickname($storenickname)
    {
        $this->storenickname = $storenickname;
    
        return $this;
    }

    /**
     * Get storenickname
     *
     * @return string 
     */
    public function getStorenickname()
    {
        return $this->storenickname;
    }

    /**
     * Set address
     *
     * @param string $address
     * @return Restaurants
     */
    public function setAddress($address)
    {
        $this->address = $address;
    
        return $this;
    }

    /**
     * Get address
     *
     * @return string 
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set postalzip
     *
     * @param string $postalzip
     * @return Restaurants
     */
    public function setPostalzip($postalzip)
    {
        $this->postalzip = $postalzip;
    
        return $this;
    }

    /**
     * Get postalzip
     *
     * @return string 
     */
    public function getPostalzip()
    {
        return $this->postalzip;
    }

    /**
     * Set openingdate
     *
     * @param string $openingdate
     * @return Restaurants
     */
    public function setOpeningdate($openingdate)
    {
        $this->openingdate = $openingdate;
    
        return $this;
    }

    /**
     * Get openingdate
     *
     * @return string 
     */
    public function getOpeningdate()
    {
        return $this->openingdate;
    }

    /**
     * Set legaldescription
     *
     * @param string $legaldescription
     * @return Restaurants
     */
    public function setLegaldescription($legaldescription)
    {
        $this->legaldescription = $legaldescription;
    
        return $this;
    }

    /**
     * Get legaldescription
     *
     * @return string 
     */
    public function getLegaldescription()
    {
        return $this->legaldescription;
    }

    /**
     * Set diningroomseating
     *
     * @param integer $diningroomseating
     * @return Restaurants
     */
    public function setDiningroomseating($diningroomseating)
    {
        $this->diningroomseating = $diningroomseating;
    
        return $this;
    }

    /**
     * Get diningroomseating
     *
     * @return integer 
     */
    public function getDiningroomseating()
    {
        return $this->diningroomseating;
    }

    /**
     * Set loungeseating
     *
     * @param integer $loungeseating
     * @return Restaurants
     */
    public function setLoungeseating($loungeseating)
    {
        $this->loungeseating = $loungeseating;
    
        return $this;
    }

    /**
     * Get loungeseating
     *
     * @return integer 
     */
    public function getLoungeseating()
    {
        return $this->loungeseating;
    }

    /**
     * Set patioseating
     *
     * @param integer $patioseating
     * @return Restaurants
     */
    public function setPatioseating($patioseating)
    {
        $this->patioseating = $patioseating;
    
        return $this;
    }

    /**
     * Get patioseating
     *
     * @return integer 
     */
    public function getPatioseating()
    {
        return $this->patioseating;
    }

    /**
     * Set diningroomtable
     *
     * @param integer $diningroomtable
     * @return Restaurants
     */
    public function setDiningroomtable($diningroomtable)
    {
        $this->diningroomtable = $diningroomtable;
    
        return $this;
    }

    /**
     * Get diningroomtable
     *
     * @return integer 
     */
    public function getDiningroomtable()
    {
        return $this->diningroomtable;
    }

    /**
     * Set loungetable
     *
     * @param integer $loungetable
     * @return Restaurants
     */
    public function setLoungetable($loungetable)
    {
        $this->loungetable = $loungetable;
    
        return $this;
    }

    /**
     * Get loungetable
     *
     * @return integer 
     */
    public function getLoungetable()
    {
        return $this->loungetable;
    }

    /**
     * Set patiotable
     *
     * @param integer $patiotable
     * @return Restaurants
     */
    public function setPatiotable($patiotable)
    {
        $this->patiotable = $patiotable;
    
        return $this;
    }

    /**
     * Get patiotable
     *
     * @return integer 
     */
    public function getPatiotable()
    {
        return $this->patiotable;
    }

    /**
     * Set departmentnumber
     *
     * @param integer $departmentnumber
     * @return Restaurants
     */
    public function setDepartmentnumber($departmentnumber)
    {
        $this->departmentnumber = $departmentnumber;
    
        return $this;
    }

    /**
     * Get departmentnumber
     *
     * @return integer 
     */
    public function getDepartmentnumber()
    {
        return $this->departmentnumber;
    }

    /**
     * Set restaurantstate
     *
     * @param boolean $restaurantstate
     * @return Restaurants
     */
    public function setRestaurantstate($restaurantstate)
    {
        $this->restaurantstate = $restaurantstate;
    
        return $this;
    }

    /**
     * Get restaurantstate
     *
     * @return boolean 
     */
    public function getRestaurantstate()
    {
        return $this->restaurantstate;
    }

    /**
     * Set closedate
     *
     * @param \DateTime $closedate
     * @return Restaurants
     */
    public function setClosedate($closedate)
    {
        $this->closedate = $closedate;
    
        return $this;
    }

    /**
     * Get closedate
     *
     * @return \DateTime 
     */
    public function getClosedate()
    {
        return $this->closedate;
    }

    /**
     * Set royaltyfee
     *
     * @param string $royaltyfee
     * @return Restaurants
     */
    public function setRoyaltyfee($royaltyfee)
    {
        $this->royaltyfee = $royaltyfee;
    
        return $this;
    }

    /**
     * Get royaltyfee
     *
     * @return string 
     */
    public function getRoyaltyfee()
    {
        return $this->royaltyfee;
    }

    /**
     * Set yearbuilt
     *
     * @param \DateTime $yearbuilt
     * @return Restaurants
     */
    public function setYearbuilt($yearbuilt)
    {
        $this->yearbuilt = $yearbuilt;
    
        return $this;
    }

    /**
     * Get yearbuilt
     *
     * @return \DateTime 
     */
    public function getYearbuilt()
    {
        return $this->yearbuilt;
    }

    /**
     * Set comments
     *
     * @param string $comments
     * @return Restaurants
     */
    public function setComments($comments)
    {
        $this->comments = $comments;
    
        return $this;
    }

    /**
     * Get comments
     *
     * @return string 
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * Get restaurantid
     *
     * @return integer 
     */
    public function getRestaurantid()
    {
        return $this->restaurantid;
    }

    /**
     * Set rentandmaintenanceid
     *
     * @param \Earls\LeaseBundle\Entity\Rentandmaintenances $rentandmaintenanceid
     * @return Restaurants
     */
    public function setRentandmaintenanceid(\Earls\LeaseBundle\Entity\Rentandmaintenances $rentandmaintenanceid = null)
    {
        $this->rentandmaintenanceid = $rentandmaintenanceid;
    
        return $this;
    }

    /**
     * Get rentandmaintenanceid
     *
     * @return \Earls\LeaseBundle\Entity\Rentandmaintenances 
     */
    public function getRentandmaintenanceid()
    {
        return $this->rentandmaintenanceid;
    }

    /**
     * Set regionid
     *
     * @param \Earls\LeaseBundle\Entity\Regions $regionid
     * @return Restaurants
     */
    public function setRegionid(\Earls\LeaseBundle\Entity\Regions $regionid = null)
    {
        $this->regionid = $regionid;
    
        return $this;
    }

    /**
     * Get regionid
     *
     * @return \Earls\LeaseBundle\Entity\Regions 
     */
    public function getRegionid()
    {
        return $this->regionid;
    }

    /**
     * Set riskid
     *
     * @param \Earls\LeaseBundle\Entity\Riskinfo $riskid
     * @return Restaurants
     */
    public function setRiskid(\Earls\LeaseBundle\Entity\Riskinfo $riskid = null)
    {
        $this->riskid = $riskid;
    
        return $this;
    }

    /**
     * Get riskid
     *
     * @return \Earls\LeaseBundle\Entity\Riskinfo 
     */
    public function getRiskid()
    {
        return $this->riskid;
    }

    /**
     * Set storeclassid
     *
     * @param \Earls\LeaseBundle\Entity\Storeclasses $storeclassid
     * @return Restaurants
     */
    public function setStoreclassid(\Earls\LeaseBundle\Entity\Storeclasses $storeclassid = null)
    {
        $this->storeclassid = $storeclassid;
    
        return $this;
    }

    /**
     * Get storeclassid
     *
     * @return \Earls\LeaseBundle\Entity\Storeclasses 
     */
    public function getStoreclassid()
    {
        return $this->storeclassid;
    }

    /**
     * Set utilityid
     *
     * @param \Earls\LeaseBundle\Entity\Utilities $utilityid
     * @return Restaurants
     */
    public function setUtilityid(\Earls\LeaseBundle\Entity\Utilities $utilityid = null)
    {
        $this->utilityid = $utilityid;
    
        return $this;
    }

    /**
     * Get utilityid
     *
     * @return \Earls\LeaseBundle\Entity\Utilities 
     */
    public function getUtilityid()
    {
        return $this->utilityid;
    }

    /**
     * Set propertymanagerid
     *
     * @param \Earls\LeaseBundle\Entity\Propertymanagers $propertymanagerid
     * @return Restaurants
     */
    public function setPropertymanagerid(\Earls\LeaseBundle\Entity\Propertymanagers $propertymanagerid = null)
    {
        $this->propertymanagerid = $propertymanagerid;
    
        return $this;
    }

    /**
     * Get propertymanagerid
     *
     * @return \Earls\LeaseBundle\Entity\Propertymanagers 
     */
    public function getPropertymanagerid()
    {
        return $this->propertymanagerid;
    }

    /**
     * Set liquorlicenseid
     *
     * @param \Earls\LeaseBundle\Entity\Liquorlicenses $liquorlicenseid
     * @return Restaurants
     */
    public function setLiquorlicenseid(\Earls\LeaseBundle\Entity\Liquorlicenses $liquorlicenseid = null)
    {
        $this->liquorlicenseid = $liquorlicenseid;
    
        return $this;
    }

    /**
     * Get liquorlicenseid
     *
     * @return \Earls\LeaseBundle\Entity\Liquorlicenses 
     */
    public function getLiquorlicenseid()
    {
        return $this->liquorlicenseid;
    }

    /**
     * Set city
     *
     * @param \Earls\LeaseBundle\Entity\Northamericancities $city
     * @return Restaurants
     */
    public function setCity(\Earls\LeaseBundle\Entity\Northamericancities $city = null)
    {
        $this->city = $city;
    
        return $this;
    }

    /**
     * Get city
     *
     * @return \Earls\LeaseBundle\Entity\Northamericancities 
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set corporateid
     *
     * @param \Earls\LeaseBundle\Entity\Corporations $corporateid
     * @return Restaurants
     */
    public function setCorporateid(\Earls\LeaseBundle\Entity\Corporations $corporateid = null)
    {
        $this->corporateid = $corporateid;
    
        return $this;
    }

    /**
     * Get corporateid
     *
     * @return \Earls\LeaseBundle\Entity\Corporations 
     */
    public function getCorporateid()
    {
        return $this->corporateid;
    }

    /**
     * Set buildingtype
     *
     * @param \Earls\LeaseBundle\Entity\Buildingtypes $buildingtype
     * @return Restaurants
     */
    public function setBuildingtype(\Earls\LeaseBundle\Entity\Buildingtypes $buildingtype = null)
    {
        $this->buildingtype = $buildingtype;
    
        return $this;
    }

    /**
     * Get buildingtype
     *
     * @return \Earls\LeaseBundle\Entity\Buildingtypes 
     */
    public function getBuildingtype()
    {
        return $this->buildingtype;
    }

    /**
     * Set landlordid
     *
     * @param \Earls\LeaseBundle\Entity\Landlords $landlordid
     * @return Restaurants
     */
    public function setLandlordid(\Earls\LeaseBundle\Entity\Landlords $landlordid = null)
    {
        $this->landlordid = $landlordid;
    
        return $this;
    }

    /**
     * Get landlordid
     *
     * @return \Earls\LeaseBundle\Entity\Landlords 
     */
    public function getLandlordid()
    {
        return $this->landlordid;
    }

    /**
     * Set licenseid
     *
     * @param \Earls\LeaseBundle\Entity\Licenses $licenseid
     * @return Restaurants
     */
    public function setLicenseid(\Earls\LeaseBundle\Entity\Licenses $licenseid = null)
    {
        $this->licenseid = $licenseid;
    
        return $this;
    }

    /**
     * Get licenseid
     *
     * @return \Earls\LeaseBundle\Entity\Licenses 
     */
    public function getLicenseid()
    {
        return $this->licenseid;
    }

    /**
     * Set provincestateid
     *
     * @param \Earls\LeaseBundle\Entity\Provincestate $provincestateid
     * @return Restaurants
     */
    public function setProvincestateid(\Earls\LeaseBundle\Entity\Provincestate $provincestateid = null)
    {
        $this->provincestateid = $provincestateid;
    
        return $this;
    }

    /**
     * Get provincestateid
     *
     * @return \Earls\LeaseBundle\Entity\Provincestate 
     */
    public function getProvincestateid()
    {
        return $this->provincestateid;
    }
}
