<?php

namespace EventBundle\Form;

use EventBundle\Entity\CategorieREC;
use EventBundle\Entity\Event;
use EventBundle\Entity\Reclamation;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ReclamationType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nom')->add('prenom')->add('reclamation')->add('categorie',EntityType::class,array(
            'class'=>CategorieREC::class,
            'choice_label'=>'nom',
            'multiple'=>false))
            ->add('ajouter',SubmitType::class);
    }
/*
->add('categorie',EntityType::class,array(
'class'=>CategorieREC::class,
'choice_label'=>'type',
'multiple'=>false))*/
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'EventBundle\Entity\Reclamation'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'eventbundle_reclamation';
    }


}
