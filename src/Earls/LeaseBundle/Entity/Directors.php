<?php

namespace Earls\LeaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Directors
 */
class Directors
{
    /**
     * @var string
     */
    private $directorname;

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
    private $directorid;

    /**
     * @var \Earls\LeaseBundle\Entity\Northamericancities
     */
    private $city;

    /**
     * @var \Earls\LeaseBundle\Entity\Provincestate
     */
    private $provincestateid;


    /**
     * Set directorname
     *
     * @param string $directorname
     * @return Directors
     */
    public function setDirectorname($directorname)
    {
        $this->directorname = $directorname;
    
        return $this;
    }

    /**
     * Get directorname
     *
     * @return string 
     */
    public function getDirectorname()
    {
        return $this->directorname;
    }

    /**
     * Set address
     *
     * @param string $address
     * @return Directors
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
     * @return Directors
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
     * Get directorid
     *
     * @return integer 
     */
    public function getDirectorid()
    {
        return $this->directorid;
    }

    /**
     * Set city
     *
     * @param \Earls\LeaseBundle\Entity\Northamericancities $city
     * @return Directors
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
     * @return Directors
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