<?php

namespace Earls\LeaseBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;


class LeasesType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('leasetype', 'text', array('required'=> true))
            ->add('leasedate','date',array('invalid_message' => 'Enter a valid date','required'=> true))
            ->add('term','text', array('required'=> true))
            ->add('commencementdate','date',array('invalid_message' => 'Enter a valid date','required'=> true))
            ->add('expirydate','date',array('invalid_message' => 'Enter a valid date','required'=> true))
            ->add('optiontime','text', array('required'=> true))
            ->add('areamain', 'number', array('precision' => 2, 'invalid_message' => 'Enter a number', 'required' => false))
            ->add('areamezzanine', 'number', array('precision' => 2,'invalid_message' => 'Enter a number', 'required' => false))
            ->add('areapatio', 'number', array('precision' => 2,'invalid_message' => 'Enter a number', 'required' => false))
            ->add('areaother','number', array('precision' => 2,'invalid_message' => 'Enter a number', 'required' => false))
            ->add('surveyeddescription', 'text', array('required'=> false))
            ->add('renewalterms', 'text', array('required'=> false))
            ->add('renewaloptiondate','date',array('invalid_message' => 'Enter a valid date','required'=> false))
            ->add('exclusiveuse', 'text', array('required'=> false))
            ->add('tiallowance', 'text', array('required'=> false))
            ->add('radiusclause', 'text', array('required'=> false))
            ->add('indemnifier', 'text', array('required'=> false))
            ->add('indemnityperiod', 'text', array('required'=> false))
            ->add('indemnityexpiry', 'text', array('required'=> false))
            ->add('otherdescription', 'textarea', array('required'=> false))
            ->add('renewalcomments', 'textarea', array('required'=> false))
            ->add('areaupperfloor','number', array('precision' => 2,'invalid_message' => 'Enter a number', 'required' => false))
            ->add('showinlease');
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Earls\LeaseBundle\Entity\Leases',
        ));
    }

    public function getName()
    {
        return 'leaseCriticalTypes';
    }

}