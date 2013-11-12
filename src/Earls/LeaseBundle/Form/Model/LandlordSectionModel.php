<?php
/**
 * Created by PhpStorm.
 * User: alfredo-ub
 * Date: 08/11/13
 * Time: 5:44 PM
 */

namespace Earls\LeaseBundle\Form\Model;

use Symfony\Component\Validator\Constraints as Assert;

use Earls\LeaseBundle\Entity\Landlords;


class LandlordSectionModel {


    protected $landlord;


    public function setLandlord(Landlords $landlord)
    {
        $this->landlord = $landlord;
    }

    public function getLandlord()
    {
        return $this->landlord;
    }

}

?>