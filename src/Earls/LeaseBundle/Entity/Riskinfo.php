<?php

namespace Earls\LeaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Riskinfo
 *
 * @ORM\Table(name="riskInfo")
 * @ORM\Entity
 */
class Riskinfo
{
    /**
     * @var string
     *
     * @ORM\Column(name="rentAbatement", type="string", length=45, nullable=true)
     */
    private $rentabatement;

    /**
     * @var string
     *
     * @ORM\Column(name="exteriormaintenance", type="string", length=45, nullable=true)
     */
    private $exteriormaintenance;

    /**
     * @var integer
     *
     * @ORM\Column(name="riskID", type="smallint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $riskid;

    /**
     * @var \Earls\LeaseBundle\Entity\Owners
     *
     * @ORM\ManyToOne(targetEntity="Earls\LeaseBundle\Entity\Owners")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="insuredBy", referencedColumnName="ownerID")
     * })
     */
    private $insuredby;

    /**
     * @var \Earls\LeaseBundle\Entity\Constructiontypes
     *
     * @ORM\ManyToOne(targetEntity="Earls\LeaseBundle\Entity\Constructiontypes")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="constructionID", referencedColumnName="constructionID")
     * })
     */
    private $constructionid;

    /**
     * @var \Earls\LeaseBundle\Entity\Restaurants
     *
     * @ORM\ManyToOne(targetEntity="Earls\LeaseBundle\Entity\Restaurants")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="restaurantID", referencedColumnName="restaurantID")
     * })
     */
    private $restaurantid;



    /**
     * Set rentabatement
     *
     * @param string $rentabatement
     * @return Riskinfo
     */
    public function setRentabatement($rentabatement)
    {
        $this->rentabatement = $rentabatement;
    
        return $this;
    }

    /**
     * Get rentabatement
     *
     * @return string 
     */
    public function getRentabatement()
    {
        return $this->rentabatement;
    }

    /**
     * Set exteriormaintenance
     *
     * @param string $exteriormaintenance
     * @return Riskinfo
     */
    public function setExteriormaintenance($exteriormaintenance)
    {
        $this->exteriormaintenance = $exteriormaintenance;
    
        return $this;
    }

    /**
     * Get exteriormaintenance
     *
     * @return string 
     */
    public function getExteriormaintenance()
    {
        return $this->exteriormaintenance;
    }

    /**
     * Get riskid
     *
     * @return integer 
     */
    public function getRiskid()
    {
        return $this->riskid;
    }

    /**
     * Set insuredby
     *
     * @param \Earls\LeaseBundle\Entity\Owners $insuredby
     * @return Riskinfo
     */
    public function setInsuredby(\Earls\LeaseBundle\Entity\Owners $insuredby = null)
    {
        $this->insuredby = $insuredby;
    
        return $this;
    }

    /**
     * Get insuredby
     *
     * @return \Earls\LeaseBundle\Entity\Owners 
     */
    public function getInsuredby()
    {
        return $this->insuredby;
    }

    /**
     * Set constructionid
     *
     * @param \Earls\LeaseBundle\Entity\Constructiontypes $constructionid
     * @return Riskinfo
     */
    public function setConstructionid(\Earls\LeaseBundle\Entity\Constructiontypes $constructionid = null)
    {
        $this->constructionid = $constructionid;
    
        return $this;
    }

    /**
     * Get constructionid
     *
     * @return \Earls\LeaseBundle\Entity\Constructiontypes 
     */
    public function getConstructionid()
    {
        return $this->constructionid;
    }

    /**
     * Set restaurantid
     *
     * @param \Earls\LeaseBundle\Entity\Restaurants $restaurantid
     * @return Riskinfo
     */
    public function setRestaurantid(\Earls\LeaseBundle\Entity\Restaurants $restaurantid = null)
    {
        $this->restaurantid = $restaurantid;
    
        return $this;
    }

    /**
     * Get restaurantid
     *
     * @return \Earls\LeaseBundle\Entity\Restaurants 
     */
    public function getRestaurantid()
    {
        return $this->restaurantid;
    }
}