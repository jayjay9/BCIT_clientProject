<?php

namespace Earls\CorporateBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Utilities
 *
 * @ORM\Table(name="utilities")
 * @ORM\Entity
 */
class Utilities
{
    /**
     * @var boolean
     *
     * @ORM\Column(name="isMetered", type="boolean", nullable=true)
     */
    private $ismetered;

    /**
     * @var boolean
     *
     * @ORM\Column(name="isCAM", type="boolean", nullable=true)
     */
    private $iscam;

    /**
     * @var integer
     *
     * @ORM\Column(name="utilityID", type="smallint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $utilityid;

    /**
     * @var \Earls\CorporateBundle\Entity\Billingowners
     *
     * @ORM\ManyToOne(targetEntity="Earls\CorporateBundle\Entity\Billingowners")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="billingBy", referencedColumnName="billingOwnerID")
     * })
     */
    private $billingby;

    /**
     * @var \Earls\CorporateBundle\Entity\Utilitytypes
     *
     * @ORM\ManyToOne(targetEntity="Earls\CorporateBundle\Entity\Utilitytypes")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="utilityTypeID", referencedColumnName="utilityTypeID")
     * })
     */
    private $utilitytypeid;

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
     * Set ismetered
     *
     * @param boolean $ismetered
     * @return Utilities
     */
    public function setIsmetered($ismetered)
    {
        $this->ismetered = $ismetered;
    
        return $this;
    }

    /**
     * Get ismetered
     *
     * @return boolean 
     */
    public function getIsmetered()
    {
        return $this->ismetered;
    }

    /**
     * Set iscam
     *
     * @param boolean $iscam
     * @return Utilities
     */
    public function setIscam($iscam)
    {
        $this->iscam = $iscam;
    
        return $this;
    }

    /**
     * Get iscam
     *
     * @return boolean 
     */
    public function getIscam()
    {
        return $this->iscam;
    }

    /**
     * Get utilityid
     *
     * @return integer 
     */
    public function getUtilityid()
    {
        return $this->utilityid;
    }

    /**
     * Set billingby
     *
     * @param \Earls\CorporateBundle\Entity\Billingowners $billingby
     * @return Utilities
     */
    public function setBillingby(\Earls\CorporateBundle\Entity\Billingowners $billingby = null)
    {
        $this->billingby = $billingby;
    
        return $this;
    }

    /**
     * Get billingby
     *
     * @return \Earls\CorporateBundle\Entity\Billingowners 
     */
    public function getBillingby()
    {
        return $this->billingby;
    }

    /**
     * Set utilitytypeid
     *
     * @param \Earls\CorporateBundle\Entity\Utilitytypes $utilitytypeid
     * @return Utilities
     */
    public function setUtilitytypeid(\Earls\CorporateBundle\Entity\Utilitytypes $utilitytypeid = null)
    {
        $this->utilitytypeid = $utilitytypeid;
    
        return $this;
    }

    /**
     * Get utilitytypeid
     *
     * @return \Earls\CorporateBundle\Entity\Utilitytypes 
     */
    public function getUtilitytypeid()
    {
        return $this->utilitytypeid;
    }

    /**
     * Set restaurantid
     *
     * @param \Earls\CorporateBundle\Entity\Restaurants $restaurantid
     * @return Utilities
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