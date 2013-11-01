<?php

namespace Earls\LeaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Renewals
 */
class Renewals
{
    /**
     * @var string
     */
    private $term;

    /**
     * @var string
     */
    private $exercised;

    /**
     * @var boolean
     */
    private $showinleasereport;

    /**
     * @var integer
     */
    private $renewalid;

    /**
     * @var \Earls\LeaseBundle\Entity\Leases
     */
    private $leaseid;


    /**
     * Set term
     *
     * @param string $term
     * @return Renewals
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
     * Set exercised
     *
     * @param string $exercised
     * @return Renewals
     */
    public function setExercised($exercised)
    {
        $this->exercised = $exercised;
    
        return $this;
    }

    /**
     * Get exercised
     *
     * @return string 
     */
    public function getExercised()
    {
        return $this->exercised;
    }

    /**
     * Set showinleasereport
     *
     * @param boolean $showinleasereport
     * @return Renewals
     */
    public function setShowinleasereport($showinleasereport)
    {
        $this->showinleasereport = $showinleasereport;
    
        return $this;
    }

    /**
     * Get showinleasereport
     *
     * @return boolean 
     */
    public function getShowinleasereport()
    {
        return $this->showinleasereport;
    }

    /**
     * Get renewalid
     *
     * @return integer 
     */
    public function getRenewalid()
    {
        return $this->renewalid;
    }

    /**
     * Set leaseid
     *
     * @param \Earls\LeaseBundle\Entity\Leases $leaseid
     * @return Renewals
     */
    public function setLeaseid(\Earls\LeaseBundle\Entity\Leases $leaseid = null)
    {
        $this->leaseid = $leaseid;
    
        return $this;
    }

    /**
     * Get leaseid
     *
     * @return \Earls\LeaseBundle\Entity\Leases 
     */
    public function getLeaseid()
    {
        return $this->leaseid;
    }
}
