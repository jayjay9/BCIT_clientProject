<?php

namespace Earls\FetchDBBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Constructiontypes
 *
 * @ORM\Table(name="constructionTypes")
 * @ORM\Entity
 */
class Constructiontypes
{
    /**
     * @var integer
     *
     * @ORM\Column(name="code", type="smallint", nullable=true)
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


}
