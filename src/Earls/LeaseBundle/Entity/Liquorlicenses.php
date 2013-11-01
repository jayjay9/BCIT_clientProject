<?php

namespace Earls\LeaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Liquorlicenses
 */
class Liquorlicenses
{
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
    private $businesslicense;

    /**
     * @var string
     */
    private $liquorlicense;

    /**
     * @var \DateTime
     */
    private $licensedate;

    /**
     * @var integer
     */
    private $liquorlicenseid;

    /**
     * @var \Earls\LeaseBundle\Entity\Provincestate
     */
    private $provincestateid;

    /**
     * @var \Earls\LeaseBundle\Entity\Northamericancities
     */
    private $city;

    /**
     * @var \Earls\LeaseBundle\Entity\Corporations
     */
    private $corporateid;


    /**
     * Set address
     *
     * @param string $address
     * @return Liquorlicenses
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
     * @return Liquorlicenses
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
     * Get liquorlicenseid
     *
     * @return integer 
     */
    public function getLiquorlicenseid()
    {
        return $this->liquorlicenseid;
    }

    /**
     * Set provincestateid
     *
     * @param \Earls\LeaseBundle\Entity\Provincestate $provincestateid
     * @return Liquorlicenses
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

    /**
     * Set city
     *
     * @param \Earls\LeaseBundle\Entity\Northamericancities $city
     * @return Liquorlicenses
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
     * @return Liquorlicenses
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
}
