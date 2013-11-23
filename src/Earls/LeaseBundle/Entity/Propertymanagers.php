<?php

namespace Earls\LeaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Propertymanagers
 *
 * @ORM\Table(name="propertymanagers")
 * @ORM\Entity
 */
class Propertymanagers
{
    /**
     * @var string
     *
     * @ORM\Column(name="propertyManagerName", type="string", length=45, nullable=true)
     */
    private $propertymanagername;

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
     * @ORM\Column(name="attention", type="string", length=45, nullable=true)
     */
    private $attention;

    /**
     * @var string
     *
     * @ORM\Column(name="phone", type="string", length=45, nullable=true)
     */
    private $phone;

    /**
     * @var string
     *
     * @ORM\Column(name="fax", type="string", length=45, nullable=true)
     */
    private $fax;

    /**
     * @var integer
     *
     * @ORM\Column(name="propertyManagerID", type="smallint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $propertymanagerid;

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
     * Set propertymanagername
     *
     * @param string $propertymanagername
     * @return Propertymanagers
     */
    public function setPropertymanagername($propertymanagername)
    {
        $this->propertymanagername = $propertymanagername;
    
        return $this;
    }

    /**
     * Get propertymanagername
     *
     * @return string 
     */
    public function getPropertymanagername()
    {
        return $this->propertymanagername;
    }

    /**
     * Set address
     *
     * @param string $address
     * @return Propertymanagers
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
     * @return Propertymanagers
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
     * Set attention
     *
     * @param string $attention
     * @return Propertymanagers
     */
    public function setAttention($attention)
    {
        $this->attention = $attention;
    
        return $this;
    }

    /**
     * Get attention
     *
     * @return string 
     */
    public function getAttention()
    {
        return $this->attention;
    }

    /**
     * Set phone
     *
     * @param string $phone
     * @return Propertymanagers
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    
        return $this;
    }

    /**
     * Get phone
     *
     * @return string 
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set fax
     *
     * @param string $fax
     * @return Propertymanagers
     */
    public function setFax($fax)
    {
        $this->fax = $fax;
    
        return $this;
    }

    /**
     * Get fax
     *
     * @return string 
     */
    public function getFax()
    {
        return $this->fax;
    }

    /**
     * Get propertymanagerid
     *
     * @return integer 
     */
    public function getPropertymanagerid()
    {
        return $this->propertymanagerid;
    }

    /**
     * Set city
     *
     * @param \Earls\LeaseBundle\Entity\Northamericancities $city
     * @return Propertymanagers
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
     * @return Propertymanagers
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