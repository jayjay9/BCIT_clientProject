<?php

namespace Earls\CorporateBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Northamericancities
 *
 * @ORM\Table(name="northamericancities")
 * @ORM\Entity
 */
class Northamericancities
{
    /**
     * @var string
     *
     * @ORM\Column(name="city", type="string", length=45, nullable=true)
     */
    private $city;

    /**
     * @var integer
     *
     * @ORM\Column(name="northAmericanCityID", type="smallint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
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