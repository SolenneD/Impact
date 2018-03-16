<?php

namespace App\Form;

use App\Entity\Utilisateur;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class,[
                'label' => "Votre nom"
            ])
            ->add('lastname', TextType::class,[
                'label' => "Votre prénom"
            ])
            ->add('email', TextType::class,[
                'label' => "Votre adresse mail"
            ])
            ->add('mdp', TextType::class,[
                'label' => "Votre mot de passe"
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // uncomment if you want to bind to a class -> changer en User class
            'data_class' => Utilisateur::class,
        ]);
    }
}
