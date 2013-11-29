<?php
/**
 * Created by PhpStorm.
 * User: JayJay
 * Date: 11/23/13
 * Time: 3:42 PM
 */

namespace Earls\LeaseBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;


class StoreCollectionType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('storeInfoForm', new StoreInformationType())
            ->add('leaseInfoForm', new LeasesInfoType())
            ->add('manageAreaForm', new DropDownList())
            ->add('Add', 'submit')
            ->getForm()
        ;
    }

    public function getName()
    {
        return 'store_info_form';
    }

} 