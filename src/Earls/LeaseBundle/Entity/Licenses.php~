<?php

namespace Earls\LeaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Licenses
 *
 * @ORM\Table(name="licenses")
 * @ORM\Entity
 */
class Licenses
{
    /**
     * @var boolean
     *
     * @ORM\Column(name="licenseAgreement", type="boolean", nullable=true)
     */
    private $licenseagreement;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="startDate", type="date", nullable=true)
     */
    private $startdate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="expiraryDate", type="date", nullable=true)
     */
    private $expirarydate;

    /**
     * @var string
     *
     * @ORM\Column(name="comments", type="string", length=255, nullable=true)
     */
    private $comments;

    /**
     * @var integer
     *
     * @ORM\Column(name="licenseID", type="smallint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $licenseid;


}
