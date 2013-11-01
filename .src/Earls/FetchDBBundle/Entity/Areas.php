<?php

namespace Earls\FetchDBBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Areas
 *
 * @ORM\Table(name="areas")
 * @ORM\Entity
 */
class Areas
{
    /**
     * @var float
     *
     * @ORM\Column(name="entrybar", type="float", nullable=true)
     */
    private $entrybar;

    /**
     * @var float
     *
     * @ORM\Column(name="lounge", type="float", nullable=true)
     */
    private $lounge;

    /**
     * @var float
     *
     * @ORM\Column(name="dining", type="float", nullable=true)
     */
    private $dining;

    /**
     * @var float
     *
     * @ORM\Column(name="washrooms", type="float", nullable=true)
     */
    private $washrooms;

    /**
     * @var float
     *
     * @ORM\Column(name="boh", type="float", nullable=true)
     */
    private $boh;

    /**
     * @var float
     *
     * @ORM\Column(name="patio", type="float", nullable=true)
     */
    private $patio;

    /**
     * @var float
     *
     * @ORM\Column(name="totalarea", type="float", nullable=true)
     */
    private $totalarea;

    /**
     * @var integer
     *
     * @ORM\Column(name="areaID", type="smallint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $areaid;

    /**
     * @var \Earls\FetchDBBundle\Entity\Restaurants
     *
     * @ORM\ManyToOne(targetEntity="Earls\FetchDBBundle\Entity\Restaurants")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="restaurantID", referencedColumnName="restaurantID")
     * })
     */
    private $restaurantid;

    /**
     * @var \Earls\FetchDBBundle\Entity\Areatypes
     *
     * @ORM\ManyToOne(targetEntity="Earls\FetchDBBundle\Entity\Areatypes")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="areatypeID", referencedColumnName="areaTypeID")
     * })
     */
    private $areatypeid;


}
