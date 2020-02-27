<?php

namespace CommandeBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class livraisonType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder  ->add('paiement',  EntityType::class,array(
            'class'=>'PaiementBundle\Entity\Paiement',
            'choice_label'=>'nom_companie',
            'multiple'=>false
        ))->add('adresseLivr')->add('datelivr')->add('etat',HiddenType::class,array(
            'empty_data' => 'En attente'
        ))->add('Submit',SubmitType::class,array('label' => 'Confirmer'));
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'CommandeBundle\Entity\livraison'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'commandebundle_livraison';
    }


}
