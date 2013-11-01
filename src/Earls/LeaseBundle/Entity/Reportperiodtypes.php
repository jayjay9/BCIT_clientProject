<?php

namespace Earls\LeaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Reportperiodtypes
 */
class Reportperiodtypes
{
    /**
     * @var string
     */
    private $periodtype;

    /**
     * @var integer
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
