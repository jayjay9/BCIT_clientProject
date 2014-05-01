<?php
/**
 * Created by PhpStorm.
 * User: JayJay
 * Date: 11/14/13
 * Time: 5:05 PM
 */

namespace Earls\LeaseBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Earls\LeaseBundle\Entity\Reportperiodtypes;
use Doctrine\ORM\EntityRepository;


class LeaseReportInfoType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('iscertifiedsales')
            ->add('duedate')
            ->add('isaudit')
            ->add('iscertified')
            ->add('reporttypeid', 'entity', array(
                'class' => 'EarlsLeaseBundle:Reportperiodtypes',
                'property' => 'periodtype',
                'query_builder' => function(EntityRepository $er) {
                return $er->createQueryBuilder('u')
                ->orderBy('u.periodtype', 'ASC');
                },
            ));
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Earls\LeaseBundle\Entity\Leasereportsinfo',
        ));
    }

    public function getName()
    {
        return 'leaseCriticalTypes';
    }
} 