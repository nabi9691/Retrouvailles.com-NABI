<?php

namespace App\Form;

use App\Entity\Utilisateurs;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
// use Symfony\Component\Form\Extension\Core\Type\RadioType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;

class RegistrationFormEditType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('civilite', ChoiceType::class, [
                'label' => 'Votre civilité',
                'required' => false,
                'choices' => ["Mme" => "Mme", "Mlle" => "Mlle", "M." => "M."],
                'multiple' => false,
            ])

            ->add('nom', TextType::class, [
                'label' => 'Votre nom',
                'required' => false
            ])
            
            ->add('prenom', TextType::class, [
                'label' => 'Votre prénom',
                'required' => false
            ])
            ->add('dateNaiss', BirthdayType::class, [
                'label' => 'Date Naissance',
                'required' => false,
                'widget' => 'single_text'
            ])

            // ->add('confirmepassword', PasswordType::class, [
                // 'mapped' => false,
            //     'required' => true,
            //     'label' => 'Confirmez votre mot de passe',
            // ])
//            ->add('email', EmailType::class, [
//                'label' => 'Votre email'
//            ])
            // ->add('plainPassword', PasswordType::class, [
            // instead of being set onto the object directly,
            // this is read and encoded in the controller
            //     'mapped' => false,
            //     'attr' => ['autocomplete' => 'new-password'],
            //     'constraints' => [
            //         new NotBlank([
            //             'message' => 'Please enter a password',
            //         ]),
//                     new Length([
//                         'min' => 6,
//                         'minMessage' => 'Your password should be at least {{ limit }} characters',
//                         // max length allowed by Symfony for security reasons
//                         'max' => 4096,
//                     ]),
            //     ],
            // ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Utilisateurs::class,
        ]);
    }
}
