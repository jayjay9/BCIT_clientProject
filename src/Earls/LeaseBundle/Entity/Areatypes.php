<?php

namespace Earls\LeaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Areatypes
 */
class Areatypes
{
    /**
     * @var string
     */
    private $areatype;

    /**
     * @var integer
     */
    private $areatypeid;


    /**
     * Set areatype
     *
     * @param string $areatype
     * @return Areatypes
     */
    public function setAreatype($areatype)
    {
        $this->areatype = $areatype;
    
        return $this;
    }

    /**
     * Get areatype
     *
     * @return string 
     */
    public function getAreatype()
    {
        return $this->areatype;
    }

    /**
     * Get areatypeid
     *
     * @return integer 
     */
    public function getAreatypeid()
    {
        return $this->areatypeid;
    }
}
