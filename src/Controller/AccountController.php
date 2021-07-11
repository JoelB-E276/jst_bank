<?php

namespace App\Controller;

use DateTime;
use Exception;
use App\Entity\Account;
use App\Form\AccountType;
use App\Repository\AccountRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

 /**
  * @IsGranted("IS_AUTHENTICATED_FULLY")
  */
#[Route('/account')]
class AccountController extends AbstractController
{
    #[Route('/', name: 'account_index', methods: ['GET'])]
    public function index(AccountRepository $accountRepository): Response
    {
        $user = $this->getUser();
        $accounts = $accountRepository->findBy(['User' => $user]);
        
        return $this->render('account/index.html.twig', [
                'accounts' => $accounts, 
        ]);
    }

    #[Route('/new', name: 'account_new', methods: ['GET', 'POST'])]
    public function new(Request $request): Response
    {
        $account = new Account();
        $timestamp = new DateTime();
        $account->setCreatedAt($timestamp);
        $form = $this->createForm(AccountType::class, $account);
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {

            $user = $this->getUser();
            $account->setUser($user);
            $timestamp = new DateTime();
            $account->setCreatedAt($timestamp);
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($account);
            $entityManager->flush();

            return $this->redirectToRoute('account_index');
        }

        return $this->renderForm('account/new.html.twig', [
            'account' => $account,
            'form' => $form,
        ]);
    }

    #[Route('/{id}/edit', name: 'account_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Account $account): Response
    {
        $user = $this->getUser();
        if ($account->getUser()->getId() !== $user->getId()) {
                throw new Exception('Accès non autorisé');
        }
        $form = $this->createForm(AccountType::class, $account);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('account_index');
        }

        return $this->renderForm('account/edit.html.twig', [
            'account' => $account,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'account_delete', methods: ['GET'])]
    public function delete(Account $account): Response
    {
     
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($account);
        $entityManager->flush();

            // if ($this->isCsrfTokenValid('delete'.$account->getId(), $request->request->get('_token'))) {
        //     $entityManager = $this->getDoctrine()->getManager();
        //     $entityManager->remove($account);
        //     $entityManager->flush();
        // }

        return $this->redirectToRoute('account_index');
    }
}
