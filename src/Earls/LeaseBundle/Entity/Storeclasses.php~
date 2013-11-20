<?php

namespace Earls\LeaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Storeclasses
 *
 * @ORM\Table(name="storeClasses")
 * @ORM\Entity
 */
class Storeclasses
{
    /**
     * @var string
     *
     * @ORM\Column(name="storeClass", type="string", length=45, nullable=true)
     */
    private $storeclass;

    /**
     * @var integer
     *
     * @ORM\Column(name="storeClassID", type="smallint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
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