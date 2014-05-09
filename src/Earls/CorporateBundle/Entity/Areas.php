<?php

namespace Earls\CorporateBundle\Entity;

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
     * @var integer
     *
     * @ORM\Column(name="entry", type="integer", nullable=true)
     */
    private $entry;

    /**
     * @var integer
     *
     * @ORM\Column(name="bar", type="integer", nullable=true)
     */
    private $bar;

    /**
     * @var integer
     *
     * @ORM\Column(name="lounge", type="integer", nullable=true)
     */
    private $lounge;

    /**
     * @var integer
     *
     * @ORM\Column(name="dining", type="integer", nullable=true)
     */
    private $dining;

    /**
     * @var integer
     *
     * @ORM\Column(name="washrooms", type="integer", nullable=true)
     */
    private $washrooms;

    /**
     * @var integer
     *
     * @ORM\Column(name="boh", type="integer", nullable=true)
     */
    private $boh;

    /**
     * @var integer
     *
     * @ORM\Column(name="patio", type="integer", nullable=true)
     */
    private $patio;

    /**
     * @var integer
     *
     * @ORM\Column(name="totalarea", type="integer", nullable=true)
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
     * @var \Earls\CorporateBundle\Entity\Restaurants
     *
     * @ORM\ManyToOne(targetEntity="Earls\CorporateBundle\Entity\Restaurants")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="restaurantID", referencedColumnName="restaurantID")
     * })
     */
    private $restaurantid;

    /**
     * @var \Earls\CorporateBundle\Entity\Areatypes
     *
     * @ORM\ManyToOne(targetEntity="Earls\CorporateBundle\Entity\Areatypes")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="areatypeID", referencedColumnName="areaTypeID")
     * })
     */
    private $areatypeid;



    /**
     * Set entry
     *
     * @param integer $entry
     * @return Areas
     */
    public function setEntry($entry)
    {
        $this->entry = $entry;
    
        return $this;
    }

    /**
     * Get entry
     *
     * @return integer 
     */
    public function getEntry()
    {
        return $this->entry;
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
     * @param integer $lounge
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
     * @return integer 
     */
    public function getLounge()
    {
        return $this->lounge;
    }

    /**
     * Set dining
     *
     * @param integer $dining
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
     * @return integer 
     */
    public function getDining()
    {
        return $this->dining;
    }

    /**
     * Set washrooms
     *
     * @param integer $washrooms
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
     * @return integer 
     */
    public function getWashrooms()
    {
        return $this->washrooms;
    }

    /**
     * Set boh
     *
     * @param integer $boh
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
     * @return integer 
     */
    public function getBoh()
    {
        return $this->boh;
    }

    /**
     * Set patio
     *
     * @param integer $patio
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
     * @return integer 
     */
    public function getPatio()
    {
        return $this->patio;
    }

    /**
     * Set totalarea
     *
     * @param integer $totalarea
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
     * @return integer 
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
     * @param \Earls\CorporateBundle\Entity\Restaurants $restaurantid
     * @return Areas
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

    /**
     * Set areatypeid
     *
     * @param \Earls\CorporateBundle\Entity\Areatypes $areatypeid
     * @return Areas
     */
    public function setAreatypeid(\Earls\CorporateBundle\Entity\Areatypes $areatypeid = null)
    {
        $this->areatypeid = $areatypeid;
    
        return $this;
    }

    /**
     * Get areatypeid
     *
     * @return \Earls\CorporateBundle\Entity\Areatypes 
     */
    public function getAreatypeid()
    {
        return $this->areatypeid;
    }
}