<?php

namespace Earls\FetchDBBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Liquorlicenses
 *
 * @ORM\Table(name="liquorLicenses")
 * @ORM\Entity
 */
class Liquorlicenses
{
    /**
     * @var string
     *
     * @ORM\Column(name="address", type="string", length=45, nullable=true)
     */
    private $address;

    /**
     * @var string
     *
     * @ORM\Column(name="postalZip", type="string", length=45, nullable=true)
     */
    private $postalzip;

    /**
     * @var string
     *
     * @ORM\Column(name="businessLicense", type="string", length=45, nullable=true)
     */
    private $businesslicense;

    /**
     * @var string
     *
     * @ORM\Column(name="liquorLicense", type="string", length=45, nullable=true)
     */
    private $liquorlicense;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="licenseDate", type="date", nullable=true)
     */
    private $licensedate;

    /**
     * @var integer
     *
     * @ORM\Column(name="liquorLicenseID", type="smallint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $liquorlicenseid;

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

    /**
     * @var \Earls\FetchDBBundle\Entity\Corporations
     *
     * @ORM\ManyToOne(targetEntity="Earls\FetchDBBundle\Entity\Corporations")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="corporateID", referencedColumnName="corporateID")
     * })
     */
    private $corporateid;


}
