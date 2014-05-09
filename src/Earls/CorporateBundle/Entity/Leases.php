<?php

namespace Earls\CorporateBundle\Entity;

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
     * @var string
     *
     * @ORM\Column(name="indemnityExpiry", type="string", length=255, nullable=true)
     */
    private $indemnityexpiry;

    /**
     * @var string
     *
     * @ORM\Column(name="otherDescription", type="string", length=955, nullable=true)
     */
    private $otherdescription;

    /**
     * @var string
     *
     * @ORM\Column(name="renewalComments", type="string", length=255, nullable=true)
     */
    private $renewalcomments;

    /**
     * @var string
     *
     * @ORM\Column(name="timeStamp", type="string", length=45, nullable=true)
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
     * @var \Earls\CorporateBundle\Entity\Restaurants
     *
     * @ORM\ManyToOne(targetEntity="Earls\CorporateBundle\Entity\Restaurants")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="restaurantID", referencedColumnName="restaurantID")
     * })
     */
    private $restaurantid;



    /**
     * Set leasetype
     *
     * @param string $leasetype
     * @return Leases
     */
    public function setLeasetype($leasetype)
    {
        $this->leasetype = $leasetype;
    
        return $this;
    }

    /**
     * Get leasetype
     *
     * @return string 
     */
    public function getLeasetype()
    {
        return $this->leasetype;
    }

    /**
     * Set leasedate
     *
     * @param \DateTime $leasedate
     * @return Leases
     */
    public function setLeasedate($leasedate)
    {
        $this->leasedate = $leasedate;
    
        return $this;
    }

    /**
     * Get leasedate
     *
     * @return \DateTime 
     */
    public function getLeasedate()
    {
        return $this->leasedate;
    }

    /**
     * Set term
     *
     * @param string $term
     * @return Leases
     */
    public function setTerm($term)
    {
        $this->term = $term;
    
        return $this;
    }

    /**
     * Get term
     *
     * @return string 
     */
    public function getTerm()
    {
        return $this->term;
    }

    /**
     * Set commencementdate
     *
     * @param \DateTime $commencementdate
     * @return Leases
     */
    public function setCommencementdate($commencementdate)
    {
        $this->commencementdate = $commencementdate;
    
        return $this;
    }

    /**
     * Get commencementdate
     *
     * @return \DateTime 
     */
    public function getCommencementdate()
    {
        return $this->commencementdate;
    }

    /**
     * Set expirydate
     *
     * @param \DateTime $expirydate
     * @return Leases
     */
    public function setExpirydate($expirydate)
    {
        $this->expirydate = $expirydate;
    
        return $this;
    }

    /**
     * Get expirydate
     *
     * @return \DateTime 
     */
    public function getExpirydate()
    {
        return $this->expirydate;
    }

    /**
     * Set optiontime
     *
     * @param string $optiontime
     * @return Leases
     */
    public function setOptiontime($optiontime)
    {
        $this->optiontime = $optiontime;
    
        return $this;
    }

    /**
     * Get optiontime
     *
     * @return string 
     */
    public function getOptiontime()
    {
        return $this->optiontime;
    }

    /**
     * Set areamain
     *
     * @param float $areamain
     * @return Leases
     */
    public function setAreamain($areamain)
    {
        $this->areamain = $areamain;
    
        return $this;
    }

    /**
     * Get areamain
     *
     * @return float 
     */
    public function getAreamain()
    {
        return $this->areamain;
    }

    /**
     * Set areamezzanine
     *
     * @param float $areamezzanine
     * @return Leases
     */
    public function setAreamezzanine($areamezzanine)
    {
        $this->areamezzanine = $areamezzanine;
    
        return $this;
    }

    /**
     * Get areamezzanine
     *
     * @return float 
     */
    public function getAreamezzanine()
    {
        return $this->areamezzanine;
    }

    /**
     * Set areapatio
     *
     * @param float $areapatio
     * @return Leases
     */
    public function setAreapatio($areapatio)
    {
        $this->areapatio = $areapatio;
    
        return $this;
    }

    /**
     * Get areapatio
     *
     * @return float 
     */
    public function getAreapatio()
    {
        return $this->areapatio;
    }

    /**
     * Set areaother
     *
     * @param float $areaother
     * @return Leases
     */
    public function setAreaother($areaother)
    {
        $this->areaother = $areaother;
    
        return $this;
    }

    /**
     * Get areaother
     *
     * @return float 
     */
    public function getAreaother()
    {
        return $this->areaother;
    }

    /**
     * Set surveyeddescription
     *
     * @param string $surveyeddescription
     * @return Leases
     */
    public function setSurveyeddescription($surveyeddescription)
    {
        $this->surveyeddescription = $surveyeddescription;
    
        return $this;
    }

    /**
     * Get surveyeddescription
     *
     * @return string 
     */
    public function getSurveyeddescription()
    {
        return $this->surveyeddescription;
    }

    /**
     * Set renewalterms
     *
     * @param string $renewalterms
     * @return Leases
     */
    public function setRenewalterms($renewalterms)
    {
        $this->renewalterms = $renewalterms;
    
        return $this;
    }

    /**
     * Get renewalterms
     *
     * @return string 
     */
    public function getRenewalterms()
    {
        return $this->renewalterms;
    }

    /**
     * Set renewaloptiondate
     *
     * @param \DateTime $renewaloptiondate
     * @return Leases
     */
    public function setRenewaloptiondate($renewaloptiondate)
    {
        $this->renewaloptiondate = $renewaloptiondate;
    
        return $this;
    }

    /**
     * Get renewaloptiondate
     *
     * @return \DateTime 
     */
    public function getRenewaloptiondate()
    {
        return $this->renewaloptiondate;
    }

    /**
     * Set exclusiveuse
     *
     * @param string $exclusiveuse
     * @return Leases
     */
    public function setExclusiveuse($exclusiveuse)
    {
        $this->exclusiveuse = $exclusiveuse;
    
        return $this;
    }

    /**
     * Get exclusiveuse
     *
     * @return string 
     */
    public function getExclusiveuse()
    {
        return $this->exclusiveuse;
    }

    /**
     * Set tiallowance
     *
     * @param string $tiallowance
     * @return Leases
     */
    public function setTiallowance($tiallowance)
    {
        $this->tiallowance = $tiallowance;
    
        return $this;
    }

    /**
     * Get tiallowance
     *
     * @return string 
     */
    public function getTiallowance()
    {
        return $this->tiallowance;
    }

    /**
     * Set radiusclause
     *
     * @param string $radiusclause
     * @return Leases
     */
    public function setRadiusclause($radiusclause)
    {
        $this->radiusclause = $radiusclause;
    
        return $this;
    }

    /**
     * Get radiusclause
     *
     * @return string 
     */
    public function getRadiusclause()
    {
        return $this->radiusclause;
    }

    /**
     * Set indemnifier
     *
     * @param string $indemnifier
     * @return Leases
     */
    public function setIndemnifier($indemnifier)
    {
        $this->indemnifier = $indemnifier;
    
        return $this;
    }

    /**
     * Get indemnifier
     *
     * @return string 
     */
    public function getIndemnifier()
    {
        return $this->indemnifier;
    }

    /**
     * Set indemnityperiod
     *
     * @param string $indemnityperiod
     * @return Leases
     */
    public function setIndemnityperiod($indemnityperiod)
    {
        $this->indemnityperiod = $indemnityperiod;
    
        return $this;
    }

    /**
     * Get indemnityperiod
     *
     * @return string 
     */
    public function getIndemnityperiod()
    {
        return $this->indemnityperiod;
    }

    /**
     * Set indemnityexpiry
     *
     * @param string $indemnityexpiry
     * @return Leases
     */
    public function setIndemnityexpiry($indemnityexpiry)
    {
        $this->indemnityexpiry = $indemnityexpiry;
    
        return $this;
    }

    /**
     * Get indemnityexpiry
     *
     * @return string 
     */
    public function getIndemnityexpiry()
    {
        return $this->indemnityexpiry;
    }

    /**
     * Set otherdescription
     *
     * @param string $otherdescription
     * @return Leases
     */
    public function setOtherdescription($otherdescription)
    {
        $this->otherdescription = $otherdescription;
    
        return $this;
    }

    /**
     * Get otherdescription
     *
     * @return string 
     */
    public function getOtherdescription()
    {
        return $this->otherdescription;
    }

    /**
     * Set renewalcomments
     *
     * @param string $renewalcomments
     * @return Leases
     */
    public function setRenewalcomments($renewalcomments)
    {
        $this->renewalcomments = $renewalcomments;
    
        return $this;
    }

    /**
     * Get renewalcomments
     *
     * @return string 
     */
    public function getRenewalcomments()
    {
        return $this->renewalcomments;
    }

    /**
     * Set timestamp
     *
     * @param string $timestamp
     * @return Leases
     */
    public function setTimestamp($timestamp)
    {
        $this->timestamp = $timestamp;
    
        return $this;
    }

    /**
     * Get timestamp
     *
     * @return string 
     */
    public function getTimestamp()
    {
        return $this->timestamp;
    }

    /**
     * Set areaupperfloor
     *
     * @param float $areaupperfloor
     * @return Leases
     */
    public function setAreaupperfloor($areaupperfloor)
    {
        $this->areaupperfloor = $areaupperfloor;
    
        return $this;
    }

    /**
     * Get areaupperfloor
     *
     * @return float 
     */
    public function getAreaupperfloor()
    {
        return $this->areaupperfloor;
    }

    /**
     * Set showinlease
     *
     * @param boolean $showinlease
     * @return Leases
     */
    public function setShowinlease($showinlease)
    {
        $this->showinlease = $showinlease;
    
        return $this;
    }

    /**
     * Get showinlease
     *
     * @return boolean 
     */
    public function getShowinlease()
    {
        return $this->showinlease;
    }

    /**
     * Get leaseid
     *
     * @return integer 
     */
    public function getLeaseid()
    {
        return $this->leaseid;
    }

    /**
     * Set restaurantid
     *
     * @param \Earls\CorporateBundle\Entity\Restaurants $restaurantid
     * @return Leases
     */
    public function setRestaurantid(\Earls\CorporateBundle\Entity\Restaurants $restaurantid = null)
    {
        $this->restaurantid = $restaurantid;
    
        return $this;
    }

    /**
     * Get restaurantid
     *
     * @return \Earls\CorporateBundle\Entity\Restaurants 
     */
    public function getRestaurantid()
    {
        return $this->restaurantid;
    }
}