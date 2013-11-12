<?php

namespace Earls\LeaseBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

use Proxies\__CG__\Earls\LeaseBundle\Entity\Provincestate;
use Proxies\__CG__\Earls\LeaseBundle\Entity\Northamericancities;

class LandlordsType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('landlordname')
            ->add('address')
            ->add('postalzip')
            ->add('attention')
            ->add('phone')
            ->add('fax')
            //->add('provincestateid', 'entity', array('class' => 'EarlsLeaseBundle:Provincestate', 'property' => 'provincestateid'))
            //->add('city', 'entity', array('class' => 'EarlsLeaseBundle:Northamericancities', 'property' => 'city'))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Earls\LeaseBundle\Entity\Landlords'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'earls_leasebundle_landlords';
    }
}
