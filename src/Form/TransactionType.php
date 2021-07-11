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
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class TransactionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('operation_date')
            ->add('amount')
            ->add('operation_type')
            ->add('account_id', EntityType::class, [
                'label' => "Depuis le compte",
                'class' => Account::class,
                'choice_label' => 'account_number'],)
                
            ->add('Virer', SubmitType::class, [
                'row_attr' => ['class' => 'text-center']
            ],)  
            
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Operation::class,
        ]);
    }
}
