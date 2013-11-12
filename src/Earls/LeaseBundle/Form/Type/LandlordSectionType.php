<?php
/**
 * Created by PhpStorm.
 * User: alfredo-ub
 * Date: 08/11/13
 * Time: 7:08 PM
 */

namespace Earls\LeaseBundle\Form\Type;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class LandlordSectionType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('storenickname', 'text')
                ->add('landlordid')
                ->add('propertymanagerid')
                ->add('corporateid')
                ->add('tenant', 'text')
                ->add('address', 'textarea')
        ;
    }

    public function getName()
    {
        return 'landlord_info_section';
    }

} 