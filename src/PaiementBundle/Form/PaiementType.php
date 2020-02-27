<?php

namespace PaiementBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\RadioType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PaiementType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('email')->add('nomCompanie')->add('pays')->add('district')->add('codePostal')
            ->add('methodedepaiement')  ->add('commande',  EntityType::class,array(
                'class'=>'CommandeBundle\Entity\Commande',
                'choice_label'=>'produit',
                'multiple'=>false
            ))
            ->add('Submit',SubmitType::class,array('label' => 'Valider Paiement'));
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'PaiementBundle\Entity\Paiement'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'paiementbundle_paiement';
    }


}
