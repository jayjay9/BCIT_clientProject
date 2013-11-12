<?php

namespace Earls\LeaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Recordsoffices
 *
 * @ORM\Table(name="recordsoffices")
 * @ORM\Entity
 */
class Recordsoffices
{
    /**
     * @var string
     *
     * @ORM\Column(name="address", type="string", length=255, nullable=true)
     */
    private $address;

    /**
     * @var integer
     *
     * @ORM\Column(name="city", type="smallint", nullable=true)
     */
    private $city;

    /**
     * @var string
     *
     * @ORM\Column(name="provinceStateID", type="string", length=4, nullable=true)
     */
    private $provincestateid;

    /**
     * @var string
     *
     * @ORM\Column(name="postalZip", type="string", length=45, nullable=true)
     */
    private $postalzip;

    /**
     * @var integer
     *
     * @ORM\Column(name="recordOfficeID", type="smallint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $recordofficeid;

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
     * @return Recordsoffices
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
     * @param integer $city
     * @return Recordsoffices
     */
    public function setCity($city)
    {
        $this->city = $city;
    
        return $this;
    }

    /**
     * Get city
     *
     * @return integer 
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set provincestateid
     *
     * @param string $provincestateid
     * @return Recordsoffices
     */
    public function setProvincestateid($provincestateid)
    {
        $this->provincestateid = $provincestateid;
    
        return $this;
    }

    /**
     * Get provincestateid
     *
     * @return string 
     */
    public function getProvincestateid()
    {
        return $this->provincestateid;
    }

    /**
     * Set postalzip
     *
     * @param string $postalzip
     * @return Recordsoffices
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
     * Get recordofficeid
     *
     * @return integer 
     */
    public function getRecordofficeid()
    {
        return $this->recordofficeid;
    }

    /**
     * Set officeid
     *
     * @param \Earls\LeaseBundle\Entity\Offices $officeid
     * @return Recordsoffices
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