<?php

namespace Earls\LeaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Registeredoffices
 */
class Registeredoffices
{
    /**
     * @var string
     */
    private $address;

    /**
     * @var string
     */
    private $city;

    /**
     * @var string
     */
    private $postalzip;

    /**
     * @var integer
     */
    private $registeredofficeid;

    /**
     * @var \Earls\LeaseBundle\Entity\Provincestate
     */
    private $provincestateid;

    /**
     * @var \Earls\LeaseBundle\Entity\Offices
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
