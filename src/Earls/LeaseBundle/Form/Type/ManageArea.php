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
            ->add('entry')
            ->add('bar', 'text')
            ->add('lounge')
            ->add('dining')
            ->add('washrooms')
            ->add('boh')
            ->add('patio')
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