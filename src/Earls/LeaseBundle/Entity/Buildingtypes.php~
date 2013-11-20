<?php

namespace Earls\LeaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Buildingtypes
 *
 * @ORM\Table(name="buildingTypes")
 * @ORM\Entity
 */
class Buildingtypes
{
    /**
     * @var string
     *
     * @ORM\Column(name="buildingType", type="string", length=45, nullable=true)
     */
    private $buildingtype;

    /**
     * @var integer
     *
     * @ORM\Column(name="buildingTypeID", type="smallint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
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