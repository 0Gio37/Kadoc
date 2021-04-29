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
            ->add('application', TextType::class)
            ->add('videoGame', TextType::class)
            ->add('movie', TextType::class)
            ->add('series',TextType::class)
            ->add('hero',TextType::class)
            ->add('book',TextType::class)
            ->add('website',TextType::class)
            ->add('language',TextType::class)
            ->add('song',TextType::class)
            ->add('introduction', TextareaType::class)
            ->add('Enregistrer' , SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Portrait::class,
        ]);
    }
}
