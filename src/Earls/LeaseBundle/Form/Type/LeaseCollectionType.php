<?php
/**
 * Created by PhpStorm.
 * User: JayJay
 * Date: 11/20/13
 * Time: 4:50 PM
 */

namespace Earls\LeaseBundle\Form\Type;

use Earls\LeaseBundle\Form\Model\LeasesModel;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;


class LeaseCollectionType extends AbstractType{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('leaseinfo', 'collection', array(
                'type' => new LeasesInfoType()
            ))
            ->add('restaurantName', 'hidden')
            ->add('save', 'submit')
            ->getForm();
    }

    public function getName()
    {
        return 'leaseInfo';
    }
} 