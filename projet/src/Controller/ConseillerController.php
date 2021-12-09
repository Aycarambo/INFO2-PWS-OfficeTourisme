<?php

namespace App\Controller;

use App\Repository\RDVRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ConseillerController extends AbstractController
{
    #[Route('/espaceConseiller', name: 'conseiller')]
    public function espaceConseiller(): Response
    {
        return $this->render('conseiller/index.html.twig', [
            'controller_name' => 'ConseillerController',
        ]);
    }
    #[Route('/espaceConseiller/MesRDV', name: 'conseillerRDV')]
    public function conseillerRDV(RDVRepository $aRepository): Response
    {
        $rdvs=$aRepository->findAll();
        return $this->render('conseiller/rdv.html.twig', [
            'controller_name' => 'ConseillerController',
            'RDVS' => $rdvs,
        ]);
    }
}
