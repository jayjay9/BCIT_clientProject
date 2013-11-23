<?php

namespace Earls\LeaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Constructiontypes
 *
 * @ORM\Table(name="constructiontypes")
 * @ORM\Entity
 */
class Constructiontypes
{
    /**
     * @var string
     *
     * @ORM\Column(name="code", type="string", length=10, nullable=true)
     */
    private $code;

    /**
     * @var string
     *
     * @ORM\Column(name="constructionType", type="string", length=45, nullable=true)
     */
    private $constructiontype;

    /**
     * @var integer
     *
     * @ORM\Column(name="constructionID", type="smallint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $constructionid;



    /**
     * Set code
     *
     * @param string $code
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
     * @return string 
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