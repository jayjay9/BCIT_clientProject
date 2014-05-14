<?php

namespace Earls\LeaseBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityRepository;

class RestaurantsType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

            ->add('storefilenumber', 'number', array('invalid_message' => 'Enter a number', 'required' => true))
            ->add('tenant', 'text', array('required'=> true))
            ->add('storenickname', 'text', array('required'=> true))
            ->add('address', 'textarea', array('required'=> true))
            ->add('postalzip', 'text', array('required'=> true))
            ->add('openingdate', 'text' , array('required'=> false))
            ->add('legaldescription', 'text', array('required'=> false))
            ->add('diningroomseating', 'number', array('invalid_message' => 'Enter a number','required'=> false))
            ->add('loungeseating', 'number', array('invalid_message' => 'Enter a number','required'=> false))
            ->add('patioseating', 'number', array('invalid_message' => 'Enter a number','required'=> false))
            ->add('diningroomtable', 'number', array('invalid_message' => 'Enter a number','required'=> false))
            ->add('loungetable', 'number', array('invalid_message' => 'Enter a number','required'=> false))
            ->add('patiotable', 'number', array('invalid_message' => 'Enter a number','required'=> false))
            ->add('departmentnumber', 'number', array('invalid_message' => 'Enter a number','required'=> false))
            ->add('restaurantstate')
            ->add('closedate','date',array('invalid_message' => 'Enter a valid date','required'=> false))
            ->add('royaltyfee', 'text',array('required'=> false))
            ->add('advertisingfee', 'text',array('required'=> false))
            ->add('regionalmngtfee', 'text',array('required'=> false))
            ->add('yearbuilt', 'text',array('required'=> false))
            ->add('comments', 'textarea',array('required'=> false))
            ->add('storeclassid', 'entity', array(
                'class' => 'EarlsLeaseBundle:Storeclasses',
                'property' => 'storeclass',
                'invalid_message' => 'Enter a valid Store Class',
                'query_builder' => function(EntityRepository $er) {
                return $er->createQueryBuilder('u')
                ->orderBy('u.storeclass', 'ASC');
                },
            ))
            ->add('propertymanagerid', 'entity', array(
                'class' => 'EarlsLeaseBundle:Landlordspropertymanagers',
                'property' => 'name',
                'invalid_message' => 'Enter a valid Property Manager',
                'query_builder' => function(EntityRepository $er) {
                return $er->createQueryBuilder('u')
                ->orderBy('u.name', 'ASC');
                },
            ))
            ->add('city', 'entity', array(
                'class' => 'EarlsLeaseBundle:Northamericancities',
                'property' => 'city',
                'invalid_message' => 'Enter a valid City',
                'query_builder' => function(EntityRepository $er) {
                return $er->createQueryBuilder('u')
                ->orderBy('u.city', 'ASC');
                },
            ))
            ->add('corporateid', 'entity', array(
                'class' => 'EarlsLeaseBundle:Corporations',
                'property' => 'corporatename',
                'invalid_message' => 'Enter a valid Corporate File',
                'query_builder' => function(EntityRepository $er) {
                return $er->createQueryBuilder('u')
                ->orderBy('u.corporatename', 'ASC');
                },
            ))
            ->add('buildingtype', 'entity', array(
                'class' => 'EarlsLeaseBundle:Buildingtypes',
                'property' => 'buildingtype',
                'invalid_message' => 'Enter a valid Building Type',
                'query_builder' => function(EntityRepository $er) {
                return $er->createQueryBuilder('u')
                ->orderBy('u.buildingtype', 'ASC');
                },
            ))
            ->add('landlordid', 'entity', array(
                'class' => 'EarlsLeaseBundle:Landlordspropertymanagers',
                'property' => 'name',
                'invalid_message' => 'Enter a valid Landlord',
                'query_builder' => function(EntityRepository $er) {
                return $er->createQueryBuilder('u')
                ->orderBy('u.name', 'ASC');
                },
            ))
            ->add('provincestateid', 'entity', array(
                'class' => 'EarlsLeaseBundle:Provincestate',
                'property' => 'description',
                'invalid_message' => 'Enter a valid Province State',
                'query_builder' => function(EntityRepository $er) {
                return $er->createQueryBuilder('u')
                ->orderBy('u.description', 'ASC');
                },
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
