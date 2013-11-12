<?php

namespace Earls\LeaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Utilitytypes
 *
 * @ORM\Table(name="utilitytypes")
 * @ORM\Entity
 */
class Utilitytypes
{
    /**
     * @var string
     *
     * @ORM\Column(name="utilityType", type="string", length=45, nullable=true)
     */
    private $utilitytype;

    /**
     * @var integer
     *
     * @ORM\Column(name="utilityTypeID", type="smallint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
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