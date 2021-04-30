<?php

namespace App\Form;

use App\Entity\Filiere;
use App\Entity\Formation;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FormationEditType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('intitule',TextType::class)
            ->add('slug',TextType::class)
            ->add('beginAt',DateType::class)
            ->add('endAt', DateType::class)
            ->add('filiere',EntityType::class, [
                // looks for choices from this entity
            'class' => Filiere::class,

            // uses the User.username property as the visible option string
            'choice_label' => 'nom',

            // used to render a select box, check boxes or radios
                'multiple' => false,
                'expanded' => true,
                ])
            ->add('formateur_referent',EntityType::class, [
                'class' => User::class,
                ]);

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Formation::class,
        ]);
    }
}
