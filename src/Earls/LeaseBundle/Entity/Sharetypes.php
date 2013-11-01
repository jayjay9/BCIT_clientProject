<?php

namespace Earls\LeaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Sharetypes
 */
class Sharetypes
{
    /**
     * @var string
     */
    private $sharetype;

    /**
     * @var integer
     */
    private $sharetypeid;


    /**
     * Set sharetype
     *
     * @param string $sharetype
     * @return Sharetypes
     */
    public function setSharetype($sharetype)
    {
        $this->sharetype = $sharetype;
    
        return $this;
    }

    /**
     * Get sharetype
     *
     * @return string 
     */
    public function getSharetype()
    {
        return $this->sharetype;
    }

    /**
     * Get sharetypeid
     *
     * @return integer 
     */
    public function getSharetypeid()
    {
        return $this->sharetypeid;
    }
}
