<?php

namespace App\Form;

use App\Entity\Employes;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EmployesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('prenom', TextType::class, [
                'attr'=> [
                    'class' => 'form-control'
                ]
            ])
            ->add('nom', TextType::class, [
                'attr'=> [
                    'class' => 'form-control'
                ]
            ])
            ->add('telephone', IntegerType::class, [
                'attr'=> [
                    'class' => 'form-control'
                ]
            ])
            ->add('email', EmailType::class,  [
                'attr'=> [
                    'class' => 'form-control'
                ]
            ])
            ->add('adresse', TextType::class, [
                'attr'=> [
                    'class' => 'form-control'
                ]
            ])
            ->add('poste', TextType::class, [
                'attr'=> [
                    'class' => 'form-control'
                ]
            ])
            ->add('salaire', IntegerType::class, [
                'attr'=> [
                    'class' => 'form-control'
                ]
            ])
            ->add('datedenaissance', BirthdayType::class)
            
            ->add('submit', SubmitType::class, [
                'attr' => [
                    'class' => 'btn btn-success mt-4'
                ],
                'label' => 'Créer la fiche salarié'
            ] );
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Employes::class,
        ]);
    }
}
