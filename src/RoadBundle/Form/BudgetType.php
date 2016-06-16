<?php

namespace RoadBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BudgetType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('essence', 'integer')
            ->add('bouffe', 'integer')
            ->add('trajet', 'integer')
            ->add('total', 'integer')
            ->add('sortie', 'integer');
    }
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'RoadBundle\Entity\Budget',
            'csrf_protection'   => false
        ));
    }
}
