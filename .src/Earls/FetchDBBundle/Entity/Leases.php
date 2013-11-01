<?php

namespace Earls\FetchDBBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Leases
 *
 * @ORM\Table(name="leases")
 * @ORM\Entity
 */
class Leases
{
    /**
     * @var string
     *
     * @ORM\Column(name="leaseType", type="string", length=255, nullable=true)
     */
    private $leasetype;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="leaseDate", type="date", nullable=true)
     */
    private $leasedate;

    /**
     * @var string
     *
     * @ORM\Column(name="term", type="string", length=45, nullable=true)
     */
    private $term;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="commencementDate", type="date", nullable=true)
     */
    private $commencementdate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="expiryDate", type="date", nullable=true)
     */
    private $expirydate;

    /**
     * @var string
     *
     * @ORM\Column(name="optionTime", type="string", length=45, nullable=true)
     */
    private $optiontime;

    /**
     * @var float
     *
     * @ORM\Column(name="areaMain", type="float", nullable=true)
     */
    private $areamain;

    /**
     * @var float
     *
     * @ORM\Column(name="areaMezzanine", type="float", nullable=true)
     */
    private $areamezzanine;

    /**
     * @var float
     *
     * @ORM\Column(name="areaPatio", type="float", nullable=true)
     */
    private $areapatio;

    /**
     * @var float
     *
     * @ORM\Column(name="areaOther", type="float", nullable=true)
     */
    private $areaother;

    /**
     * @var string
     *
     * @ORM\Column(name="surveyedDescription", type="string", length=255, nullable=true)
     */
    private $surveyeddescription;

    /**
     * @var string
     *
     * @ORM\Column(name="renewalTerms", type="string", length=255, nullable=true)
     */
    private $renewalterms;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="renewalOptionDate", type="date", nullable=true)
     */
    private $renewaloptiondate;

    /**
     * @var string
     *
     * @ORM\Column(name="exclusiveUse", type="string", length=45, nullable=true)
     */
    private $exclusiveuse;

    /**
     * @var string
     *
     * @ORM\Column(name="tiAllowance", type="string", length=255, nullable=true)
     */
    private $tiallowance;

    /**
     * @var string
     *
     * @ORM\Column(name="radiusClause", type="string", length=255, nullable=true)
     */
    private $radiusclause;

    /**
     * @var string
     *
     * @ORM\Column(name="indemnifier", type="string", length=255, nullable=true)
     */
    private $indemnifier;

    /**
     * @var string
     *
     * @ORM\Column(name="indemnityPeriod", type="string", length=255, nullable=true)
     */
    private $indemnityperiod;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="indemnityExpiry", type="datetime", nullable=true)
     */
    private $indemnityexpiry;

    /**
     * @var string
     *
     * @ORM\Column(name="otherDescription", type="string", length=255, nullable=true)
     */
    private $otherdescription;

    /**
     * @var string
     *
     * @ORM\Column(name="renewalComments", type="string", length=255, nullable=true)
     */
    private $renewalcomments;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="timeStamp", type="datetime", nullable=true)
     */
    private $timestamp;

    /**
     * @var float
     *
     * @ORM\Column(name="areaUpperFloor", type="float", nullable=true)
     */
    private $areaupperfloor;

    /**
     * @var boolean
     *
     * @ORM\Column(name="showInLease", type="boolean", nullable=true)
     */
    private $showinlease;

    /**
     * @var integer
     *
     * @ORM\Column(name="leaseID", type="smallint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $leaseid;

    /**
     * @var \Earls\FetchDBBundle\Entity\Leasereportsinfo
     *
     * @ORM\ManyToOne(targetEntity="Earls\FetchDBBundle\Entity\Leasereportsinfo")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="leaseReportInfoID", referencedColumnName="leaseReportInfoID")
     * })
     */
    private $leasereportinfoid;

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
