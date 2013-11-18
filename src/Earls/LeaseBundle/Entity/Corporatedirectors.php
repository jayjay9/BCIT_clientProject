<?php

namespace Earls\LeaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Corporatedirectors
 *
 * @ORM\Table(name="corporateDirectors")
 * @ORM\Entity
 */
class Corporatedirectors
{
    /**
     * @var string
     *
     * @ORM\Column(name="position", type="string", length=45, nullable=true)
     */
    private $position;

    /**
     * @var integer
     *
     * @ORM\Column(name="corporatedirectorID", type="smallint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $corporatedirectorid;

    /**
     * @var \Earls\LeaseBundle\Entity\Directors
     *
     * @ORM\ManyToOne(targetEntity="Earls\LeaseBundle\Entity\Directors")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="directorID", referencedColumnName="directorID")
     * })
     */
    private $directorid;

    /**
     * @var \Earls\LeaseBundle\Entity\Corporations
     *
     * @ORM\ManyToOne(targetEntity="Earls\LeaseBundle\Entity\Corporations")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="corporateID", referencedColumnName="corporateID")
     * })
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