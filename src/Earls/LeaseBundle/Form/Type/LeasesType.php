<?php

namespace Earls\LeaseBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;


class LeasesType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('leasetype')
            ->add('leasedate')
            ->add('term')
            ->add('commencementdate')
            ->add('expirydate')
            ->add('optiontime')
            ->add('areamain')
            ->add('areamezzanine')
            ->add('areapatio')
            ->add('areaother')
            ->add('surveyeddescription')
            ->add('renewalterms')
            ->add('renewaloptiondate')
            ->add('exclusiveuse')
            ->add('tiallowance')
            ->add('radiusclause')
            ->add('indemnifier')
            ->add('indemnityperiod')
            ->add('indemnityexpiry')
            ->add('otherdescription', 'textarea')
            ->add('renewalcomments', 'textarea')
            ->add('areaupperfloor')
            ->add('showinlease');
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Earls\LeaseBundle\Entity\Leases',
        ));
    }

    public function getName()
    {
        return 'leaseCriticalTypes';
    }

}