<?php

namespace App\Form;

// use App\Entity\User;
use App\Entity\Account;
use App\Entity\AccountGroup;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class AccountType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('account_number', TextType::class, ['label' => 'N° Compte'])
            ->add('amount', TextType::class, ['label' => 'Solde'])
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