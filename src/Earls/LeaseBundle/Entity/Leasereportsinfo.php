<?php

namespace Earls\LeaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Leasereportsinfo
 *
 * @ORM\Table(name="leaseReportsInfo")
 * @ORM\Entity
 */
class Leasereportsinfo
{
    /**
     * @var boolean
     *
     * @ORM\Column(name="isCertifiedSales", type="boolean", nullable=true)
     */
    private $iscertifiedsales;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dueDate", type="date", nullable=true)
     */
    private $duedate;

    /**
     * @var boolean
     *
     * @ORM\Column(name="isAudit", type="boolean", nullable=true)
     */
    private $isaudit;

    /**
     * @var boolean
     *
     * @ORM\Column(name="isCertified", type="boolean", nullable=true)
     */
    private $iscertified;

    /**
     * @var integer
     *
     * @ORM\Column(name="leaseReportInfoID", type="smallint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $leasereportinfoid;

    /**
     * @var \Earls\LeaseBundle\Entity\Reportperiodtypes
     *
     * @ORM\ManyToOne(targetEntity="Earls\LeaseBundle\Entity\Reportperiodtypes")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="reportTypeID", referencedColumnName="reportTypeID")
     * })
     */
    private $reporttypeid;

    /**
     * @var \Earls\LeaseBundle\Entity\Leases
     *
     * @ORM\ManyToOne(targetEntity="Earls\LeaseBundle\Entity\Leases")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="leaseID", referencedColumnName="leaseID")
     * })
     */
    private $leaseid;



    /**
     * Set iscertifiedsales
     *
     * @param boolean $iscertifiedsales
     * @return Leasereportsinfo
     */
    public function setIscertifiedsales($iscertifiedsales)
    {
        $this->iscertifiedsales = $iscertifiedsales;
    
        return $this;
    }

    /**
     * Get iscertifiedsales
     *
     * @return boolean 
     */
    public function getIscertifiedsales()
    {
        return $this->iscertifiedsales;
    }

    /**
     * Set duedate
     *
     * @param \DateTime $duedate
     * @return Leasereportsinfo
     */
    public function setDuedate($duedate)
    {
        $this->duedate = $duedate;
    
        return $this;
    }

    /**
     * Get duedate
     *
     * @return \DateTime 
     */
    public function getDuedate()
    {
        return $this->duedate;
    }

    /**
     * Set isaudit
     *
     * @param boolean $isaudit
     * @return Leasereportsinfo
     */
    public function setIsaudit($isaudit)
    {
        $this->isaudit = $isaudit;
    
        return $this;
    }

    /**
     * Get isaudit
     *
     * @return boolean 
     */
    public function getIsaudit()
    {
        return $this->isaudit;
    }

    /**
     * Set iscertified
     *
     * @param boolean $iscertified
     * @return Leasereportsinfo
     */
    public function setIscertified($iscertified)
    {
        $this->iscertified = $iscertified;
    
        return $this;
    }

    /**
     * Get iscertified
     *
     * @return boolean 
     */
    public function getIscertified()
    {
        return $this->iscertified;
    }

    /**
     * Get leasereportinfoid
     *
     * @return integer 
     */
    public function getLeasereportinfoid()
    {
        return $this->leasereportinfoid;
    }

    /**
     * Set reporttypeid
     *
     * @param \Earls\LeaseBundle\Entity\Reportperiodtypes $reporttypeid
     * @return Leasereportsinfo
     */
    public function setReporttypeid(\Earls\LeaseBundle\Entity\Reportperiodtypes $reporttypeid = null)
    {
        $this->reporttypeid = $reporttypeid;
    
        return $this;
    }

    /**
     * Get reporttypeid
     *
     * @return \Earls\LeaseBundle\Entity\Reportperiodtypes 
     */
    public function getReporttypeid()
    {
        return $this->reporttypeid;
    }

    /**
     * Set leaseid
     *
     * @param \Earls\LeaseBundle\Entity\Leases $leaseid
     * @return Leasereportsinfo
     */
    public function setLeaseid(\Earls\LeaseBundle\Entity\Leases $leaseid = null)
    {
        $this->leaseid = $leaseid;
    
        return $this;
    }

    /**
     * Get leaseid
     *
     * @return \Earls\LeaseBundle\Entity\Leases 
     */
    public function getLeaseid()
    {
        return $this->leaseid;
    }
}