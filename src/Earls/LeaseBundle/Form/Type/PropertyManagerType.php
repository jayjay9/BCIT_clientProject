<?php
/**
 * Created by PhpStorm.
 * User: JayJay
 * Date: 11/16/13
 * Time: 8:04 PM
 */

namespace Earls\LeaseBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;


class PropertyManagerType extends AbstractType{

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('propertymanagername')
            ->add('address')
            ->add('postalzip')
            ->add('attention')
            ->add('phone')
            ->add('fax')
            ->add('provincestateid', 'entity', array('class' => 'EarlsLeaseBundle:Provincestate', 'property' => 'provincestateid'))
            ->add('city', 'entity', array('class' => 'EarlsLeaseBundle:Northamericancities', 'property' => 'city'))
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Earls\LeaseBundle\Entity\Propertymanagers'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'earls_leasebundle_propertymanagers';
    }
} 