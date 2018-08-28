<?php

namespace App\Form;

use App\Entity\Inscriptions;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\RadioType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;



class InscriptionsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('adult', RadioType::class, array(
                'label' => "Le pré-inscris est un enfant",
                'required' => true)
            )
            
            ->add('firstName',TextType::class, array('label' => "Prénom"))
            
            ->add('lastName',TextType::class, array('label' => "Nom"))
            
            ->add('phoneNumber',TextType::class, array('label' => "Numéro de téléphone"))
            
            ->add('email',TextType::class, array('label' => "Email"))
            
            ->add('birthDate', DateType::class, array(
                'label' => "Date de naissance",
                'widget' => "single_text")
            )
            
            ->add('grades', CheckboxType::class,array(
                'label' => "EVEIL 4-6ans",
                'required' => false)
            )
            
            ->add('submit', SubmitType::class, [
                'label' => "Envoyer !"
                ]
            )
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Inscriptions::class,
        ]);
    }
}