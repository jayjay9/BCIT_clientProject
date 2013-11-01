<?php

namespace Earls\LeaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Corporatedirectors
 */
class Corporatedirectors
{
    /**
     * @var string
     */
    private $position;

    /**
     * @var integer
     */
    private $corporatedirectorid;

    /**
     * @var \Earls\LeaseBundle\Entity\Directors
     */
    private $directorid;

    /**
     * @var \Earls\LeaseBundle\Entity\Corporations
     */
    private $corporateid;


    /**
     * Set position
     *
     * @param string $position
     * @return Corporatedirectors
     */
    public function setPosition($position)
    {
        $this->position = $position;
    
        return $this;
    }

    /**
     * Get position
     *
     * @return string 
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * Get corporatedirectorid
     *
     * @return integer 
     */
    public function getCorporatedirectorid()
    {
        return $this->corporatedirectorid;
    }

    /**
     * Set directorid
     *
     * @param \Earls\LeaseBundle\Entity\Directors $directorid
     * @return Corporatedirectors
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

    /**
     * Set corporateid
     *
     * @param \Earls\LeaseBundle\Entity\Corporations $corporateid
     * @return Corporatedirectors
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
}
