<?php

namespace Earls\LeaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Registeredoffices
 *
 * @ORM\Table(name="registeredoffices")
 * @ORM\Entity
 */
class Registeredoffices
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
     * @ORM\Column(name="city", type="string", length=45, nullable=true)
     */
    private $city;

    /**
     * @var string
     *
     * @ORM\Column(name="postalZip", type="string", length=45, nullable=true)
     */
    private $postalzip;

    /**
     * @var integer
     *
     * @ORM\Column(name="registeredOfficeID", type="smallint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $registeredofficeid;

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
     * @var \Earls\LeaseBundle\Entity\Offices
     *
     * @ORM\ManyToOne(targetEntity="Earls\LeaseBundle\Entity\Offices")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="officeID", referencedColumnName="officeID")
     * })
     */
    private $officeid;



    /**
     * Set address
     *
     * @param string $address
     * @return Registeredoffices
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
     * Set city
     *
     * @param string $city
     * @return Registeredoffices
     */
    public function setCity($city)
    {
        $this->city = $city;
    
        return $this;
    }

    /**
     * Get city
     *
     * @return string 
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set postalzip
     *
     * @param string $postalzip
     * @return Registeredoffices
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
     * Get registeredofficeid
     *
     * @return integer 
     */
    public function getRegisteredofficeid()
    {
        return $this->registeredofficeid;
    }

    /**
     * Set provincestateid
     *
     * @param \Earls\LeaseBundle\Entity\Provincestate $provincestateid
     * @return Registeredoffices
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
     * Set officeid
     *
     * @param \Earls\LeaseBundle\Entity\Offices $officeid
     * @return Registeredoffices
     */
    public function setOfficeid(\Earls\LeaseBundle\Entity\Offices $officeid = null)
    {
        $this->officeid = $officeid;
    
        return $this;
    }

    /**
     * Get officeid
     *
     * @return \Earls\LeaseBundle\Entity\Offices 
     */
    public function getOfficeid()
    {
        return $this->officeid;
    }
}