<?php

namespace App\Controller;

use App\Repository\ConseillerRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Conseiller;
use App\Repository\RDVRepository;

class ListeConseillersController extends AbstractController
{
    #[Route('/espaceResponsable', name: 'espace-responsable')]
    public function espaceR(ConseillerRepository $repository): Response
    {
        $conseillers = $repository->findAll();
        return $this->render('espaceResponsable/index.html.twig', [
            'controller_name' => 'ListeConseillersController',
            'conseillers' => $conseillers,
        ]);
    }

    #[Route('/espaceResponsable/ListeDesRDV/{id}', name: 'liste_rdv_conseillers')]
    public function listeRDVC(ConseillerRepository $conseillerRepository, RDVRepository $repository, int $id): Response
    {
        $lrdv = $repository->findBy(['Conseiller' => $id]);
        $conseiller = $conseillerRepository->find($id);
        return $this->render('espaceResponsable/listeRDV.html.twig', [
            'controller_name' => 'ListeConseillersController',
            'lrdv' => $lrdv,
            'conseiller' => $conseiller,
        ]);
    }
}
