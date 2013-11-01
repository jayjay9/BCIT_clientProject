<?php

namespace Earls\FetchDBBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Areatypes
 *
 * @ORM\Table(name="areaTypes")
 * @ORM\Entity
 */
class Areatypes
{
    /**
     * @var string
     *
     * @ORM\Column(name="areaType", type="string", length=45, nullable=true)
     */
    private $areatype;

    /**
     * @var integer
     *
     * @ORM\Column(name="areaTypeID", type="smallint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $areatypeid;


}
