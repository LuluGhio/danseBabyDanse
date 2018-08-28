<?php

namespace App\Form;

use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;


class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstName',TextType::class, array('label' => "Votre prénom"))
            ->add('lastName',TextType::class, array('label' => "Votre nom"))
            ->add('email',TextType::class, array('label' => "Votre email"))
            ->add('phoneNumber',TextType::class, array('label' => "Votre numéro de téléphone"))
            ->add('content',TextareaType::class, array('label' => "Votre message"))
            ->add('submit', SubmitType::class, [
                'label' => "Envoyer !"
                ]
            )
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}