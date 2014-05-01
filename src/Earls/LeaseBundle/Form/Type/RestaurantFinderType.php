<?php
namespace Earls\LeaseBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Doctrine\ORM\EntityRepository;

class RestaurantFinderType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('restaurant', 'entity', array(
            'class' => 'EarlsLeaseBundle:Restaurants',
            'property' => 'storenickname',
            'query_builder' => function(EntityRepository $er) {
            return $er->createQueryBuilder('u')
            ->orderBy('u.storenickname', 'ASC');
    },
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