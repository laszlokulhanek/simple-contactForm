<?php

namespace App\Form;

use App\Entity\Messages;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;

class ContactFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options) : void
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Neved: ',
                'row_attr' => [
                    'class' => 'mb-3',
                ],
                'required' => false,
                'constraints' => [
                    new NotBlank()
                ],
            ])
            ->add('email', EmailType::class, [
                'label' => 'E-mail címed: ',
                'row_attr' => [
                    'class' => 'mb-3',
                ],
                'required' => false,
                'constraints' => [
                    new NotBlank()
                ],
            ])
            ->add('message', TextareaType::class, [
                'label' => 'Üzenet szövege: ',
                'row_attr' => [
                    'class' => 'mb-3',
                ],
                'required' => false,
                'constraints' => [
                    new NotBlank()
                ],
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Küldés',
                'row_attr' => [
                    'class' => 'w-50 d-inline-block',
                ],
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