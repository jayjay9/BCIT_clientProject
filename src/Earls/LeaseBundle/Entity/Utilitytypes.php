<?php

namespace Earls\LeaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Utilitytypes
 */
class Utilitytypes
{
    /**
     * @var string
     */
    private $utilitytype;

    /**
     * @var integer
     */
    private $utilitytypeid;


    /**
     * Set utilitytype
     *
     * @param string $utilitytype
     * @return Utilitytypes
     */
    public function setUtilitytype($utilitytype)
    {
        $this->utilitytype = $utilitytype;
    
        return $this;
    }

    /**
     * Get utilitytype
     *
     * @return string 
     */
    public function getUtilitytype()
    {
        return $this->utilitytype;
    }

    /**
     * Get utilitytypeid
     *
     * @return integer 
     */
    public function getUtilitytypeid()
    {
        return $this->utilitytypeid;
    }
}
