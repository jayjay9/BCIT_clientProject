<?php

namespace Earls\CorporateBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Restaurants
 *
 * @ORM\Table(name="restaurants")
 * @ORM\Entity
 */
class Restaurants
{
    /**
     * @var integer
     *
     * @ORM\Column(name="storeFileNumber", type="integer", nullable=true)
     */
    private $storefilenumber;

    /**
     * @var string
     *
     * @ORM\Column(name="tenant", type="string", length=255, nullable=true)
     */
    private $tenant;

    /**
     * @var string
     *
     * @ORM\Column(name="storenickname", type="string", length=45, nullable=true)
     */
    private $storenickname;

    /**
     * @var string
     *
     * @ORM\Column(name="address", type="string", length=45, nullable=true)
     */
    private $address;

    /**
     * @var string
     *
     * @ORM\Column(name="postalZip", type="string", length=45, nullable=true)
     */
    private $postalzip;

    /**
     * @var string
     *
     * @ORM\Column(name="openingDate", type="string", length=45, nullable=true)
     */
    private $openingdate;

    /**
     * @var string
     *
     * @ORM\Column(name="legaldescription", type="string", length=300, nullable=true)
     */
    private $legaldescription;

    /**
     * @var integer
     *
     * @ORM\Column(name="diningRoomSeating", type="integer", nullable=true)
     */
    private $diningroomseating;

    /**
     * @var integer
     *
     * @ORM\Column(name="loungeSeating", type="integer", nullable=true)
     */
    private $loungeseating;

    /**
     * @var integer
     *
     * @ORM\Column(name="patioSeating", type="integer", nullable=true)
     */
    private $patioseating;

    /**
     * @var integer
     *
     * @ORM\Column(name="diningRoomTable", type="integer", nullable=true)
     */
    private $diningroomtable;

    /**
     * @var integer
     *
     * @ORM\Column(name="loungeTable", type="integer", nullable=true)
     */
    private $loungetable;

    /**
     * @var integer
     *
     * @ORM\Column(name="patioTable", type="integer", nullable=true)
     */
    private $patiotable;

    /**
     * @var integer
     *
     * @ORM\Column(name="departmentNumber", type="integer", nullable=true)
     */
    private $departmentnumber;

    /**
     * @var boolean
     *
     * @ORM\Column(name="restaurantState", type="boolean", nullable=true)
     */
    private $restaurantstate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="closeDate", type="date", nullable=true)
     */
    private $closedate;

    /**
     * @var string
     *
     * @ORM\Column(name="royaltyFee", type="string", length=45, nullable=true)
     */
    private $royaltyfee;

    /**
     * @var string
     *
     * @ORM\Column(name="advertisingFee", type="string", length=45, nullable=true)
     */
    private $advertisingfee;

    /**
     * @var string
     *
     * @ORM\Column(name="regionalMngtFee", type="string", length=45, nullable=true)
     */
    private $regionalmngtfee;

    /**
     * @var string
     *
     * @ORM\Column(name="yearBuilt", type="string", length=4, nullable=true)
     */
    private $yearbuilt;

    /**
     * @var string
     *
     * @ORM\Column(name="comments", type="string", length=255, nullable=true)
     */
    private $comments;

    /**
     * @var integer
     *
     * @ORM\Column(name="restaurantID", type="smallint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $restaurantid;

    /**
     * @var \Earls\CorporateBundle\Entity\Regions
     *
     * @ORM\ManyToOne(targetEntity="Earls\CorporateBundle\Entity\Regions")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="regionID", referencedColumnName="regionID")
     * })
     */
    private $regionid;

    /**
     * @var \Earls\CorporateBundle\Entity\Landlordspropertymanagers
     *
     * @ORM\ManyToOne(targetEntity="Earls\CorporateBundle\Entity\Landlordspropertymanagers")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="landlordID", referencedColumnName="landlordPropertyManID")
     * })
     */
    private $landlordid;

    /**
     * @var \Earls\CorporateBundle\Entity\Landlordspropertymanagers
     *
     * @ORM\ManyToOne(targetEntity="Earls\CorporateBundle\Entity\Landlordspropertymanagers")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="propertymanagerID", referencedColumnName="landlordPropertyManID")
     * })
     */
    private $propertymanagerid;

    /**
     * @var \Earls\CorporateBundle\Entity\Licenses
     *
     * @ORM\ManyToOne(targetEntity="Earls\CorporateBundle\Entity\Licenses")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="licenseID", referencedColumnName="licenseID")
     * })
     */
    private $licenseid;

    /**
     * @var \Earls\CorporateBundle\Entity\Storeclasses
     *
     * @ORM\ManyToOne(targetEntity="Earls\CorporateBundle\Entity\Storeclasses")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="storeClassID", referencedColumnName="storeClassID")
     * })
     */
    private $storeclassid;

    /**
     * @var \Earls\CorporateBundle\Entity\Northamericancities
     *
     * @ORM\ManyToOne(targetEntity="Earls\CorporateBundle\Entity\Northamericancities")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="city", referencedColumnName="northAmericanCityID")
     * })
     */
    private $city;

    /**
     * @var \Earls\CorporateBundle\Entity\Provincestate
     *
     * @ORM\ManyToOne(targetEntity="Earls\CorporateBundle\Entity\Provincestate")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="provinceStateID", referencedColumnName="provinceStateID")
     * })
     */
    private $provincestateid;

    /**
     * @var \Earls\CorporateBundle\Entity\Buildingtypes
     *
     * @ORM\ManyToOne(targetEntity="Earls\CorporateBundle\Entity\Buildingtypes")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="buildingType", referencedColumnName="buildingTypeID")
     * })
     */
    private $buildingtype;

    /**
     * @var \Earls\CorporateBundle\Entity\Corporations
     *
     * @ORM\ManyToOne(targetEntity="Earls\CorporateBundle\Entity\Corporations")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="corporateID", referencedColumnName="corporateID")
     * })
     */
    private $corporateid;



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
     * Set advertisingfee
     *
     * @param string $advertisingfee
     * @return Restaurants
     */
    public function setAdvertisingfee($advertisingfee)
    {
        $this->advertisingfee = $advertisingfee;
    
        return $this;
    }

    /**
     * Get advertisingfee
     *
     * @return string 
     */
    public function getAdvertisingfee()
    {
        return $this->advertisingfee;
    }

    /**
     * Set regionalmngtfee
     *
     * @param string $regionalmngtfee
     * @return Restaurants
     */
    public function setRegionalmngtfee($regionalmngtfee)
    {
        $this->regionalmngtfee = $regionalmngtfee;
    
        return $this;
    }

    /**
     * Get regionalmngtfee
     *
     * @return string 
     */
    public function getRegionalmngtfee()
    {
        return $this->regionalmngtfee;
    }

    /**
     * Set yearbuilt
     *
     * @param string $yearbuilt
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
     * @return string 
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
     * Set regionid
     *
     * @param \Earls\CorporateBundle\Entity\Regions $regionid
     * @return Restaurants
     */
    public function setRegionid(\Earls\CorporateBundle\Entity\Regions $regionid = null)
    {
        $this->regionid = $regionid;
    
        return $this;
    }

    /**
     * Get regionid
     *
     * @return \Earls\CorporateBundle\Entity\Regions 
     */
    public function getRegionid()
    {
        return $this->regionid;
    }

    /**
     * Set landlordid
     *
     * @param \Earls\CorporateBundle\Entity\Landlordspropertymanagers $landlordid
     * @return Restaurants
     */
    public function setLandlordid(\Earls\CorporateBundle\Entity\Landlordspropertymanagers $landlordid = null)
    {
        $this->landlordid = $landlordid;
    
        return $this;
    }

    /**
     * Get landlordid
     *
     * @return \Earls\CorporateBundle\Entity\Landlordspropertymanagers 
     */
    public function getLandlordid()
    {
        return $this->landlordid;
    }

    /**
     * Set propertymanagerid
     *
     * @param \Earls\CorporateBundle\Entity\Landlordspropertymanagers $propertymanagerid
     * @return Restaurants
     */
    public function setPropertymanagerid(\Earls\CorporateBundle\Entity\Landlordspropertymanagers $propertymanagerid = null)
    {
        $this->propertymanagerid = $propertymanagerid;
    
        return $this;
    }

    /**
     * Get propertymanagerid
     *
     * @return \Earls\CorporateBundle\Entity\Landlordspropertymanagers 
     */
    public function getPropertymanagerid()
    {
        return $this->propertymanagerid;
    }

    /**
     * Set licenseid
     *
     * @param \Earls\CorporateBundle\Entity\Licenses $licenseid
     * @return Restaurants
     */
    public function setLicenseid(\Earls\CorporateBundle\Entity\Licenses $licenseid = null)
    {
        $this->licenseid = $licenseid;
    
        return $this;
    }

    /**
     * Get licenseid
     *
     * @return \Earls\CorporateBundle\Entity\Licenses 
     */
    public function getLicenseid()
    {
        return $this->licenseid;
    }

    /**
     * Set storeclassid
     *
     * @param \Earls\CorporateBundle\Entity\Storeclasses $storeclassid
     * @return Restaurants
     */
    public function setStoreclassid(\Earls\CorporateBundle\Entity\Storeclasses $storeclassid = null)
    {
        $this->storeclassid = $storeclassid;
    
        return $this;
    }

    /**
     * Get storeclassid
     *
     * @return \Earls\CorporateBundle\Entity\Storeclasses 
     */
    public function getStoreclassid()
    {
        return $this->storeclassid;
    }

    /**
     * Set city
     *
     * @param \Earls\CorporateBundle\Entity\Northamericancities $city
     * @return Restaurants
     */
    public function setCity(\Earls\CorporateBundle\Entity\Northamericancities $city = null)
    {
        $this->city = $city;
    
        return $this;
    }

    /**
     * Get city
     *
     * @return \Earls\CorporateBundle\Entity\Northamericancities 
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set provincestateid
     *
     * @param \Earls\CorporateBundle\Entity\Provincestate $provincestateid
     * @return Restaurants
     */
    public function setProvincestateid(\Earls\CorporateBundle\Entity\Provincestate $provincestateid = null)
    {
        $this->provincestateid = $provincestateid;
    
        return $this;
    }

    /**
     * Get provincestateid
     *
     * @return \Earls\CorporateBundle\Entity\Provincestate 
     */
    public function getProvincestateid()
    {
        return $this->provincestateid;
    }

    /**
     * Set buildingtype
     *
     * @param \Earls\CorporateBundle\Entity\Buildingtypes $buildingtype
     * @return Restaurants
     */
    public function setBuildingtype(\Earls\CorporateBundle\Entity\Buildingtypes $buildingtype = null)
    {
        $this->buildingtype = $buildingtype;
    
        return $this;
    }

    /**
     * Get buildingtype
     *
     * @return \Earls\CorporateBundle\Entity\Buildingtypes 
     */
    public function getBuildingtype()
    {
        return $this->buildingtype;
    }

    /**
     * Set corporateid
     *
     * @param \Earls\CorporateBundle\Entity\Corporations $corporateid
     * @return Restaurants
     */
    public function setCorporateid(\Earls\CorporateBundle\Entity\Corporations $corporateid = null)
    {
        $this->corporateid = $corporateid;
    
        return $this;
    }

    /**
     * Get corporateid
     *
     * @return \Earls\CorporateBundle\Entity\Corporations 
     */
    public function getCorporateid()
    {
        return $this->corporateid;
    }
}