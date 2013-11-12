<?php
namespace Earls\LeaseBundle\Form\Model;

use Symfony\Component\Validator\Constraints as Assert;

use Earls\LeaseBundle\Entity\Restaurants;



class RestaurantFinder
{

	protected $restaurant;


	public function setRestaurant(Restaurants $restaurant)
	{
		$this->restaurant = $restaurant;
	}

	public function getRestaurant()
	{
		return $this->restaurant;
	}

}

?>