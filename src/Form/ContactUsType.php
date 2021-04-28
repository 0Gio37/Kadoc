<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactUsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', TextType::class, [
                'label' => 'Votre nom',
                'attr' => [
                    'placeholder'=>'Saisissez votre nom.'
                ]
            ])
            ->add('prenom', TextType::class, [
                'label' => 'Votre prénom',
                'attr' => [
                    'placeholder'=>'Saisissez votre prénom.'
                ]
            ])
            ->add('mail', EmailType::class, [
                'label' => 'Adresse mail',
                'attr' => [
                    'placeholder'=>'Saisissez votre adresse mail.'
                ]
            ])
            ->add('objet', TextType::class, [
                'label' => 'Sujet de votre demande',
                'attr' => [
                    'placeholder'=>'Ex : Demande d\'information'
                ]
            ])
            ->add('contenu', TextareaType::class, [
                'label' => 'Commentaire',
                'attr' => [
                    'placeholder'=>'Saisissez votre commentaire'
                ]
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Envoyer'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
