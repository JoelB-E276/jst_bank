<?php

namespace App\Form;

use App\Entity\User;
use App\Entity\Account;
use App\Entity\AccountGroup;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;

class AccountType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('account_number', TextType::class, ['label' => 'N° Compte',
                'attr' => [
                'placeholder' => 'Veuillez introduire le N° compte']
            ])
            ->add('amount', MoneyType::class, ['label' => 'Solde',
                'scale' => 2,
                'currency' => 'EUR',
                'constraints' => [
                    new Regex( array( 'pattern' => '/[0-9]{1,}\.[0-9]{2}/'))]
            ])
            ->add('created_at', DateType::class, ['label' => "Date d'ouverture",
                'widget' => 'single_text',
                'disabled' => true
            ]) 
            ->add('accountgroup', EntityType::class, ['label' => 'Type de compte',
                'class' => AccountGroup::class,
                'choice_label' => 'name'
            ])            
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Account::class,
        ]);
    }
}

// ->add('user', EntityType::class, [
//     'class' => User::class,
//     'choice_label' => 'firstname'
// ])