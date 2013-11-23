<?php

namespace Earls\LeaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Jurisdictions
 *
 * @ORM\Table(name="jurisdictions")
 * @ORM\Entity
 */
class Jurisdictions
{
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="registeredDate", type="date", nullable=true)
     */
    private $registereddate;

    /**
     * @var string
     *
     * @ORM\Column(name="registrationNumber", type="string", length=255, nullable=true)
     */
    private $registrationnumber;

    /**
     * @var integer
     *
     * @ORM\Column(name="jurisdictionsID", type="smallint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $jurisdictionsid;

    /**
     * @var \Earls\LeaseBundle\Entity\Provincestate
     *
     * @ORM\ManyToOne(targetEntity="Earls\LeaseBundle\Entity\Provincestate")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="provinceStateID", referencedColumnName="provinceStateID")
     * })
     */
    private $provincestateid;

    /**
     * @var \Earls\LeaseBundle\Entity\Corporations
     *
     * @ORM\ManyToOne(targetEntity="Earls\LeaseBundle\Entity\Corporations")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="corporateID", referencedColumnName="corporateID")
     * })
     */
    private $corporateid;


}
