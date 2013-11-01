<?php

namespace Earls\LeaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Licenses
 */
class Licenses
{
    /**
     * @var boolean
     */
    private $licenseagreement;

    /**
     * @var \DateTime
     */
    private $startdate;

    /**
     * @var \DateTime
     */
    private $expirarydate;

    /**
     * @var string
     */
    private $comments;

    /**
     * @var integer
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
