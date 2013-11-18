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
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $liquorlicenseid;

    /**
     * @var \Earls\LeaseBundle\Entity\Northamericancities
     *
     * @ORM\ManyToOne(targetEntity="Earls\LeaseBundle\Entity\Northamericancities")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="city", referencedColumnName="northAmericanCityID")
     * })
     */
    private $city;

    /**
     * @var \Earls\LeaseBundle\Entity\Provincestate
     *
     * @ORM\ManyToOne(targetEntity="Earls\LeaseBundle\Entity\Provincestate")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="provinceStateID", referencedColumnName="provinceStateID")
     * })
     */
    private $provincestateid;

    /**
     * @var \Earls\LeaseBundle\Entity\Corporations
     *
     * @ORM\ManyToOne(targetEntity="Earls\LeaseBundle\Entity\Corporations")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="corporateID", referencedColumnName="corporateID")
     * })
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