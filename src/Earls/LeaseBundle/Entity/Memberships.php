<?php

namespace Earls\LeaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Memberships
 */
class Memberships
{
    /**
     * @var integer
     */
    private $numberofshares;

    /**
     * @var integer
     */
    private $membershipid;

    /**
     * @var \Earls\LeaseBundle\Entity\Sharetypes
     */
    private $sharetypeid;

    /**
     * @var \Earls\LeaseBundle\Entity\Corporations
     */
    private $corporateid;

    /**
     * @var \Earls\LeaseBundle\Entity\Directors
     */
    private $directorid;


    /**
     * Set numberofshares
     *
     * @param integer $numberofshares
     * @return Memberships
     */
    public function setNumberofshares($numberofshares)
    {
        $this->numberofshares = $numberofshares;
    
        return $this;
    }

    /**
     * Get numberofshares
     *
     * @return integer 
     */
    public function getNumberofshares()
    {
        return $this->numberofshares;
    }

    /**
     * Get membershipid
     *
     * @return integer 
     */
    public function getMembershipid()
    {
        return $this->membershipid;
    }

    /**
     * Set sharetypeid
     *
     * @param \Earls\LeaseBundle\Entity\Sharetypes $sharetypeid
     * @return Memberships
     */
    public function setSharetypeid(\Earls\LeaseBundle\Entity\Sharetypes $sharetypeid = null)
    {
        $this->sharetypeid = $sharetypeid;
    
        return $this;
    }

    /**
     * Get sharetypeid
     *
     * @return \Earls\LeaseBundle\Entity\Sharetypes 
     */
    public function getSharetypeid()
    {
        return $this->sharetypeid;
    }

    /**
     * Set corporateid
     *
     * @param \Earls\LeaseBundle\Entity\Corporations $corporateid
     * @return Memberships
     */
    public function setCorporateid(\Earls\LeaseBundle\Entity\Corporations $corporateid = null)
    {
        $this->corporateid = $corporateid;
    
        return $this;
    }

    /**
     * Get corporateid
     *
     * @return \Earls\LeaseBundle\Entity\Corporations 
     */
    public function getCorporateid()
    {
        return $this->corporateid;
    }

    /**
     * Set directorid
     *
     * @param \Earls\LeaseBundle\Entity\Directors $directorid
     * @return Memberships
     */
    public function setDirectorid(\Earls\LeaseBundle\Entity\Directors $directorid = null)
    {
        $this->directorid = $directorid;
    
        return $this;
    }

    /**
     * Get directorid
     *
     * @return \Earls\LeaseBundle\Entity\Directors 
     */
    public function getDirectorid()
    {
        return $this->directorid;
    }
}
