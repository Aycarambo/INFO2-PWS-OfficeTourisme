<?php

namespace App\Controller;

use App\Repository\RDVRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class TouristeController extends AbstractController
{
    #[Route('/espaceTouriste', name: 'espaceTouriste')]
    public function espaceTouriste(): Response
    {
        return $this->render('touriste/espaceTouriste.html.twig', [
            'controller_name' => 'TouristeController',
        ]);
    }

    #[Route('/espaceTouriste/demandeRDV', name: 'demandeRDV')]
    public function demandeRDV(): Response
    {
        return $this->render('touriste/demandeRDV.html.twig', [
            'controller_name' => 'TouristeController',
        ]);
    }

    #[Route('/espaceTouriste/mesRDV', name: 'mesRDVtouriste')]
    public function mesRDV(RDVRepository $repositoryRDV): Response
    {
        $listeRDV = $repositoryRDV->findAll();
        return $this->render('touriste/mesRDVtouriste.html.twig', [
            'listeRDV' => $listeRDV,
        ]);
    }
}
