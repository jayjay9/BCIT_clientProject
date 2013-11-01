<?php

namespace Earls\FetchDBBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Storeclasses
 *
 * @ORM\Table(name="storeClasses")
 * @ORM\Entity
 */
class Storeclasses
{
    /**
     * @var string
     *
     * @ORM\Column(name="storeClass", type="string", length=45, nullable=true)
     */
    private $storeclass;

    /**
     * @var integer
     *
     * @ORM\Column(name="storeClassID", type="smallint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $storeclassid;


}
