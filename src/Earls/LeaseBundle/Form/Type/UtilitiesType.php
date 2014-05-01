<?php

namespace Earls\LeaseBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityRepository;

class UtilitiesType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('ismetered')
            ->add('iscam')
            ->add('utilitytypeid', 'entity', array(
                'class' => 'EarlsLeaseBundle:Utilitytypes',
                'property' => 'utilitytype',
                'disabled'=>true,
            ))
//            ->add('restaurantid')
            ->add('billingby', 'entity', array(
                'class' => 'EarlsLeaseBundle:Billingowners',
                'property' => 'description',
                'query_builder' => function(EntityRepository $er) {
                return $er->createQueryBuilder('u')
                ->orderBy('u.description', 'ASC');
                },
            ))
//            ->add('utilitytypeid')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Earls\LeaseBundle\Entity\Utilities'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'earls_leasebundle_utilities';
    }
}
