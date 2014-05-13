<?php

namespace Earls\LeaseBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class LicensesType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('licenseagreement')
            ->add('startdate', 'date',array('invalid_message' => 'Enter a valid date','required'=> false))
            ->add('expirarydate', 'date',array('invalid_message' => 'Enter a valid date','required'=> false))
            ->add('comments', 'textarea',array('required'=> false))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Earls\LeaseBundle\Entity\Licenses'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'earls_leasebundle_licenses';
    }
}
