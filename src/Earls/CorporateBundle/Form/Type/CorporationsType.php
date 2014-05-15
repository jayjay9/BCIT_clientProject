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
            ->add('corporatename', 'text', array('required'=> true))
            ->add('filenumber', 'number', array('invalid_message' => 'Enter a number','required'=> true))
            ->add('respsolicitor', 'text', array('required'=> true))
            ->add('corporateusage', 'text', array('required'=> false))
            ->add('fiscalyearend', 'text', array('required'=> false))
            ->add('registrationnumber', 'text', array('invalid_message' => 'Enter a number','required'=> true))
            ->add('registrationdate', 'date',array('invalid_message' => 'Enter a valid date','required'=> true))
            ->add('seal')
            ->add('locationseal', 'text', array('required'=> false))
            ->add('capitalstructure','textarea', array('required'=> false))
            ->add('namechanges', 'textarea', array('required'=> false))
            ->add('corpstatus')
            ->add('dissolutiondate', 'date',array('invalid_message' => 'Enter a valid date','required'=> false))
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
