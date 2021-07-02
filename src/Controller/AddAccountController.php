<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use App\Entity\User;
use App\Entity\Account;
use App\Entity\AccountType;
use App\Entity\Operation;



class AddAccountController extends AbstractController
{
    #[Route('/add/account', name: 'add_account')]
    public function index(): Response
    {
        return $this->render('add_account/index.html.twig', [
            'controller_name' => 'AddAccountController',
        ]);
    }

    #[Route('/', name: 'index')]
    #[Route('/home', name: 'home')]
    public function getAccounts(int $id=1, User $user): Response
    {
        $user = New User;
        var_dump($user);
        $getAccounts = $this->getUser()->getAccountNumber()->getName();

        return $this->render('front/index.html.twig' ,[
            "getAccounts" => $getAccounts
        ]);

    }

}
