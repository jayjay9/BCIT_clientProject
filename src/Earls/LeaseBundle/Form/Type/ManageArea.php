<?php

namespace Earls\LeaseBundle\Form\Type;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Earls\LeaseBundle\Form\Type\DropDownList;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ManageArea extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('entry', 'number', array('invalid_message' => 'Enter a number', 'required' => false))
            ->add('bar', 'number', array('invalid_message' => 'Enter a number', 'required' => false))
            ->add('lounge', 'number', array('invalid_message' => 'Enter a number', 'required' => false))
            ->add('dining', 'number', array('invalid_message' => 'Enter a number', 'required' => false))
            ->add('washrooms', 'number', array('invalid_message' => 'Enter a number', 'required' => false))
            ->add('boh', 'number', array('invalid_message' => 'Enter a number', 'required' => false))
            ->add('patio', 'number', array('invalid_message' => 'Enter a number', 'required' => false))
            //->add('totalarea')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Earls\LeaseBundle\Entity\Areas',
        ));
    }

    public function getName()
    {
        return 'areatypes';
    }
}