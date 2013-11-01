<?php

namespace Earls\LeaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Constructiontypes
 */
class Constructiontypes
{
    /**
     * @var integer
     */
    private $code;

    /**
     * @var string
     */
    private $constructiontype;

    /**
     * @var integer
     */
    private $constructionid;


    /**
     * Set code
     *
     * @param integer $code
     * @return Constructiontypes
     */
    public function setCode($code)
    {
        $this->code = $code;
    
        return $this;
    }

    /**
     * Get code
     *
     * @return integer 
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set constructiontype
     *
     * @param string $constructiontype
     * @return Constructiontypes
     */
    public function setConstructiontype($constructiontype)
    {
        $this->constructiontype = $constructiontype;
    
        return $this;
    }

    /**
     * Get constructiontype
     *
     * @return string 
     */
    public function getConstructiontype()
    {
        return $this->constructiontype;
    }

    /**
     * Get constructionid
     *
     * @return integer 
     */
    public function getConstructionid()
    {
        return $this->constructionid;
    }
}
