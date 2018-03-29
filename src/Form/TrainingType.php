<?php
/**
 * Created by PhpStorm.
 * User: monic
 * Date: 18/03/2018
 * Time: 19:28
 */

namespace App\Form;


use App\Entity\Coach;
use App\Entity\Training;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TrainingType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class,[
                'label' => "Nom du cours"
            ])
            ->add('day', DateType::class,[
                'label' => "Date du cours"
            ])
            ->add('hour', TimeType::class,[
                'label' => "Heure du cours"
            ])
            ->add('periode', IntegerType::class,[
                'label' => "Durée du cours"
            ])
            ->add('intensite', IntegerType::class,[
                'label' => "Intensité du cours"
            ])
            ->add('coach', EntityType::class,[
                'class' => Coach::class,
                'query_builder' => function(EntityRepository $er){
                    return $er->createQueryBuilder('u')
                        ->orderBy('u.id','ASC');
                },
                'choice_label' => 'name'
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // uncomment if you want to bind to a class -> changer en User class
            'data_class' => Training::class,
        ]);
    }
}