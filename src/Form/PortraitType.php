<?php

namespace App\Form;

use App\Entity\Portrait;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PortraitType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('application', TextType::class, [
                'label' => 'Application préférée',
                'attr' => [
                    'placeholder' => 'Aka passe-temps aux toilettes'
                ]
            ])
            ->add('videoGame', TextType::class, [
                'label' => 'Jeu vidéo du coeur',
                'attr' => [
                    'placeholder' => 'Candy Crush 4ever'
                ]
            ])
            ->add('movie', TextType::class, [
                'label' => 'Film favori',
                'attr' => [
                    'placeholder' => 'On sait que t\'aimes Twilight'
                ]
            ])
            ->add('series',TextType::class, [
                'label' => 'Série de prédilection',
                'attr' => [
                    'placeholder' => 'Amour, Gloire et Beauté'
                ]
            ])
            ->add('hero',TextType::class, [
                'label' => 'Héros fétiche',
                'attr' => [
                    'placeholder' => 'Staline, ça compte pas'
                ]
            ])
            ->add('book',TextType::class, [
                'label' => 'Livre bien aimé',
                'attr' => [
                    'placeholder' => 'Martine fait du Symfony'
                ]
            ])
            ->add('website',TextType::class, [
                'label' => 'Siteweb keurkeur',
                'attr' => [
                    'placeholder' => 'gouter.altay.fr rpz'
                ]
            ])
            ->add('language',TextType::class, [
                'label' => 'Langage keurkeurkeur',
                'attr' => [
                    'placeholder' => 'On s\'en fout si t\'es bilingue'
                ]
            ])
            ->add('song',TextType::class, [
                'label' => 'Chanson que t\'aimes (g plu didé)',
                'attr' => [
                    'placeholder' => 'On juge pas sauf si c\'est Jul'
                ]
            ])
            ->add('introduction', TextareaType::class, [
                'label' => 'Introduction',
                'attr' => [
                    'placeholder' => 'Raconte nous ta life (mais tout le monde s\'en fout)'
                ]
            ])
            ->add('submit' , SubmitType::class, [
                'label' => 'Enregistrer',
                'attr' => [
                   'class' => 'cefim_button'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Portrait::class,
        ]);
    }
}
