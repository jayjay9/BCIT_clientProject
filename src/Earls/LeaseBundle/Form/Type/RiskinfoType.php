<?php

namespace Earls\LeaseBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityRepository;

class RiskinfoType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('rentabatement', 'text',array('required'=> false))
            ->add('exteriormaintenance', 'text',array('required'=> false))
            ->add('constructionid', 'entity', array(
                'class' => 'EarlsLeaseBundle:Constructiontypes',
                'property' => 'constructiontype',
                'query_builder' => function(EntityRepository $er) {
                return $er->createQueryBuilder('u')
                ->orderBy('u.constructiontype', 'ASC');
                },
            ))
            ->add('insuredby', 'entity', array(
                'class' => 'EarlsLeaseBundle:Owners',
                'property' => 'ownertype',
                'query_builder' => function(EntityRepository $er) {
                return $er->createQueryBuilder('u')
                ->orderBy('u.ownertype', 'ASC');
                },
            ))
            //->add('restaurantid')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Earls\LeaseBundle\Entity\Riskinfo'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'earls_leasebundle_riskinfo';
    }
}
