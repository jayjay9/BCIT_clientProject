<?php

namespace Earls\CorporateBundle\Form\Type;

use Earls\CorporateBundle\Entity\Directors;
use Earls\CorporateBundle\Entity\Corporatedirectors;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityRepository;


class CorpdirectorsType extends AbstractType
{
     /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('position')
            ->add('director', 'entity', array('class' => 'EarlsCorporateBundle:Directors', 'property' => 'directorName',
                'query_builder' => function(EntityRepository $er) {
                return $er->createQueryBuilder('u')
                ->orderBy('u.directorName', 'ASC');
                },))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Earls\CorporateBundle\Entity\Corporatedirectors'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'earls_corporatebundle_corporatedirectors';
    }
}
