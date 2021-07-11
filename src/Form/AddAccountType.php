<?php

namespace App\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Entity\Account;
use App\Entity\User;
use App\Entity\AccountGroup;
use App\Entity\Operation;
use App\Form\TransactionType;
use App\Form\WithdrawType;
use App\Repository\OperationRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class AddAccountType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('AccountGroup', EntityType::class, [
            'label' => "Un",
            'class' => AccountGroup::class,
            'choice_label' => 'name'],) 
            ->add('account_number')
            ->add('amount', MoneyType::class, [
                'scale' => 0])
           /*  ->add('User')
            ->add('AccountGroup') */
            ->add('Virer', SubmitType::class, [
                'row_attr' => ['class' => 'text-center']
            ],)  
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Account::class,
        ]);
    }
}
