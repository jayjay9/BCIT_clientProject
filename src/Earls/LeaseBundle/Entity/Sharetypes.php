<?php

namespace Earls\LeaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Sharetypes
 *
 * @ORM\Table(name="sharetypes")
 * @ORM\Entity
 */
class Sharetypes
{
    /**
     * @var string
     *
     * @ORM\Column(name="shareType", type="string", length=45, nullable=true)
     */
    private $sharetype;

    /**
     * @var integer
     *
     * @ORM\Column(name="shareTypeID", type="smallint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
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