<?php

namespace Earls\LeaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Renewals
 *
 * @ORM\Table(name="renewals")
 * @ORM\Entity
 */
class Renewals
{
    /**
     * @var string
     *
     * @ORM\Column(name="term", type="string", length=45, nullable=true)
     */
    private $term;

    /**
     * @var string
     *
     * @ORM\Column(name="exercised", type="string", length=45, nullable=true)
     */
    private $exercised;

    /**
     * @var boolean
     *
     * @ORM\Column(name="showInLeaseReport", type="boolean", nullable=true)
     */
    private $showinleasereport;

    /**
     * @var integer
     *
     * @ORM\Column(name="renewalID", type="smallint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $renewalid;

    /**
     * @var \Earls\LeaseBundle\Entity\Leases
     *
     * @ORM\ManyToOne(targetEntity="Earls\LeaseBundle\Entity\Leases")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="leaseID", referencedColumnName="leaseID")
     * })
     */
    private $leaseid;


}
