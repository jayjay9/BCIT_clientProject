<?php
namespace Earls\LeaseBundle\Form\Type;

use Doctrine\Bundle\DoctrineBundle\ManagerConfigurator;
use Proxies\__CG__\Earls\LeaseBundle\Entity\Areas;
use Proxies\__CG__\Earls\LeaseBundle\Entity\Areatypes;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityRepository;

class DropDownList extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('storefilenumber', 'entity', array(
            'class' => 'EarlsLeaseBundle:Restaurants',
            'property' => 'storenickname',
            'empty_value' => false
        ))
            ->add('go', 'submit', array(
                'attr' => array('class' => 'btn')));
        $builder->add('area1', new ManageArea())
        ->add('area2', new ManageArea())
        ->add('area3', new ManageArea())
        ->add('update', 'submit');
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Earls\LeaseBundle\Form\Model\DropDownModel',
        ));
    }

    public function getName()
    {
        return 'areatypes';
    }
}