<?php

namespace App\Form;

use App\Entity\Portrait;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PortraitType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('application')
            ->add('videoGame')
            ->add('movie')
            ->add('series')
            ->add('hero')
            ->add('book')
            ->add('website')
            ->add('language')
            ->add('song')
            ->add('introduction')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Portrait::class,
        ]);
    }
}
