<?php

namespace Earls\CorporateBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityRepository;


class OfficesType extends AbstractType
{
     /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('officename')
            ->add('address')
            ->add('postalzip')
            ->add('provincestateid', 'entity', array('class' => 'EarlsCorporateBundle:Provincestate', 'property' => 'description',
                'query_builder' => function(EntityRepository $er) {
                return $er->createQueryBuilder('u')
                ->orderBy('u.description', 'ASC');
                },))
            ->add('city', 'entity', array('class' => 'EarlsCorporateBundle:Northamericancities', 'property' => 'city',
                'query_builder' => function(EntityRepository $er) {
                return $er->createQueryBuilder('u')
                ->orderBy('u.city', 'ASC');
                },))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Earls\CorporateBundle\Entity\Offices'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'earls_corporatebundle_offices';
    }
}
