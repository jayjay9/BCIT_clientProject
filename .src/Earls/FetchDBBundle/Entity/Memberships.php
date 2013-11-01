<?php

namespace Earls\FetchDBBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Memberships
 *
 * @ORM\Table(name="memberships")
 * @ORM\Entity
 */
class Memberships
{
    /**
     * @var integer
     *
     * @ORM\Column(name="numberOfShares", type="integer", nullable=true)
     */
    private $numberofshares;

    /**
     * @var integer
     *
     * @ORM\Column(name="membershipID", type="smallint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $membershipid;

    /**
     * @var \Earls\FetchDBBundle\Entity\Sharetypes
     *
     * @ORM\ManyToOne(targetEntity="Earls\FetchDBBundle\Entity\Sharetypes")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="shareTypeID", referencedColumnName="shareTypeID")
     * })
     */
    private $sharetypeid;

    /**
     * @var \Earls\FetchDBBundle\Entity\Corporations
     *
     * @ORM\ManyToOne(targetEntity="Earls\FetchDBBundle\Entity\Corporations")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="corporateID", referencedColumnName="corporateID")
     * })
     */
    private $corporateid;

    /**
     * @var \Earls\FetchDBBundle\Entity\Directors
     *
     * @ORM\ManyToOne(targetEntity="Earls\FetchDBBundle\Entity\Directors")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="directorID", referencedColumnName="directorID")
     * })
     */
    private $directorid;


}
