<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Subject;
use App\Entity\Answer;
use App\Form\SubjectType;
use App\Form\AnswerType;
use App\Repository\SubjectRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

/**
  * @IsGranted("IS_AUTHENTICATED_FULLY")
  */
  //   permet de dire que si on n est pas login on ne peut pas acceder au site
class FrontController extends AbstractController
{   
    #[Route('/', name: 'index')]
    #[Route('/home', name: 'home')]
    public function index(): Response
    {
        return $this->render('front/index.html.twig', [
            'controller_name' => 'FrontController',
        ]);
    }
}
