<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class ConnexionController extends AbstractController
{
    #[Route('/connexion', name: 'connexion')]
    public function index(AuthenticationUtils $authenticationUtils): Response
    {
        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();

        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('connexion/index.html.twig', [
            'controller_name' => 'ConnexionController',
            'last_username' => $lastUsername,
            'error'         => $error,
        ]);
    }

    #[Route('/connexion/redirection', name: 'connexionRedirection')]
    public function connexionRedirection(): Response
    {
        if($this->isGranted('T'))
        {
            return $this->redirectToRoute('espaceTouriste');
        }
        else if($this->isGranted('C'))
        {
            return $this->redirectToRoute('conseiller');
        }
        else
        {
            return $this->redirectToRoute('espace-responsable');
        }
    }

    #[Route('/connexion/logout', name: 'logout')]
    public function logout(): Response
    {

    }
}
