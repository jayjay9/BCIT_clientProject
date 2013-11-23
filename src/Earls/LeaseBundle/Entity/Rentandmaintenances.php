<?php

namespace Earls\LeaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Rentandmaintenances
 *
 * @ORM\Table(name="rentandmaintenances")
 * @ORM\Entity
 */
class Rentandmaintenances
{
    /**
     * @var integer
     *
     * @ORM\Column(name="rentAndMaintenanceID", type="smallint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $rentandmaintenanceid;

    /**
     * @var \Earls\LeaseBundle\Entity\Owners
     *
     * @ORM\ManyToOne(targetEntity="Earls\LeaseBundle\Entity\Owners")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="roofReplace", referencedColumnName="ownerID")
     * })
     */
    private $roofreplace;

    /**
     * @var \Earls\LeaseBundle\Entity\Owners
     *
     * @ORM\ManyToOne(targetEntity="Earls\LeaseBundle\Entity\Owners")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="roofRepair", referencedColumnName="ownerID")
     * })
     */
    private $roofrepair;

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
     * @var \Earls\LeaseBundle\Entity\Owners
     *
     * @ORM\ManyToOne(targetEntity="Earls\LeaseBundle\Entity\Owners")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="hvacReplace", referencedColumnName="ownerID")
     * })
     */
    private $hvacreplace;

    /**
     * @var \Earls\LeaseBundle\Entity\Owners
     *
     * @ORM\ManyToOne(targetEntity="Earls\LeaseBundle\Entity\Owners")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="hvacRepair", referencedColumnName="ownerID")
     * })
     */
    private $hvacrepair;



    /**
     * Get rentandmaintenanceid
     *
     * @return integer 
     */
    public function getRentandmaintenanceid()
    {
        return $this->rentandmaintenanceid;
    }

    /**
     * Set roofreplace
     *
     * @param \Earls\LeaseBundle\Entity\Owners $roofreplace
     * @return Rentandmaintenances
     */
    public function setRoofreplace(\Earls\LeaseBundle\Entity\Owners $roofreplace = null)
    {
        $this->roofreplace = $roofreplace;
    
        return $this;
    }

    /**
     * Get roofreplace
     *
     * @return \Earls\LeaseBundle\Entity\Owners 
     */
    public function getRoofreplace()
    {
        return $this->roofreplace;
    }

    /**
     * Set roofrepair
     *
     * @param \Earls\LeaseBundle\Entity\Owners $roofrepair
     * @return Rentandmaintenances
     */
    public function setRoofrepair(\Earls\LeaseBundle\Entity\Owners $roofrepair = null)
    {
        $this->roofrepair = $roofrepair;
    
        return $this;
    }

    /**
     * Get roofrepair
     *
     * @return \Earls\LeaseBundle\Entity\Owners 
     */
    public function getRoofrepair()
    {
        return $this->roofrepair;
    }

    /**
     * Set restaurantid
     *
     * @param \Earls\LeaseBundle\Entity\Restaurants $restaurantid
     * @return Rentandmaintenances
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

    /**
     * Set hvacreplace
     *
     * @param \Earls\LeaseBundle\Entity\Owners $hvacreplace
     * @return Rentandmaintenances
     */
    public function setHvacreplace(\Earls\LeaseBundle\Entity\Owners $hvacreplace = null)
    {
        $this->hvacreplace = $hvacreplace;
    
        return $this;
    }

    /**
     * Get hvacreplace
     *
     * @return \Earls\LeaseBundle\Entity\Owners 
     */
    public function getHvacreplace()
    {
        return $this->hvacreplace;
    }

    /**
     * Set hvacrepair
     *
     * @param \Earls\LeaseBundle\Entity\Owners $hvacrepair
     * @return Rentandmaintenances
     */
    public function setHvacrepair(\Earls\LeaseBundle\Entity\Owners $hvacrepair = null)
    {
        $this->hvacrepair = $hvacrepair;
    
        return $this;
    }

    /**
     * Get hvacrepair
     *
     * @return \Earls\LeaseBundle\Entity\Owners 
     */
    public function getHvacrepair()
    {
        return $this->hvacrepair;
    }
}