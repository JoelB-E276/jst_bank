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
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

 /**
  * @IsGranted("IS_AUTHENTICATED_FULLY")
  */

class TransactionController extends AbstractController
{ 
    #[Route('/transaction', name: 'transaction')]

    public function withdraw(Request $request): Response
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
                  

        ->add('operation_date',null, [
            "label"=> "Date du virement"
        ])
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
 
        return $this->render('front/transaction.html.twig', [
            "form" => $form->createView()
        ]);
    }




}
