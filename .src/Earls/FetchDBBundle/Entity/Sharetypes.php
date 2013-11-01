<?php

namespace Earls\FetchDBBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Sharetypes
 *
 * @ORM\Table(name="shareTypes")
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


}
