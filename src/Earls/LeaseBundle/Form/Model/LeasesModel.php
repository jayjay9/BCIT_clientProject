<?php


namespace Earls\LeaseBundle\Form\Model;

use Earls\LeaseBundle\Entity\Leases;
use Earls\LeaseBundle\Entity\Leasereportsinfo;

class LeasesModel {

    protected $leaseinfo;

    protected $leasereportinfo;

    protected $leasecriticaltasks;

    protected $renewals;

    protected $leaseid;


    public function setLeaseinfo(Leases $leaseinfo)
    {
        $this->leaseinfo = $leaseinfo;
    }

    public function getLeaseinfo()
    {
        return $this->leaseinfo;
    }

    public function setLeasereportinfo(Leasereportsinfo $leasereportinfo)
    {
        $this->leasereportinfo = $leasereportinfo;
    }

    public function getLeasereportinfo()
    {
        return $this->leasereportinfo;
    }

    public function setLeasecriticaltasks($leasecriticaltasks)
{
    $this->leasecriticaltasks = $leasecriticaltasks;
}

    public function getLeasecriticaltasks()
    {
        return $this->leasecriticaltasks;
    }

    public function setRenewals($renewals)
    {
        $this->renewals = $renewals;
    }

    public function getRenewals()
    {
        return $this->renewals;
    }

    public function setLeaseid($leaseid)
    {
        $this->leaseid = $leaseid;
    }

    public function getLeaseid()
    {
        return $this->leaseid;
    }


} 