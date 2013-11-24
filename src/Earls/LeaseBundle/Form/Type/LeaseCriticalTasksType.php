<?php
/**
 * Created by PhpStorm.
 * User: JayJay
 * Date: 11/14/13
 * Time: 5:34 PM
 */

namespace Earls\LeaseBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Earls\LeaseBundle\Entity\Leasecritcaltasks;


class LeaseCriticalTasksType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('ctdate')
            ->add('ctclause')
            ->add('ctdescription');
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Earls\LeaseBundle\Entity\Leasecriticaltasks',
        ));
    }

    public function getName()
    {
        return 'leaseCriticalTypes';
    }

} 