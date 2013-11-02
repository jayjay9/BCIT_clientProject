<?php

namespace Earls\LeaseBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class StoreInformation extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name');
        
    }

    public function getName()
    {
        return 'contactme';
    }
}

