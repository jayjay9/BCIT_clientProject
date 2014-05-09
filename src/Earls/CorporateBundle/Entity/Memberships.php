<?php

namespace Earls\CorporateBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Memberships
 *
 * @ORM\Table(name="memberships")
 * @ORM\Entity
 */
class Memberships
{
    /**
     * @var integer
     *
     * @ORM\Column(name="numberOfShares", type="integer", nullable=true)
     */
    private $numberofshares;

    /**
     * @var integer
     *
     * @ORM\Column(name="membershipID", type="smallint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $membershipid;

    /**
     * @var \Earls\CorporateBundle\Entity\Directors
     *
     * @ORM\ManyToOne(targetEntity="Earls\CorporateBundle\Entity\Directors")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="directorID", referencedColumnName="directorID")
     * })
     */
    private $directorid;

    /**
     * @var \Earls\CorporateBundle\Entity\Sharetypes
     *
     * @ORM\ManyToOne(targetEntity="Earls\CorporateBundle\Entity\Sharetypes")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="shareTypeID", referencedColumnName="shareTypeID")
     * })
     */
    private $sharetypeid;

    /**
     * @var \Earls\CorporateBundle\Entity\Corporations
     *
     * @ORM\ManyToOne(targetEntity="Earls\CorporateBundle\Entity\Corporations")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="corporateID", referencedColumnName="corporateID")
     * })
     */
    private $corporateid;



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
     * Set directorid
     *
     * @param \Earls\CorporateBundle\Entity\Directors $directorid
     * @return Memberships
     */
    public function setDirectorid(\Earls\CorporateBundle\Entity\Directors $directorid = null)
    {
        $this->directorid = $directorid;
    
        return $this;
    }

    /**
     * Get directorid
     *
     * @return \Earls\CorporateBundle\Entity\Directors 
     */
    public function getDirectorid()
    {
        return $this->directorid;
    }

    /**
     * Set sharetypeid
     *
     * @param \Earls\CorporateBundle\Entity\Sharetypes $sharetypeid
     * @return Memberships
     */
    public function setSharetypeid(\Earls\CorporateBundle\Entity\Sharetypes $sharetypeid = null)
    {
        $this->sharetypeid = $sharetypeid;
    
        return $this;
    }

    /**
     * Get sharetypeid
     *
     * @return \Earls\CorporateBundle\Entity\Sharetypes 
     */
    public function getSharetypeid()
    {
        return $this->sharetypeid;
    }

    /**
     * Set corporateid
     *
     * @param \Earls\CorporateBundle\Entity\Corporations $corporateid
     * @return Memberships
     */
    public function setCorporateid(\Earls\CorporateBundle\Entity\Corporations $corporateid = null)
    {
        $this->corporateid = $corporateid;
    
        return $this;
    }

    /**
     * Get corporateid
     *
     * @return \Earls\CorporateBundle\Entity\Corporations 
     */
    public function getCorporateid()
    {
        return $this->corporateid;
    }
}