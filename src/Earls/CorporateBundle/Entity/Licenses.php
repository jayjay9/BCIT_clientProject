<?php

namespace Earls\CorporateBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Licenses
 *
 * @ORM\Table(name="licenses")
 * @ORM\Entity
 */
class Licenses
{
    /**
     * @var boolean
     *
     * @ORM\Column(name="licenseAgreement", type="boolean", nullable=true)
     */
    private $licenseagreement;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="startDate", type="date", nullable=true)
     */
    private $startdate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="expiraryDate", type="date", nullable=true)
     */
    private $expirarydate;

    /**
     * @var string
     *
     * @ORM\Column(name="comments", type="string", length=255, nullable=true)
     */
    private $comments;

    /**
     * @var integer
     *
     * @ORM\Column(name="licenseID", type="smallint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $licenseid;



    /**
     * Set licenseagreement
     *
     * @param boolean $licenseagreement
     * @return Licenses
     */
    public function setLicenseagreement($licenseagreement)
    {
        $this->licenseagreement = $licenseagreement;
    
        return $this;
    }

    /**
     * Get licenseagreement
     *
     * @return boolean 
     */
    public function getLicenseagreement()
    {
        return $this->licenseagreement;
    }

    /**
     * Set startdate
     *
     * @param \DateTime $startdate
     * @return Licenses
     */
    public function setStartdate($startdate)
    {
        $this->startdate = $startdate;
    
        return $this;
    }

    /**
     * Get startdate
     *
     * @return \DateTime 
     */
    public function getStartdate()
    {
        return $this->startdate;
    }

    /**
     * Set expirarydate
     *
     * @param \DateTime $expirarydate
     * @return Licenses
     */
    public function setExpirarydate($expirarydate)
    {
        $this->expirarydate = $expirarydate;
    
        return $this;
    }

    /**
     * Get expirarydate
     *
     * @return \DateTime 
     */
    public function getExpirarydate()
    {
        return $this->expirarydate;
    }

    /**
     * Set comments
     *
     * @param string $comments
     * @return Licenses
     */
    public function setComments($comments)
    {
        $this->comments = $comments;
    
        return $this;
    }

    /**
     * Get comments
     *
     * @return string 
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * Get licenseid
     *
     * @return integer 
     */
    public function getLicenseid()
    {
        return $this->licenseid;
    }
}