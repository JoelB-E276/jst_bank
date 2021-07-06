<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Account;
use App\Entity\Operation;
use App\Form\WithdrawType;
use App\Repository\OperationRepository;

class TransactionController extends AbstractController
{
    #[Route('/transaction', name: 'transaction')]

    public function withdraw(Request $request): Response
    {
        $operation = new Operation();
        $form = $this->createFormBuilder($operation)
        ->add('accountType', Account::class, 
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
    
    ->getForm();

        if($form->isSubmitted() && $form->isValid())
         {
            $operation->setOperationType("D");
            $operation->setUser($this->getUser());
            $operation->setPublished(new \DateTime());
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($subject);
            $entityManager->flush();

         }

        return $this->render('front/transaction.html.twig', [
            "form" => $form->createView()
        ]);
    }
}
