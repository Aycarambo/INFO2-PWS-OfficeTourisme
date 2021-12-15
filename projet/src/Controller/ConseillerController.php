<?php

namespace App\Controller;

use App\Repository\ConseillerRepository;
use App\Repository\RDVRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ConseillerController extends AbstractController
{
    #[Route('/espaceConseiller/{id}', name: 'conseiller')]
    public function espaceConseiller(ConseillerRepository $conseillerRepository, RDVRepository $repository, int $id): Response
    {
        $lrdv = $repository->findBy(['Conseiller' => $id]);
        $conseiller = $conseillerRepository->find($id);
        return $this->render('conseiller/index.html.twig', [
            'controller_name' => 'ConseillerController',
            'conseiller' => $conseiller,
            'listeRDV' => $lrdv,
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
