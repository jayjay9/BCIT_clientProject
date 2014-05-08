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

            ->add('storefilenumber', 'text')
            ->add('tenant', 'text')
            ->add('storenickname', 'text')
            ->add('address', 'textarea')
            ->add('postalzip', 'text')
            ->add('openingdate', 'text')
            ->add('legaldescription', 'text')
            ->add('diningroomseating', 'text')
            ->add('loungeseating', 'text')
            ->add('patioseating', 'text')
            ->add('diningroomtable', 'text')
            ->add('loungetable', 'text')
            ->add('patiotable', 'text')
            ->add('departmentnumber', 'text')
            ->add('restaurantstate')
            ->add('closedate', 'date')
            ->add('royaltyfee', 'text')
            ->add('advertisingfee', 'text')
            ->add('regionalmngtfee', 'text')
            ->add('yearbuilt', 'text')
            ->add('comments', 'textarea')
//            ->add('liquorlicenseid', new LiquorlicensesType())
//            ->add('rentandmaintenanceid', new RentandmaintenancesType())
            /*->add('regionid', 'entity', array(
                'class' => 'EarlsLeaseBundle:Regions',
                'property' => 'region'
            ))*/
//            ->add('riskid', new RiskinfoType())
            ->add('storeclassid', 'entity', array(
                'class' => 'EarlsLeaseBundle:Storeclasses',
                'property' => 'storeclass',
                'query_builder' => function(EntityRepository $er) {
                return $er->createQueryBuilder('u')
                ->orderBy('u.storeclass', 'ASC');
                },
            ))
//            ->add('utilityid')


            ->add('propertymanagerid', 'entity', array(
                'class' => 'EarlsLeaseBundle:Propertymanagers',
                'property' => 'propertymanagername',
                'query_builder' => function(EntityRepository $er) {
                return $er->createQueryBuilder('u')
                ->orderBy('u.propertymanagername', 'ASC');
                },
            ))



            ->add('city', 'entity', array(
                'class' => 'EarlsLeaseBundle:Northamericancities',
                'property' => 'city',
                'query_builder' => function(EntityRepository $er) {
                return $er->createQueryBuilder('u')
                ->orderBy('u.city', 'ASC');
                },
            ))
            ->add('corporateid', 'entity', array(
                'class' => 'EarlsLeaseBundle:Corporations',
                'property' => 'corporatename',
                'query_builder' => function(EntityRepository $er) {
                return $er->createQueryBuilder('u')
                ->orderBy('u.corporatename', 'ASC');
                },
            ))
            ->add('buildingtype', 'entity', array(
                'class' => 'EarlsLeaseBundle:Buildingtypes',
                'property' => 'buildingtype',
                'query_builder' => function(EntityRepository $er) {
                return $er->createQueryBuilder('u')
                ->orderBy('u.buildingtype', 'ASC');
                },
            ))
            ->add('landlordid', 'entity', array(
                'class' => 'EarlsLeaseBundle:Landlords',
                'property' => 'landlordname',
                'query_builder' => function(EntityRepository $er) {
                return $er->createQueryBuilder('u')
                ->orderBy('u.landlordname', 'ASC');
                },
            ))
/*            ->add('licenseid', 'entity', array(
                'class' => 'EarlsLeaseBundle:Licenses',
                'property' => 'propertymanagername'
            ))*/
            ->add('provincestateid', 'entity', array(
                'class' => 'EarlsLeaseBundle:Provincestate',
                'property' => 'description',
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
