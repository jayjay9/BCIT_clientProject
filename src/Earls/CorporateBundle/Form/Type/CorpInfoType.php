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
            ->add('jurisdictioninfo', 'collection', array(
                'type' => new JurisdictionsType(),
                'allow_add' => true,))
            ->add('corpdirectorinfo', 'collection', array(
                'type' => new CorpdirectorsType(),
                'allow_add' => true, ))                
            ->add('membershipinfo', 'collection', array(
                'type' => new MembershipsType(),
                'allow_add' => true, ))
            ->add('update', 'submit')
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