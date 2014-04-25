<?php

namespace Earls\CorporateBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Provincestate
 *
 * @ORM\Table(name="provincestate")
 * @ORM\Entity
 */
class Provincestate
{
    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=45, nullable=true)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="provinceStateID", type="string", length=4)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $provincestateid;



    /**
     * Set description
     *
     * @param string $description
     * @return Provincestate
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
     * Get provincestateid
     *
     * @return string 
     */
    public function getProvincestateid()
    {
        return $this->provincestateid;
    }
}