<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    #[Route('/user', name: 'app_user')]
    public function index(): Response
    {
        return $this->render('user/index.html.twig', [
            'controller_name' => 'UserController',
        ]);
    }

    #[Route('/overons', name: 'app_overons')]
    public function overons(): Response
    {
        return $this->render('user/overons.html.twig', [
            'controller_name' => 'UserController',
        ]);
    }

    #[Route('/projecten', name: 'app_projecten')]
    public function projecten(): Response
    {
        return $this->render('user/project.html.twig', [
            'controller_name' => 'UserController',
        ]);
    }

}

