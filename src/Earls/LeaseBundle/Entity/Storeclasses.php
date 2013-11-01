<?php

namespace Earls\LeaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Storeclasses
 */
class Storeclasses
{
    /**
     * @var string
     */
    private $storeclass;

    /**
     * @var integer
     */
    private $storeclassid;


    /**
     * Set storeclass
     *
     * @param string $storeclass
     * @return Storeclasses
     */
    public function setStoreclass($storeclass)
    {
        $this->storeclass = $storeclass;
    
        return $this;
    }

    /**
     * Get storeclass
     *
     * @return string 
     */
    public function getStoreclass()
    {
        return $this->storeclass;
    }

    /**
     * Get storeclassid
     *
     * @return integer 
     */
    public function getStoreclassid()
    {
        return $this->storeclassid;
    }
}
