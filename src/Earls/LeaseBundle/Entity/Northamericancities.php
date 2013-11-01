<?php

namespace Earls\LeaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Northamericancities
 */
class Northamericancities
{
    /**
     * @var string
     */
    private $city;

    /**
     * @var integer
     */
    private $northamericancityid;


    /**
     * Set city
     *
     * @param string $city
     * @return Northamericancities
     */
    public function setCity($city)
    {
        $this->city = $city;
    
        return $this;
    }

    /**
     * Get city
     *
     * @return string 
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Get northamericancityid
     *
     * @return integer 
     */
    public function getNorthamericancityid()
    {
        return $this->northamericancityid;
    }
}
