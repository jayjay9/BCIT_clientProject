<?php

namespace Earls\LeaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Regions
 *
 * @ORM\Table(name="regions")
 * @ORM\Entity
 */
class Regions
{
    /**
     * @var string
     *
     * @ORM\Column(name="regionManager", type="string", length=45, nullable=true)
     */
    private $regionmanager;

    /**
     * @var string
     *
     * @ORM\Column(name="region", type="string", length=45, nullable=true)
     */
    private $region;

    /**
     * @var integer
     *
     * @ORM\Column(name="regionID", type="smallint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
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