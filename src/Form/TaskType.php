<?php

namespace App\Form;

use App\Entity\Task;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TaskType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', null, [

                'label' => 'Titre de la tâche',
                'attr' => [
                    'placeholder' => 'Exemple : Faire les courses',
                    'class' => 'form-control',
                ],
            ])
            ->add('date', null, [
                'widget' => 'single_text',
                'label' => 'Date de la tâche',
                'attr' => [
                    'class' => 'form-control mb-2',
                ],
            ]);
    }


    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Task::class,
        ]);
    }
}
