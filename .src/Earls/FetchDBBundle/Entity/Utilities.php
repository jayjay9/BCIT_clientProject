<?php

namespace Earls\FetchDBBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Utilities
 *
 * @ORM\Table(name="utilities")
 * @ORM\Entity
 */
class Utilities
{
    /**
     * @var boolean
     *
     * @ORM\Column(name="isMetered", type="boolean", nullable=true)
     */
    private $ismetered;

    /**
     * @var boolean
     *
     * @ORM\Column(name="isCAM", type="boolean", nullable=true)
     */
    private $iscam;

    /**
     * @var integer
     *
     * @ORM\Column(name="utilityID", type="smallint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $utilityid;

    /**
     * @var \Earls\FetchDBBundle\Entity\Utilitytypes
     *
     * @ORM\ManyToOne(targetEntity="Earls\FetchDBBundle\Entity\Utilitytypes")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="utilityTypeID", referencedColumnName="utilityTypeID")
     * })
     */
    private $utilitytypeid;

    /**
     * @var \Earls\FetchDBBundle\Entity\Billingowners
     *
     * @ORM\ManyToOne(targetEntity="Earls\FetchDBBundle\Entity\Billingowners")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="billingBy", referencedColumnName="billingOwnerID")
     * })
     */
    private $billingby;

    /**
     * @var \Earls\FetchDBBundle\Entity\Restaurants
     *
     * @ORM\ManyToOne(targetEntity="Earls\FetchDBBundle\Entity\Restaurants")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="restaurantID", referencedColumnName="restaurantID")
     * })
     */
    private $restaurantid;


}
