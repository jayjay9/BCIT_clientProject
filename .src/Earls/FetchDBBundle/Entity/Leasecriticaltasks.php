<?php

namespace Earls\FetchDBBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Leasecriticaltasks
 *
 * @ORM\Table(name="leaseCriticalTasks")
 * @ORM\Entity
 */
class Leasecriticaltasks
{
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="ctDate", type="date", nullable=true)
     */
    private $ctdate;

    /**
     * @var float
     *
     * @ORM\Column(name="ctClause", type="float", nullable=true)
     */
    private $ctclause;

    /**
     * @var string
     *
     * @ORM\Column(name="ctDescription", type="string", length=255, nullable=true)
     */
    private $ctdescription;

    /**
     * @var integer
     *
     * @ORM\Column(name="leaseCriticalTaskID", type="smallint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $leasecriticaltaskid;

    /**
     * @var \Earls\FetchDBBundle\Entity\Leases
     *
     * @ORM\ManyToOne(targetEntity="Earls\FetchDBBundle\Entity\Leases")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="leaseID", referencedColumnName="leaseID")
     * })
     */
    private $leaseid;


}
