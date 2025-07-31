<?php

namespace App\Form;

use App\Entity\Debilidad;
use App\Entity\Pokemon;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PokemonTypeForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name',null,[
                'label'=>'Nombre',
                'attr' => ['placeholder'=>'Pon aqui el nombre del pokemon']
            ])
            ->add('description',null,[
                'label' => 'Descripción',
                'attr' => ['placeholder'=>'Pon aqui la descripción']
            ])
            ->add('pokemonImage',FileType::class,[
                 "label" => 'imagen',
                "mapped" => false


            ])
            ->add('code',null,[
                'label'=>'Código',
                'attr' => ['placeholder'=>'Pon aqui el código']
            ])
            ->add('debilidades', EntityType::class, [
                'class' => Debilidad::class,
                'choice_label' => 'name',
                'multiple' => true,
                'expanded' => true
            ])
            ->add('Submit', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Pokemon::class,
        ]);
    }
}
