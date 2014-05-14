<?php

namespace Earls\CorporateBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityRepository;


class CorporationsType extends AbstractType
{
     /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('corporatename')
            ->add('filenumber')
            ->add('respsolicitor')
            ->add('usage')
            ->add('fiscalyearend')
            ->add('registrationnumber')
            ->add('registrationdate')
            ->add('seal')
            ->add('locationseal')
            ->add('capitalstructure')
            ->add('namechanges')
            ->add('corpstatus')
            ->add('dissolutiondate')
            ->add('recordsofficeid', 'entity', array('class' => 'EarlsCorporateBundle:Offices','property' => 'officename', 
                'query_builder' => function(EntityRepository $er) {
                return $er->createQueryBuilder('u')
                ->orderBy('u.officename', 'ASC');
                },))
            ->add('registeredofficeid', 'entity', array('class' => 'EarlsCorporateBundle:Offices','property' => 'officename', 
                'query_builder' => function(EntityRepository $er) {
                return $er->createQueryBuilder('u')
                ->orderBy('u.officename', 'ASC');
                },))
            ->add('provincestateid', 'entity', array('class' => 'EarlsCorporateBundle:Provincestate', 'property' => 'description',
                'query_builder' => function(EntityRepository $er) {
                return $er->createQueryBuilder('u')
                ->orderBy('u.description', 'ASC');
                },))
            ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Earls\CorporateBundle\Entity\Corporations'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'earls_corporatebundle_corporations';
    }
}
