<?php

namespace App\Form;

use App\Entity\Inscriptions;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\RadioType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;



class InscriptionsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstName',TextType::class, array('label' => "Prénom"))
            
            ->add('lastName',TextType::class, array('label' => "Nom"))
            
            ->add('phoneNumber',TextType::class, array('label' => "Numéro de téléphone"))
            
            ->add('email',TextType::class, array('label' => "Email"))
            
            ->add('birthDate', DateType::class, array(
                'label' => "Date de naissance",
                'widget' => "single_text")
            )
            
            ->add('grades', ChoiceType::class,array(
                'label' => "Choisissez les cours qui vous intéressent:",
                'required' => true,
                'expanded' => true,
                'multiple' => true,
                'choices' => array(
                                    'EVEIL 4-6ans' => 'eveil', // 'eveil' is the value in the twig form
                                    'CLASSIQUE 7-9ans' => 'classique79',
                                    'CLASSIQUE 10-12ans' => 'classique1012',
                                    'CLASSIQUE 13-15ans' => 'classique1315',
                                    'CLASSIQUE 16ans et +' => 'classique16',
                                    'JAZZ 10-12ans' => 'jazz1012',
                                    'JAZZ 13-15ans' => 'jazz1315',
                                    'JAZZ 16ans et +' => 'jazz16',
                                    'DANSE DE SALON 10-12ans' => 'salon1012',
                                    'DANSE DE SALON 13-15ans' => 'salon1315',
                                    'DANSE DE SALON 16ans et +' => 'salon16',
                                    'CLASSIQUE débutant' => 'classiqueDeb',
                                    'CLASSIQUE intermédiaire' => 'classiqueInter',
                                    'CLASSIQUE avancé' => 'classiqueAv',
                                    'JAZZ débutant' => 'jazzDeb',
                                    'JAZZ intermédiaire' => 'jazzInter',
                                    'JAZZ avancé' => 'jazzAv',
                                    'BACHATA débutant' => 'bachataDeb',
                                    'BACHATA intermédiaire' => 'bachataInter',
                                    'BACHATA avancé' => 'bachataAv',
                                    'SALSA débutant' => 'salsaDeb',
                                    'SALSA intermédiaire' => 'salsaInter',
                                    'SALSA avancé' => 'salsaAv'
                                    ),
                
                )
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