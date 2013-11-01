<?php

namespace Earls\LeaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Leasecriticaltasks
 */
class Leasecriticaltasks
{
    /**
     * @var \DateTime
     */
    private $ctdate;

    /**
     * @var float
     */
    private $ctclause;

    /**
     * @var string
     */
    private $ctdescription;

    /**
     * @var integer
     */
    private $leasecriticaltaskid;

    /**
     * @var \Earls\LeaseBundle\Entity\Leases
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
     * @param \Earls\LeaseBundle\Entity\Leases $leaseid
     * @return Leasecriticaltasks
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
