<?php

namespace Earls\LeaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Leases
 */
class Leases
{
    /**
     * @var string
     */
    private $leasetype;

    /**
     * @var \DateTime
     */
    private $leasedate;

    /**
     * @var string
     */
    private $term;

    /**
     * @var \DateTime
     */
    private $commencementdate;

    /**
     * @var \DateTime
     */
    private $expirydate;

    /**
     * @var string
     */
    private $optiontime;

    /**
     * @var float
     */
    private $areamain;

    /**
     * @var float
     */
    private $areamezzanine;

    /**
     * @var float
     */
    private $areapatio;

    /**
     * @var float
     */
    private $areaother;

    /**
     * @var string
     */
    private $surveyeddescription;

    /**
     * @var string
     */
    private $renewalterms;

    /**
     * @var \DateTime
     */
    private $renewaloptiondate;

    /**
     * @var string
     */
    private $exclusiveuse;

    /**
     * @var string
     */
    private $tiallowance;

    /**
     * @var string
     */
    private $radiusclause;

    /**
     * @var string
     */
    private $indemnifier;

    /**
     * @var string
     */
    private $indemnityperiod;

    /**
     * @var \DateTime
     */
    private $indemnityexpiry;

    /**
     * @var string
     */
    private $otherdescription;

    /**
     * @var string
     */
    private $renewalcomments;

    /**
     * @var \DateTime
     */
    private $timestamp;

    /**
     * @var float
     */
    private $areaupperfloor;

    /**
     * @var boolean
     */
    private $showinlease;

    /**
     * @var integer
     */
    private $leaseid;

    /**
     * @var \Earls\LeaseBundle\Entity\Leasereportsinfo
     */
    private $leasereportinfoid;

    /**
     * @var \Earls\LeaseBundle\Entity\Restaurants
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
     * @param \DateTime $indemnityexpiry
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
     * @return \DateTime 
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
     * @param \DateTime $timestamp
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
     * @return \DateTime 
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
     * Set leasereportinfoid
     *
     * @param \Earls\LeaseBundle\Entity\Leasereportsinfo $leasereportinfoid
     * @return Leases
     */
    public function setLeasereportinfoid(\Earls\LeaseBundle\Entity\Leasereportsinfo $leasereportinfoid = null)
    {
        $this->leasereportinfoid = $leasereportinfoid;
    
        return $this;
    }

    /**
     * Get leasereportinfoid
     *
     * @return \Earls\LeaseBundle\Entity\Leasereportsinfo 
     */
    public function getLeasereportinfoid()
    {
        return $this->leasereportinfoid;
    }

    /**
     * Set restaurantid
     *
     * @param \Earls\LeaseBundle\Entity\Restaurants $restaurantid
     * @return Leases
     */
    public function setRestaurantid(\Earls\LeaseBundle\Entity\Restaurants $restaurantid = null)
    {
        $this->restaurantid = $restaurantid;
    
        return $this;
    }

    /**
     * Get restaurantid
     *
     * @return \Earls\LeaseBundle\Entity\Restaurants 
     */
    public function getRestaurantid()
    {
        return $this->restaurantid;
    }
}
