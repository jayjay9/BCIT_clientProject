<?php

namespace Earls\LeaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Riskinfo
 */
class Riskinfo
{
    /**
     * @var string
     */
    private $rentabatement;

    /**
     * @var string
     */
    private $exteriormaintenance;

    /**
     * @var integer
     */
    private $riskid;

    /**
     * @var \Earls\LeaseBundle\Entity\Constructiontypes
     */
    private $constructionid;

    /**
     * @var \Earls\LeaseBundle\Entity\Owners
     */
    private $insuredby;

    /**
     * @var \Earls\LeaseBundle\Entity\Restaurants
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
