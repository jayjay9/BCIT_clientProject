<?php

namespace Earls\FetchDBBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Recordsoffices
 *
 * @ORM\Table(name="recordsOffices")
 * @ORM\Entity
 */
class Recordsoffices
{
    /**
     * @var string
     *
     * @ORM\Column(name="address", type="string", length=255, nullable=true)
     */
    private $address;

    /**
     * @var string
     *
     * @ORM\Column(name="postalZip", type="string", length=45, nullable=true)
     */
    private $postalzip;

    /**
     * @var integer
     *
     * @ORM\Column(name="recordOfficeID", type="smallint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $recordofficeid;

    /**
     * @var \Earls\FetchDBBundle\Entity\Offices
     *
     * @ORM\ManyToOne(targetEntity="Earls\FetchDBBundle\Entity\Offices")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="officeID", referencedColumnName="officeID")
     * })
     */
    private $officeid;

    /**
     * @var \Earls\FetchDBBundle\Entity\Provincestate
     *
     * @ORM\ManyToOne(targetEntity="Earls\FetchDBBundle\Entity\Provincestate")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="provinceStateID", referencedColumnName="provinceStateID")
     * })
     */
    private $provincestateid;

    /**
     * @var \Earls\FetchDBBundle\Entity\Northamericancities
     *
     * @ORM\ManyToOne(targetEntity="Earls\FetchDBBundle\Entity\Northamericancities")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="city", referencedColumnName="northAmericanCityID")
     * })
     */
    private $city;


}