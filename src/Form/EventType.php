<?php
/**
 * Created by PhpStorm.
 * User: monic
 * Date: 21/03/2018
 * Time: 19:42
 */

namespace App\Form;


use App\Entity\Event;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EventType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class,[
                'label' => "Nom"
            ])
            ->add('day', DateType::class,[
                'label' => "Date"
            ])
            ->add('hour', TimeType::class,[
                'label' => "Heure"
            ])
            ->add('description', TextareaType::class,[
                'label' => "Description"
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // uncomment if you want to bind to a class -> changer en User class
            'data_class' => Event::class,
        ]);
    }
}