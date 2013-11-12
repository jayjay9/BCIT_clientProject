<?php
namespace Earls\LeaseBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class RestaurantFinderType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('restaurant', 'entity', array(
            'class' => 'EarlsLeaseBundle:Restaurants',
            'property' => 'storenickname'
        ))
                ->add('Go', 'submit')
                ->getForm();
        
    }

    public function getName()
    {
        return 'restaurantFinder';
    }
}

?>