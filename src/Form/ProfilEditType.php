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
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichImageType;

class ProfilEditType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->setAction('edit')
            ->setMethod('POST')
            ->add('username', TextType::class,[
                'label' => "Prénom"
            ])
            ->add('lastname', TextType::class,[
                'label' => "Nom"
            ])
            ->add('email', EmailType::class,[
                'label' => "Email"
            ])
            ->add('plainPassword', RepeatedType::class,[
                'type' => PasswordType::class,
                'label' => "mdp profil",
                'first_options' => array('label' => 'Modifier le mot de passe'),
                'second_options' => array('label' => 'Répéter le mot de passe')
            ])
            ->add('imageFile', VichImageType::class, array(
                'label' => 'Image(JPG)'
            ))
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