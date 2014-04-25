<?php

namespace Earls\CorporateBundle\Entity;

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
     * @var \Earls\CorporateBundle\Entity\Offices
     *
     * @ORM\ManyToOne(targetEntity="Earls\CorporateBundle\Entity\Offices")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="officeID", referencedColumnName="officeID")
     * })
     */
    private $officeid;

    /**
     * @var \Earls\CorporateBundle\Entity\Provincestate
     *
     * @ORM\ManyToOne(targetEntity="Earls\CorporateBundle\Entity\Provincestate")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="provinceStateID", referencedColumnName="provinceStateID")
     * })
     */
    private $provincestateid;

    /**
     * @var \Earls\CorporateBundle\Entity\Northamericancities
     *
     * @ORM\ManyToOne(targetEntity="Earls\CorporateBundle\Entity\Northamericancities")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="city", referencedColumnName="northAmericanCityID")
     * })
     */
    private $city;



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
     * @param \Earls\CorporateBundle\Entity\Offices $officeid
     * @return Recordsoffices
     */
    public function setOfficeid(\Earls\CorporateBundle\Entity\Offices $officeid = null)
    {
        $this->officeid = $officeid;
    
        return $this;
    }

    /**
     * Get officeid
     *
     * @return \Earls\CorporateBundle\Entity\Offices 
     */
    public function getOfficeid()
    {
        return $this->officeid;
    }

    /**
     * Set provincestateid
     *
     * @param \Earls\CorporateBundle\Entity\Provincestate $provincestateid
     * @return Recordsoffices
     */
    public function setProvincestateid(\Earls\CorporateBundle\Entity\Provincestate $provincestateid = null)
    {
        $this->provincestateid = $provincestateid;
    
        return $this;
    }

    /**
     * Get provincestateid
     *
     * @return \Earls\CorporateBundle\Entity\Provincestate 
     */
    public function getProvincestateid()
    {
        return $this->provincestateid;
    }

    /**
     * Set city
     *
     * @param \Earls\CorporateBundle\Entity\Northamericancities $city
     * @return Recordsoffices
     */
    public function setCity(\Earls\CorporateBundle\Entity\Northamericancities $city = null)
    {
        $this->city = $city;
    
        return $this;
    }

    /**
     * Get city
     *
     * @return \Earls\CorporateBundle\Entity\Northamericancities 
     */
    public function getCity()
    {
        return $this->city;
    }
}