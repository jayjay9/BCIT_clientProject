<?php

namespace Earls\LeaseBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class RestaurantsType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('storefilenumber')
            ->add('tenant')
            ->add('storenickname')
            ->add('address')
            ->add('postalzip')
            ->add('openingdate')
            ->add('legaldescription')
            ->add('diningroomseating')
            ->add('loungeseating')
            ->add('patioseating')
            ->add('diningroomtable')
            ->add('loungetable')
            ->add('patiotable')
            ->add('departmentnumber')
            ->add('restaurantstate')
            ->add('closedate')
            ->add('royaltyfee')
            ->add('yearbuilt')
            ->add('comments')
            ->add('rentandmaintenanceid')
            ->add('regionid')
            ->add('riskid')
            ->add('storeclassid')
            ->add('utilityid')
            ->add('propertymanagerid')
            ->add('liquorlicenseid')
            ->add('city')
            ->add('corporateid')
            ->add('buildingtype')
            ->add('landlordid')
            ->add('licenseid')
            ->add('provincestateid')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Earls\LeaseBundle\Entity\Restaurants'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'earls_leasebundle_restaurants';
    }
}
