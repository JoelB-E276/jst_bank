<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Entity\Account;
use App\Entity\User;
use App\Entity\AccountGroup;
use App\Entity\Operation;
use App\Form\TransactionType;
use App\Form\AddAccountType;
use App\Form\WithdrawType;
use App\Repository\OperationRepository;

class TransactionController extends AbstractController
{ 


    // Retrait
    #[Route('/withdrawal', name: 'withdrawal')]

    public function withdrawal(Request $request): Response
    {
        $operation = new Operation();
        $form = $this->createForm(TransactionType::class, $operation);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $user = $this->getUser();
            $account = new account();
            $account->setUser($user);
            $account->setCreatedAt(new \DateTime());
            $accountGroup = new AccountGroup();
            $account->setAccountGroup($accountGroup);
            $account->setAccountNumber('76310794789185');

            $operation->setAccountId($account);
            $operation->setOperationDate(new \DateTime());
         
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($account);
            $entityManager->persist($accountGroup);
            $entityManager->persist($operation);
            $entityManager->flush();
            
        }
        
        return $this->render('transaction/withdrawal.html.twig', [
            "form" => $form->createView()
        ]);
        
    }


    //Virement
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


    // Création d'un compte 
    #[Route('/addAccount', name: 'addAccount')]

    public function addAccount(Request $request): Response
    {
        $account = new Account();
        $form = $this->createForm(AddAccountType::class, $account);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $formData = $form->getData();
            $accountGroup = new AccountGroup();
            $accountGroup->setName("Nouveau compte");
            $user = $this->getUser();
            $account->setUser($user);
            $account->setCreatedAt(new \DateTime());
            $account->setAccountGroup($accountGroup);

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($accountGroup);
            $entityManager->persist($account);
            $entityManager->flush();
                      
        }            

        return $this->render('transaction/addAccount.html.twig', [
            "form" => $form->createView()
        ]);
        
    }
    

}
