<?php
/**
 * Created by PhpStorm.
 * User: JayJay
 * Date: 11/14/13
 * Time: 6:35 PM
 */

namespace Earls\LeaseBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Earls\LeaseBundle\Entity\Renewals;

class RenewalsType extends AbstractType{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('term')
            ->add('exercised')
            ->add('showinleasereport');
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Earls\LeaseBundle\Entity\Renewals',
        ));
    }

    public function getName()
    {
        return 'renewals';
    }
} 