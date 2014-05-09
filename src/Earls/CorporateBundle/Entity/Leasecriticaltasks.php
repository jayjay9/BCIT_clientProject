<?php

namespace Earls\CorporateBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Leasecriticaltasks
 *
 * @ORM\Table(name="leasecriticaltasks")
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
     * @var \Earls\CorporateBundle\Entity\Leases
     *
     * @ORM\ManyToOne(targetEntity="Earls\CorporateBundle\Entity\Leases")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="leaseID", referencedColumnName="leaseID")
     * })
     */
    private $leaseid;



    /**
     * Set ctdate
     *
     * @param \DateTime $ctdate
     * @return Leasecriticaltasks
     */
    public function setCtdate($ctdate)
    {
        $this->ctdate = $ctdate;
    
        return $this;
    }

    /**
     * Get ctdate
     *
     * @return \DateTime 
     */
    public function getCtdate()
    {
        return $this->ctdate;
    }

    /**
     * Set ctclause
     *
     * @param float $ctclause
     * @return Leasecriticaltasks
     */
    public function setCtclause($ctclause)
    {
        $this->ctclause = $ctclause;
    
        return $this;
    }

    /**
     * Get ctclause
     *
     * @return float 
     */
    public function getCtclause()
    {
        return $this->ctclause;
    }

    /**
     * Set ctdescription
     *
     * @param string $ctdescription
     * @return Leasecriticaltasks
     */
    public function setCtdescription($ctdescription)
    {
        $this->ctdescription = $ctdescription;
    
        return $this;
    }

    /**
     * Get ctdescription
     *
     * @return string 
     */
    public function getCtdescription()
    {
        return $this->ctdescription;
    }

    /**
     * Get leasecriticaltaskid
     *
     * @return integer 
     */
    public function getLeasecriticaltaskid()
    {
        return $this->leasecriticaltaskid;
    }

    /**
     * Set leaseid
     *
     * @param \Earls\CorporateBundle\Entity\Leases $leaseid
     * @return Leasecriticaltasks
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