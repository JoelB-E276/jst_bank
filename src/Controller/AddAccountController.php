<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use App\Repository\AccountRepository;
use App\Form\AddAccountType;
use App\Entity\User;
use App\Entity\Account;
use App\Entity\AccountType;
use App\Entity\Operation;



class AddAccountController extends AbstractController
{
   
    #[Route('/Account/new', name: 'newAccount')]
    public function addAccount(Request $request, AddAccountType $addAccount ): Response
    {
        $account = new Account();
        $form = $this->createForm(AddAccountType::class, $account);
        $form->handleRequest($request);

        return $this->render('front/add_account.html.twig', [
            "form" => $form->createView()
        ]);
    }

    /**
     * @Route("/{id}")
     */
    public function getAccounts(int $id=1, User $user, AccountRepository $accountRepository, Request $request): Response
    {
        $user = new User;
        $accounts = $user->getId($id);
        var_dump($accounts);
        return $this->render('front/index.html.twig' ,[
            "accounts" => $accounts
        ]);

    }
    /**
     * @Route("/")
     */
    public function hello()
    {
        var_dump("HELLO");
        return $this->render('front/index.html.twig');

    }

  




}
