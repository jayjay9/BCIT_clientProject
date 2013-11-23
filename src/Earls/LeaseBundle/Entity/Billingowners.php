<?php

namespace Earls\LeaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Billingowners
 *
 * @ORM\Table(name="billingowners")
 * @ORM\Entity
 */
class Billingowners
{
    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=45, nullable=true)
     */
    private $description;

    /**
     * @var integer
     *
     * @ORM\Column(name="billingOwnerID", type="smallint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
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