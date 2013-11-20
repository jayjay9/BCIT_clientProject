<?php

namespace Earls\LeaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Liquorlicenses
 *
 * @ORM\Table(name="liquorLicenses")
 * @ORM\Entity
 */
class Liquorlicenses
{
    /**
     * @var string
     *
     * @ORM\Column(name="businessLicense", type="string", length=45, nullable=true)
     */
    private $businesslicense;

    /**
     * @var string
     *
     * @ORM\Column(name="liquorLicense", type="string", length=45, nullable=true)
     */
    private $liquorlicense;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="licenseDate", type="date", nullable=true)
     */
    private $licensedate;

    /**
     * @var integer
     *
     * @ORM\Column(name="liquorLicenseID", type="smallint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $liquorlicenseid;

    /**
     * @var \Earls\LeaseBundle\Entity\Restaurants
     *
     * @ORM\OneToOne(targetEntity="Earls\LeaseBundle\Entity\Restaurants")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="restaurantID", referencedColumnName="restaurantID", unique=true)
     * })
     */
    private $restaurantid;



    /**
     * Set businesslicense
     *
     * @param string $businesslicense
     * @return Liquorlicenses
     */
    public function setBusinesslicense($businesslicense)
    {
        $this->businesslicense = $businesslicense;
    
        return $this;
    }

    /**
     * Get businesslicense
     *
     * @return string 
     */
    public function getBusinesslicense()
    {
        return $this->businesslicense;
    }

    /**
     * Set liquorlicense
     *
     * @param string $liquorlicense
     * @return Liquorlicenses
     */
    public function setLiquorlicense($liquorlicense)
    {
        $this->liquorlicense = $liquorlicense;
    
        return $this;
    }

    /**
     * Get liquorlicense
     *
     * @return string 
     */
    public function getLiquorlicense()
    {
        return $this->liquorlicense;
    }

    /**
     * Set licensedate
     *
     * @param \DateTime $licensedate
     * @return Liquorlicenses
     */
    public function setLicensedate($licensedate)
    {
        $this->licensedate = $licensedate;
    
        return $this;
    }

    /**
     * Get licensedate
     *
     * @return \DateTime 
     */
    public function getLicensedate()
    {
        return $this->licensedate;
    }

    /**
     * Set liquorlicenseid
     *
     * @param integer $liquorlicenseid
     * @return Liquorlicenses
     */
    public function setLiquorlicenseid($liquorlicenseid)
    {
        $this->liquorlicenseid = $liquorlicenseid;
    
        return $this;
    }

    /**
     * Get liquorlicenseid
     *
     * @return integer 
     */
    public function getLiquorlicenseid()
    {
        return $this->liquorlicenseid;
    }

    /**
     * Set restaurantid
     *
     * @param \Earls\LeaseBundle\Entity\Restaurants $restaurantid
     * @return Liquorlicenses
     */
    public function setRestaurantid(\Earls\LeaseBundle\Entity\Restaurants $restaurantid = null)
    {
        $this->restaurantid = $restaurantid;
    
        return $this;
    }

    /**
     * Get restaurantid
     *
     * @return \Earls\LeaseBundle\Entity\Restaurants 
     */
    public function getRestaurantid()
    {
        return $this->restaurantid;
    }
}