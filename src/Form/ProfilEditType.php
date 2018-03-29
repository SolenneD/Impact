<?php
/**
 * Created by PhpStorm.
 * User: monic
 * Date: 18/03/2018
 * Time: 21:13
 */

namespace App\Form;


use App\Entity\Users;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProfilEditType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->setAction('edit')
            ->setMethod('POST')
            ->add('username', TextType::class,[
                'label' => "TON USERNAME"
            ])
            ->add('lastname', TextType::class,[
                'label' => "Prénom profil"
            ])
            ->add('email', EmailType::class,[
                'label' => "Email profil"
            ])
            ->add('plainPassword', RepeatedType::class,[
                'type' => PasswordType::class,
                'label' => "mdp profil",
                'first_options' => array('label' => 'Password'),
                'second_options' => array('label' => 'Répétez Password')

            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // uncomment if you want to bind to a class -> changer en User class
            'data_class' => Users::class,
        ]);
    }
}