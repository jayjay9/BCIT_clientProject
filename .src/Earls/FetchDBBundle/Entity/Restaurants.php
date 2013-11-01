<?php

namespace Earls\FetchDBBundle\Entity;

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
     * @ORM\Column(name="legaldescription", type="string", length=45, nullable=true)
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
     * @var \DateTime
     *
     * @ORM\Column(name="yearBuilt", type="date", nullable=true)
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
     * @var \Earls\FetchDBBundle\Entity\Rentandmaintenances
     *
     * @ORM\ManyToOne(targetEntity="Earls\FetchDBBundle\Entity\Rentandmaintenances")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="rentAndMaintenanceID", referencedColumnName="rentAndMaintenanceID")
     * })
     */
    private $rentandmaintenanceid;

    /**
     * @var \Earls\FetchDBBundle\Entity\Regions
     *
     * @ORM\ManyToOne(targetEntity="Earls\FetchDBBundle\Entity\Regions")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="regionID", referencedColumnName="regionID")
     * })
     */
    private $regionid;

    /**
     * @var \Earls\FetchDBBundle\Entity\Riskinfo
     *
     * @ORM\ManyToOne(targetEntity="Earls\FetchDBBundle\Entity\Riskinfo")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="riskID", referencedColumnName="riskID")
     * })
     */
    private $riskid;

    /**
     * @var \Earls\FetchDBBundle\Entity\Storeclasses
     *
     * @ORM\ManyToOne(targetEntity="Earls\FetchDBBundle\Entity\Storeclasses")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="storeClassID", referencedColumnName="storeClassID")
     * })
     */
    private $storeclassid;

    /**
     * @var \Earls\FetchDBBundle\Entity\Utilities
     *
     * @ORM\ManyToOne(targetEntity="Earls\FetchDBBundle\Entity\Utilities")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="utilityID", referencedColumnName="utilityID")
     * })
     */
    private $utilityid;

    /**
     * @var \Earls\FetchDBBundle\Entity\Propertymanagers
     *
     * @ORM\ManyToOne(targetEntity="Earls\FetchDBBundle\Entity\Propertymanagers")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="propertyManagerID", referencedColumnName="propertyManagerID")
     * })
     */
    private $propertymanagerid;

    /**
     * @var \Earls\FetchDBBundle\Entity\Liquorlicenses
     *
     * @ORM\ManyToOne(targetEntity="Earls\FetchDBBundle\Entity\Liquorlicenses")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="liquorLicenseID", referencedColumnName="liquorLicenseID")
     * })
     */
    private $liquorlicenseid;

    /**
     * @var \Earls\FetchDBBundle\Entity\Northamericancities
     *
     * @ORM\ManyToOne(targetEntity="Earls\FetchDBBundle\Entity\Northamericancities")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="city", referencedColumnName="northAmericanCityID")
     * })
     */
    private $city;

    /**
     * @var \Earls\FetchDBBundle\Entity\Corporations
     *
     * @ORM\ManyToOne(targetEntity="Earls\FetchDBBundle\Entity\Corporations")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="corporateID", referencedColumnName="corporateID")
     * })
     */
    private $corporateid;

    /**
     * @var \Earls\FetchDBBundle\Entity\Buildingtypes
     *
     * @ORM\ManyToOne(targetEntity="Earls\FetchDBBundle\Entity\Buildingtypes")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="buildingType", referencedColumnName="buildingTypeID")
     * })
     */
    private $buildingtype;

    /**
     * @var \Earls\FetchDBBundle\Entity\Landlords
     *
     * @ORM\ManyToOne(targetEntity="Earls\FetchDBBundle\Entity\Landlords")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="landlordID", referencedColumnName="landlordID")
     * })
     */
    private $landlordid;

    /**
     * @var \Earls\FetchDBBundle\Entity\Licenses
     *
     * @ORM\ManyToOne(targetEntity="Earls\FetchDBBundle\Entity\Licenses")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="licenseID", referencedColumnName="licenseID")
     * })
     */
    private $licenseid;

    /**
     * @var \Earls\FetchDBBundle\Entity\Provincestate
     *
     * @ORM\ManyToOne(targetEntity="Earls\FetchDBBundle\Entity\Provincestate")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="provinceStateID", referencedColumnName="provinceStateID")
     * })
     */
    private $provincestateid;


}
