<?php

namespace Earls\LeaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Regions
 */
class Regions
{
    /**
     * @var string
     */
    private $regionmanager;

    /**
     * @var string
     */
    private $region;

    /**
     * @var integer
     */
    private $regionid;


    /**
     * Set regionmanager
     *
     * @param string $regionmanager
     * @return Regions
     */
    public function setRegionmanager($regionmanager)
    {
        $this->regionmanager = $regionmanager;
    
        return $this;
    }

    /**
     * Get regionmanager
     *
     * @return string 
     */
    public function getRegionmanager()
    {
        return $this->regionmanager;
    }

    /**
     * Set region
     *
     * @param string $region
     * @return Regions
     */
    public function setRegion($region)
    {
        $this->region = $region;
    
        return $this;
    }

    /**
     * Get region
     *
     * @return string 
     */
    public function getRegion()
    {
        return $this->region;
    }

    /**
     * Get regionid
     *
     * @return integer 
     */
    public function getRegionid()
    {
        return $this->regionid;
    }
}
