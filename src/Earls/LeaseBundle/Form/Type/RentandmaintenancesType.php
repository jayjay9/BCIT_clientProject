<?php

namespace Earls\LeaseBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class RentandmaintenancesType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            //->add('rentandmaintenanceid')
            //->add('restaurantid')
            ->add('roofreplace', 'entity', array(
                'class' => 'EarlsLeaseBundle:Owners',
                'property' => 'ownertype'
            ))
            ->add('roofrepair', 'entity', array(
                'class' => 'EarlsLeaseBundle:Owners',
                'property' => 'ownertype'
            ))
            ->add('hvacreplace', 'entity', array(
                'class' => 'EarlsLeaseBundle:Owners',
                'property' => 'ownertype'
            ))
            ->add('hvacrepair', 'entity', array(
                'class' => 'EarlsLeaseBundle:Owners',
                'property' => 'ownertype'
            ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Earls\LeaseBundle\Entity\Rentandmaintenances'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'earls_leasebundle_rentandmaintenances';
    }
}
