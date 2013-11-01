<?php

namespace Earls\LeaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Areas
 */
class Areas
{
    /**
     * @var float
     */
    private $entrybar;

    /**
     * @var float
     */
    private $lounge;

    /**
     * @var float
     */
    private $dining;

    /**
     * @var float
     */
    private $washrooms;

    /**
     * @var float
     */
    private $boh;

    /**
     * @var float
     */
    private $patio;

    /**
     * @var float
     */
    private $totalarea;

    /**
     * @var integer
     */
    private $areaid;

    /**
     * @var \Earls\LeaseBundle\Entity\Restaurants
     */
    private $restaurantid;

    /**
     * @var \Earls\LeaseBundle\Entity\Areatypes
     */
    private $areatypeid;


    /**
     * Set entrybar
     *
     * @param float $entrybar
     * @return Areas
     */
    public function setEntrybar($entrybar)
    {
        $this->entrybar = $entrybar;
    
        return $this;
    }

    /**
     * Get entrybar
     *
     * @return float 
     */
    public function getEntrybar()
    {
        return $this->entrybar;
    }

    /**
     * Set lounge
     *
     * @param float $lounge
     * @return Areas
     */
    public function setLounge($lounge)
    {
        $this->lounge = $lounge;
    
        return $this;
    }

    /**
     * Get lounge
     *
     * @return float 
     */
    public function getLounge()
    {
        return $this->lounge;
    }

    /**
     * Set dining
     *
     * @param float $dining
     * @return Areas
     */
    public function setDining($dining)
    {
        $this->dining = $dining;
    
        return $this;
    }

    /**
     * Get dining
     *
     * @return float 
     */
    public function getDining()
    {
        return $this->dining;
    }

    /**
     * Set washrooms
     *
     * @param float $washrooms
     * @return Areas
     */
    public function setWashrooms($washrooms)
    {
        $this->washrooms = $washrooms;
    
        return $this;
    }

    /**
     * Get washrooms
     *
     * @return float 
     */
    public function getWashrooms()
    {
        return $this->washrooms;
    }

    /**
     * Set boh
     *
     * @param float $boh
     * @return Areas
     */
    public function setBoh($boh)
    {
        $this->boh = $boh;
    
        return $this;
    }

    /**
     * Get boh
     *
     * @return float 
     */
    public function getBoh()
    {
        return $this->boh;
    }

    /**
     * Set patio
     *
     * @param float $patio
     * @return Areas
     */
    public function setPatio($patio)
    {
        $this->patio = $patio;
    
        return $this;
    }

    /**
     * Get patio
     *
     * @return float 
     */
    public function getPatio()
    {
        return $this->patio;
    }

    /**
     * Set totalarea
     *
     * @param float $totalarea
     * @return Areas
     */
    public function setTotalarea($totalarea)
    {
        $this->totalarea = $totalarea;
    
        return $this;
    }

    /**
     * Get totalarea
     *
     * @return float 
     */
    public function getTotalarea()
    {
        return $this->totalarea;
    }

    /**
     * Get areaid
     *
     * @return integer 
     */
    public function getAreaid()
    {
        return $this->areaid;
    }

    /**
     * Set restaurantid
     *
     * @param \Earls\LeaseBundle\Entity\Restaurants $restaurantid
     * @return Areas
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

    /**
     * Set areatypeid
     *
     * @param \Earls\LeaseBundle\Entity\Areatypes $areatypeid
     * @return Areas
     */
    public function setAreatypeid(\Earls\LeaseBundle\Entity\Areatypes $areatypeid = null)
    {
        $this->areatypeid = $areatypeid;
    
        return $this;
    }

    /**
     * Get areatypeid
     *
     * @return \Earls\LeaseBundle\Entity\Areatypes 
     */
    public function getAreatypeid()
    {
        return $this->areatypeid;
    }
}
