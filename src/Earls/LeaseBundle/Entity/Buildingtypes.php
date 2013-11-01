<?php

namespace Earls\LeaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Buildingtypes
 */
class Buildingtypes
{
    /**
     * @var string
     */
    private $buildingtype;

    /**
     * @var integer
     */
    private $buildingtypeid;


    /**
     * Set buildingtype
     *
     * @param string $buildingtype
     * @return Buildingtypes
     */
    public function setBuildingtype($buildingtype)
    {
        $this->buildingtype = $buildingtype;
    
        return $this;
    }

    /**
     * Get buildingtype
     *
     * @return string 
     */
    public function getBuildingtype()
    {
        return $this->buildingtype;
    }

    /**
     * Get buildingtypeid
     *
     * @return integer 
     */
    public function getBuildingtypeid()
    {
        return $this->buildingtypeid;
    }
}
