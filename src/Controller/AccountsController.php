<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AccountsController extends AbstractController
{
    #[Route('/accounts', name: 'accounts')]
    public function index(): Response
    {
        return $this->render('accounts/index.html.twig', [
            'controller_name' => 'AccountsController',
        ]);
    }

    #[Route('/accounts', name: 'accounts')]
    public function accounts ():Response
    {
        var_dump("YOUHOUU");
        return $this->render('front/index.html.twig');
    }



}
