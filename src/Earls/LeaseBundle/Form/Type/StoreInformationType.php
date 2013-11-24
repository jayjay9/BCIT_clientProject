<?php
/**
 * Created by PhpStorm.
 * User: alfredo-ub
 * Date: 10/11/13
 * Time: 3:15 PM
 */

namespace Earls\LeaseBundle\Form\Type;

use Earls\LeaseBundle\Entity\Licenses;
use Earls\LeaseBundle\Form\Type\RestaurantsType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;


class StoreInformationType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('restaurantInfo', new RestaurantsType())
            ->add('liquorlicense', new LiquorlicensesType())
            ->add('licenseinfo', new LicensesType())
            ->add('riskinfo', new RiskinfoType())
            ->add('rentandmaintenance', new RentandmaintenancesType())
            ->add('utilities', new UtilitiesType())
            ->add('restaurantId', 'hidden')
            ->add('Update', 'submit')
                ->getForm()
        ;
    }

    public function getName()
    {
        return 'store_info_form';
    }

} 