<?php

//DO NOT SYNC THIS, USE ANDREW'S VERSION

namespace Earls\CorporateBundle\Form\Type;

use Earls\CorporateBundle\Entity\Corporations;
use Earls\CorporateBundle\Form\Type\CorporationsType;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;


class CorpInfoType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('corporationinfo', new CorporationsType())
            //->add('officeInfo', new OfficesType())
            ->add('jurisdictioninfo', new JurisdictionsType())
            ->add('corpdirectorinfo', new CorpdirectorsType())
            ->add('membershipinfo', new MembershipsType())
            ->add('corporationId', 'hidden')
            ->add('Add', 'submit')
            ->getForm()
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Earls\CorporateBundle\Form\Model\CorpInfoModel',
        ));
    }

    public function getName()
    {
        return 'corp_info_form';
    }

} 