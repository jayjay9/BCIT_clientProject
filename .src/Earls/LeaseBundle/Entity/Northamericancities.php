<?php

namespace Earls\LeaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Northamericancities
 *
 * @ORM\Table(name="northAmericanCities")
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


}
