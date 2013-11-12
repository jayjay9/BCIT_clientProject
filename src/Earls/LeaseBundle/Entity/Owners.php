<?php

namespace Earls\LeaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Owners
 *
 * @ORM\Table(name="owners")
 * @ORM\Entity
 */
class Owners
{
    /**
     * @var string
     *
     * @ORM\Column(name="ownerType", type="string", length=45, nullable=true)
     */
    private $ownertype;

    /**
     * @var integer
     *
     * @ORM\Column(name="ownerID", type="smallint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
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