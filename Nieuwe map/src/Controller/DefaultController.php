<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Authorization\Voter\AuthenticatedVoter;
use Symfony\Component\Security\Core\Event\AuthenticationEvent;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class DefaultController extends AbstractController
{
    #[Route('/', name: 'app_default')]
    public function index(): Response
    {
        return $this->render('default/index.html.twig', [
            'controller_name' => 'DefaultController',
        ]);
    }

    #[Route('/login', name: 'login')]
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        $error = $authenticationUtils->getLastAuthenticationError();
        $lastUsername =$authenticationUtils->getLastUsername();
        return $this->render('default/login.html.twig', [
            'controller_name' =>'LoginController',
            'last_username' => $lastUsername,
            'error'     => $error,
            ]);
    }
    #[Route('/logout', name: 'logout')]
    public function logout(): Response{
        throw new \Exception('don\t forget to activate logout in security');
    }

    #[Route('/register', name: 'register')]

    public function register(): Response
    {
        return new Response(('register'));
    }

    #[Route('/redirect', name: 'redirect')]
    public function redirectAction(Security $security){
        if ($security->isGranted('ROLE_ADMIN')){
            return $this->redirectToRoute('app_admin');
        }
        if ($security->isGranted('ROLE_USER')){
            return $this->redirectToRoute('app_user');
        }
        return $this->redirectToRoute('app_default');
    }
}
