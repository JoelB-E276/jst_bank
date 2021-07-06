<?php

namespace App\Form;

use App\Entity\Operation;
use App\Entity\AccountType;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;



class WithdrawType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('account', Account::class, 
            [
                'class'  => Account::class,
                'query_builder' => function (EntityRepository $er) 
                {
                    return $er->createQueryBuilder('a')
                        ->orderBy('a.name', 'ASC');
                },
            ])

                
            ->add('operation_date')
            ->add('amount')
            ->add('RETRAIT', SubmitType::class, [
                'row_attr' => ['class' => 'text-center']
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Operation::class,
        ]);
    }
}
