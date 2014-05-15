<?php

namespace Earls\CorporateBundle\Form\Model;

use Earls\CorporateBundle\Entity\Corporations;
use Earls\CorporateBundle\Entity\Offices;
use Earls\CorporateBundle\Entity\Jurisdictions;
use Earls\CorporateBundle\Entity\Corporatedirectors;
use Earls\CorporateBundle\Entity\Memberships;

use Symfony\Component\Validator\Constraints as Assert;


class CorpInfoModel {

    protected $corporationinfo;
    protected $jurisdictioninfo;
    protected $corpdirectorinfo;
    protected $membershipinfo;

    public function setCorporationInfo(Corporations $corporationinfo)
    {
        $this->corporationinfo = $corporationinfo;
    }

    public function getCorporationInfo()
    {
        return $this->corporationinfo;
    }

    public function setJurisdictionInfo($jurisdictioninfo)
    {
        $this->jurisdictioninfo = $jurisdictioninfo;
    }

    public function getJurisdictionInfo()
    {
        return $this->jurisdictioninfo;
    }

    public function setCorpdirectorInfo($corpdirectorinfo)
    {
        $this->corpdirectorinfo = $corpdirectorinfo;
    }

    public function getCorpdirectorInfo()
    {
        return $this->corpdirectorinfo;
    }

    public function setMembershipInfo($membershipinfo)
    {
        $this->membershipinfo = $membershipinfo;
    }

    public function getMembershipInfo()
    {
        return $this->membershipinfo;
    }
} 