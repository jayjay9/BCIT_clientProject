<?php

namespace Earls\LeaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Reportperiodtypes
 *
 * @ORM\Table(name="reportperiodtypes")
 * @ORM\Entity
 */
class Reportperiodtypes
{
    /**
     * @var string
     *
     * @ORM\Column(name="periodType", type="string", length=45, nullable=true)
     */
    private $periodtype;

    /**
     * @var integer
     *
     * @ORM\Column(name="reportTypeID", type="smallint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $reporttypeid;



    /**
     * Set periodtype
     *
     * @param string $periodtype
     * @return Reportperiodtypes
     */
    public function setPeriodtype($periodtype)
    {
        $this->periodtype = $periodtype;
    
        return $this;
    }

    /**
     * Get periodtype
     *
     * @return string 
     */
    public function getPeriodtype()
    {
        return $this->periodtype;
    }

    /**
     * Get reporttypeid
     *
     * @return integer 
     */
    public function getReporttypeid()
    {
        return $this->reporttypeid;
    }
}