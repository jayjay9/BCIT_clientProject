<?php

namespace Earls\LeaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Offices
 */
class Offices
{
    /**
     * @var string
     */
    private $officename;

    /**
     * @var string
     */
    private $address;

    /**
     * @var string
     */
    private $postalzip;

    /**
     * @var integer
     */
    private $officeid;

    /**
     * @var \Earls\LeaseBundle\Entity\Provincestate
     */
    private $provincestateid;

    /**
     * @var \Earls\LeaseBundle\Entity\Northamericancities
     */
    private $city;


    /**
     * Set officename
     *
     * @param string $officename
     * @return Offices
     */
    public function setOfficename($officename)
    {
        $this->officename = $officename;
    
        return $this;
    }

    /**
     * Get officename
     *
     * @return string 
     */
    public function getOfficename()
    {
        return $this->officename;
    }

    /**
     * Set address
     *
     * @param string $address
     * @return Offices
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
     * @return Offices
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
     * Get officeid
     *
     * @return integer 
     */
    public function getOfficeid()
    {
        return $this->officeid;
    }

    /**
     * Set provincestateid
     *
     * @param \Earls\LeaseBundle\Entity\Provincestate $provincestateid
     * @return Offices
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
     * @return Offices
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
}
