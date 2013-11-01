<?php

namespace Earls\FetchDBBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Rentandmaintenances
 *
 * @ORM\Table(name="rentAndMaintenances")
 * @ORM\Entity
 */
class Rentandmaintenances
{
    /**
     * @var integer
     *
     * @ORM\Column(name="rentAndMaintenanceID", type="smallint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $rentandmaintenanceid;

    /**
     * @var \Earls\FetchDBBundle\Entity\Owners
     *
     * @ORM\ManyToOne(targetEntity="Earls\FetchDBBundle\Entity\Owners")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="hvacRepair", referencedColumnName="ownerID")
     * })
     */
    private $hvacrepair;

    /**
     * @var \Earls\FetchDBBundle\Entity\Owners
     *
     * @ORM\ManyToOne(targetEntity="Earls\FetchDBBundle\Entity\Owners")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="roofReplace", referencedColumnName="ownerID")
     * })
     */
    private $roofreplace;

    /**
     * @var \Earls\FetchDBBundle\Entity\Owners
     *
     * @ORM\ManyToOne(targetEntity="Earls\FetchDBBundle\Entity\Owners")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="roofRepair", referencedColumnName="ownerID")
     * })
     */
    private $roofrepair;

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
     * @var \Earls\FetchDBBundle\Entity\Owners
     *
     * @ORM\ManyToOne(targetEntity="Earls\FetchDBBundle\Entity\Owners")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="hvacReplace", referencedColumnName="ownerID")
     * })
     */
    private $hvacreplace;


}
