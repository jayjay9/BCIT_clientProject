<?php

namespace Earls\LeaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Owners
 */
class Owners
{
    /**
     * @var string
     */
    private $ownertype;

    /**
     * @var integer
     */
    private $ownerid;


    /**
     * Set ownertype
     *
     * @param string $ownertype
     * @return Owners
     */
    public function setOwnertype($ownertype)
    {
        $this->ownertype = $ownertype;
    
        return $this;
    }

    /**
     * Get ownertype
     *
     * @return string 
     */
    public function getOwnertype()
    {
        return $this->ownertype;
    }

    /**
     * Get ownerid
     *
     * @return integer 
     */
    public function getOwnerid()
    {
        return $this->ownerid;
    }
}
