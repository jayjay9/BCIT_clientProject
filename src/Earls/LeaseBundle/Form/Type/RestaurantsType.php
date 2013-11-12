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
            ->add('address', 'textarea')
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
            ->add('regionid', 'entity', array(
                'class' => 'EarlsLeaseBundle:Regions',
                'property' => 'region'
            ))
            /*->add('riskid', 'entity', array(
                'class' => 'EarlsLeaseBundle:Riskinfo',
                'property' => 'riskid'
            )))*/
            ->add('storeclassid', 'entity', array(
                'class' => 'EarlsLeaseBundle:Storeclasses',
                'property' => 'storeclass'
            ))
//            ->add('utilityid')
            ->add('propertymanagerid', 'entity', array(
                'class' => 'EarlsLeaseBundle:Propertymanagers',
                'property' => 'propertymanagername'
            ))
//            ->add('liquorlicenseid')
            ->add('city', 'entity', array(
                'class' => 'EarlsLeaseBundle:Northamericancities',
                'property' => 'city'
            ))
            ->add('corporateid', 'entity', array(
                'class' => 'EarlsLeaseBundle:Corporations',
                'property' => 'corporatename'
            ))
            ->add('buildingtype', 'entity', array(
                'class' => 'EarlsLeaseBundle:Buildingtypes',
                'property' => 'buildingtype'
            ))
            ->add('landlordid', 'entity', array(
                'class' => 'EarlsLeaseBundle:Landlords',
                'property' => 'landlordname'
            ))
/*            ->add('licenseid', 'entity', array(
                'class' => 'EarlsLeaseBundle:Licenses',
                'property' => 'propertymanagername'
            ))*/
            ->add('provincestateid', 'entity', array(
                'class' => 'EarlsLeaseBundle:Provincestate',
                'property' => 'description'
            ))
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
