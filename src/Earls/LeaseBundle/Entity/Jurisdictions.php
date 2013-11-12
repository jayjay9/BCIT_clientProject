<?php

namespace Earls\LeaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Jurisdictions
 *
 * @ORM\Table(name="jurisdictions")
 * @ORM\Entity
 */
class Jurisdictions
{
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="registeredDate", type="date", nullable=true)
     */
    private $registereddate;

    /**
     * @var string
     *
     * @ORM\Column(name="registrationNumber", type="string", length=255, nullable=true)
     */
    private $registrationnumber;

    /**
     * @var integer
     *
     * @ORM\Column(name="jurisdictionsID", type="smallint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $jurisdictionsid;

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