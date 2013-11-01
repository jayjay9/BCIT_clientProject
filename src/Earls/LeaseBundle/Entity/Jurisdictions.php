<?php

namespace Earls\LeaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Jurisdictions
 */
class Jurisdictions
{
    /**
     * @var \DateTime
     */
    private $registereddate;

    /**
     * @var string
     */
    private $registrationnumber;

    /**
     * @var integer
     */
    private $jurisdictionsid;

    /**
     * @var \Earls\LeaseBundle\Entity\Provincestate
     */
    private $provincestateid;

    /**
     * @var \Earls\LeaseBundle\Entity\Corporations
     */
    private $corporateid;


    /**
     * Set registereddate
     *
     * @param \DateTime $registereddate
     * @return Jurisdictions
     */
    public function setRegistereddate($registereddate)
    {
        $this->registereddate = $registereddate;
    
        return $this;
    }

    /**
     * Get registereddate
     *
     * @return \DateTime 
     */
    public function getRegistereddate()
    {
        return $this->registereddate;
    }

    /**
     * Set registrationnumber
     *
     * @param string $registrationnumber
     * @return Jurisdictions
     */
    public function setRegistrationnumber($registrationnumber)
    {
        $this->registrationnumber = $registrationnumber;
    
        return $this;
    }

    /**
     * Get registrationnumber
     *
     * @return string 
     */
    public function getRegistrationnumber()
    {
        return $this->registrationnumber;
    }

    /**
     * Get jurisdictionsid
     *
     * @return integer 
     */
    public function getJurisdictionsid()
    {
        return $this->jurisdictionsid;
    }

    /**
     * Set provincestateid
     *
     * @param \Earls\LeaseBundle\Entity\Provincestate $provincestateid
     * @return Jurisdictions
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
     * @return Jurisdictions
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
