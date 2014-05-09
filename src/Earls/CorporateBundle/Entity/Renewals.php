<?php

namespace Earls\CorporateBundle\Entity;

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
     * @var boolean
     *
     * @ORM\Column(name="exercised", type="boolean", nullable=true)
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
     * @var \Earls\CorporateBundle\Entity\Leases
     *
     * @ORM\ManyToOne(targetEntity="Earls\CorporateBundle\Entity\Leases")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="leaseID", referencedColumnName="leaseID")
     * })
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
     * @param boolean $exercised
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
     * @return boolean 
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
     * @param \Earls\CorporateBundle\Entity\Leases $leaseid
     * @return Renewals
     */
    public function setLeaseid(\Earls\CorporateBundle\Entity\Leases $leaseid = null)
    {
        $this->leaseid = $leaseid;
    
        return $this;
    }

    /**
     * Get leaseid
     *
     * @return \Earls\CorporateBundle\Entity\Leases 
     */
    public function getLeaseid()
    {
        return $this->leaseid;
    }
}