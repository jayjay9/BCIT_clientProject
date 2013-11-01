<?php

namespace Earls\LeaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Billingowners
 */
class Billingowners
{
    /**
     * @var string
     */
    private $description;

    /**
     * @var integer
     */
    private $billingownerid;


    /**
     * Set description
     *
     * @param string $description
     * @return Billingowners
     */
    public function setDescription($description)
    {
        $this->description = $description;
    
        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Get billingownerid
     *
     * @return integer 
     */
    public function getBillingownerid()
    {
        return $this->billingownerid;
    }
}
