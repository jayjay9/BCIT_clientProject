<?php
namespace Earls\LeaseBundle\Form\Model;

use Earls\LeaseBundle\Entity\Restaurants;
use Symfony\Component\Validator\Constraints as Assert;
use Earls\LeaseBundle\Entity\Areas;

class DropDownModel {

    protected $area1;

    protected $area2;

    protected $area3;

    protected $storefilenumber;

    public function setArea1(Areas $area1){
        $this->area1 = $area1;
    }

    public function getArea1(){
        return $this->area1;
    }

    public function setArea2(Areas $area2){
        $this->area2 = $area2;
    }

    public function getArea2(){
        return $this->area2;
    }

    public function setArea3(Areas $area3){
        $this->area3 = $area3;
    }

    public function getArea3(){
        return $this->area3;
    }

    public function setStorefileNumber(Restaurants $storefilenumber){
        $this->storefilenumber = $storefilenumber;
    }

    public function getStorefileNumber(){
        return $this->storefilenumber;
    }

}