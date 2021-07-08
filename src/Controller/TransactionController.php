<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Entity\Account;
use App\Entity\User;
use App\Entity\AccountType;
use App\Entity\Operation;
use App\Form\WithdrawType;
use App\Repository\OperationRepository;

class TransactionController extends AbstractController
{ 

    // Retrait
    #[Route('/withdrawal', name: 'withdrawal')]

    public function withdrawal(Request $request): Response
    {
        $user = new User();
        $account = new account();
        $account->setUser($this->getUser());
        $operation = new Operation();
        $form = $this->createFormBuilder()

        ->add('account_number', EntityType::class, [
            'label' => "Depuis le compte",
            'class' => Account::class,
            'choice_label' => ''],)

            ->add('utili', EntityType::class, [
                'label' => "Depuis le compte",
                'class' => user::class,
                'choice_label' => 'email'],)

                           
        ->add('amount',null, [
            "label"=> "Montant"
        ])
        
        ->add('Retrait', SubmitType::class, [
            'row_attr' => ['class' => 'text-center']
        ],)  
    
        ->getForm();


     if($form->isSubmitted() && $form->isValid())
         {
            $data = $form->getData();
            var_dump($data);
        /*  $operation->setOperationType("D");
            $user = new User;
            $user->getId($this->getUser());
            dd($user);
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($operation);
            $entityManager->flush();*/

         } 
 
        return $this->render('transaction/withdrawal.html.twig', [
            "form" => $form->createView()
        ]);
    }


    #[Route('/transfer', name: 'transfer')]

    public function transfer (Request $request): Response
    {
        $operation = new Operation();
        $form = $this->createFormBuilder()

        ->add('from', EntityType::class, [
            'label' => "Depuis le compte",
            'class' => Account::class,
            'choice_label' => 'account_number'],)

        ->add('to', EntityType::class, [
            'label' => "Vers le compte",
            'class' => Account::class,
            'choice_label' => 'account_number'],) 
                    
        ->add('amount',null, [
            "label"=> "Montant"
        ])
        
        ->add('Virer', SubmitType::class, [
            'row_attr' => ['class' => 'text-center']
        ],)  
    
        ->getForm();


     if($form->isSubmitted() && $form->isValid())
         {
            $data = $form->getData();
            var_dump($data);
        /*  $operation->setOperationType("D");
            $user = new User;
            $user->getId($this->getUser());
            dd($user);
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($operation);
            $entityManager->flush();*/

         } 
 
        return $this->render('transaction.transfer.html.twig', [
            "form" => $form->createView()
        ]);
    }

}
