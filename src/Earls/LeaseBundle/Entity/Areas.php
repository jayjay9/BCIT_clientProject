<?php

namespace Earls\LeaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Areas
 *
 * @ORM\Table(name="areas")
 * @ORM\Entity
 */
class Areas
{
    /**
     * @var float
     *
     * @ORM\Column(name="entrybar", type="float", nullable=true)
     */
    private $entrybar;

    /**
     * @var integer
     *
     * @ORM\Column(name="bar", type="integer", nullable=false)
     */
    private $bar;

    /**
     * @var float
     *
     * @ORM\Column(name="lounge", type="float", nullable=true)
     */
    private $lounge;

    /**
     * @var float
     *
     * @ORM\Column(name="dining", type="float", nullable=true)
     */
    private $dining;

    /**
     * @var float
     *
     * @ORM\Column(name="washrooms", type="float", nullable=true)
     */
    private $washrooms;

    /**
     * @var float
     *
     * @ORM\Column(name="boh", type="float", nullable=true)
     */
    private $boh;

    /**
     * @var float
     *
     * @ORM\Column(name="patio", type="float", nullable=true)
     */
    private $patio;

    /**
     * @var float
     *
     * @ORM\Column(name="totalarea", type="float", nullable=true)
     */
    private $totalarea;

    /**
     * @var integer
     *
     * @ORM\Column(name="areaID", type="smallint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $areaid;

    /**
     * @var \Earls\LeaseBundle\Entity\Restaurants
     *
     * @ORM\ManyToOne(targetEntity="Earls\LeaseBundle\Entity\Restaurants")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="restaurantID", referencedColumnName="restaurantID")
     * })
     */
    private $restaurantid;

    /**
     * @var \Earls\LeaseBundle\Entity\Areatypes
     *
     * @ORM\ManyToOne(targetEntity="Earls\LeaseBundle\Entity\Areatypes")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="areatypeID", referencedColumnName="areaTypeID")
     * })
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
     * Set bar
     *
     * @param integer $bar
     * @return Areas
     */
    public function setBar($bar)
    {
        $this->bar = $bar;
    
        return $this;
    }

    /**
     * Get bar
     *
     * @return integer 
     */
    public function getBar()
    {
        return $this->bar;
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