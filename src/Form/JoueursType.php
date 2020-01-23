<?php

namespace App\Form;

use App\Entity\Joueurs;
use App\Entity\Carte;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class JoueursType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('email')
            ->add('score')
            ->add('positionX')
            ->add('positionY')
            ->add('carte', EntityType::class, [
                'class' => Carte::class,
                    'choice_label' => 'nom',
                ]
            )
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Joueurs::class,
        ]);
    }
}
