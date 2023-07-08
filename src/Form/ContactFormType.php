<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use App\Entity\Messages;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Neved: ',
                'row_attr' => [
                    'class' => 'mb-3',
                ]
            ])
            ->add('email', EmailType::class, [
                'label' => 'E-mail címed: ',
                'row_attr' => [
                    'class' => 'mb-3',
                ]
            ])
            ->add('message', TextareaType::class, [
                'label' => 'Üzenet szövege: ',
                'row_attr' => [
                    'class' => 'mb-3',
                ]
            ])
            ->add('submit', SubmitType::class, [
                'row_attr' => [
                    'class' => 'w-50 d-inline-block,',
                ],
                'attr' => ['class' => 'btn-success'],
                'label' => 'Üzenet küldése',
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Messages::class,
        ]);
    }
}
?>