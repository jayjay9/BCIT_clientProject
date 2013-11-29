<?php
/**
 * Created by PhpStorm.
 * User: JayJay
 * Date: 11/14/13
 * Time: 4:41 PM
 */

namespace Earls\LeaseBundle\Form\Type;

use Earls\LeaseBundle\Entity\Leases;
use Earls\LeaseBundle\Form\Model\LeasesModel;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;


class LeasesInfoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('leaseinfo', new LeasesType())
            ->add('leasereportinfo', new LeaseReportInfoType())
            ->add('leasecriticaltasks', 'collection', array(
                'type' => new LeaseCriticalTasksType(),
                'allow_add' => true,
            ))
            ->add('renewals', 'collection', array(
                'type' => new RenewalsType(),
                'allow_add' => true,
            ))
            ->add('leaseid', 'hidden');
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Earls\LeaseBundle\Form\Model\LeasesModel',
        ));
    }


    public function getName()
    {
        return 'leaseInfo';
    }
}