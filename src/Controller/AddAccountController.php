<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AddAccountController extends AbstractController
{
    #[Route('/add/account', name: 'add_account')]
    public function index(): Response
    {
        return $this->render('add_account/index.html.twig', [
            'controller_name' => 'AddAccountController',
        ]);
    }

    public function addAccount()
    {

    }


}
