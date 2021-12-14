<?php

namespace App\Controller;

use App\Repository\RDVRepository;
use App\Repository\TouristeRepository;
use Doctrine\ORM\EntityManagerInterface;
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

    // todo : Modifier le code pour utiliser l'id de la session
    private function utilisateurCourant(TouristeRepository $repositoryTouriste)
    {
        return $repositoryTouriste->findOneBy(['prenom' => 'Chloé']);
    }


    #[Route('/espaceTouriste/mesRDV', name: 'mesRDVtouriste')]
    public function mesRDV(RDVRepository $repositoryRDV, TouristeRepository $repositoryTouriste): Response
    {
        $touriste = $this->utilisateurCourant($repositoryTouriste);
        $listeRDV = $repositoryRDV->findBy(['Touriste' => $touriste]);
        return $this->render('touriste/mesRDVtouriste.html.twig', [
            'listeRDV' => $listeRDV,
        ]);
    }

    #[Route('/espaceTouriste/mesRDV/{idT}/remove/{idR}', name: 'remove_rdv_touriste')]
    public function removeRDVT(RDVRepository $repository, EntityManagerInterface $em, int $idT, int $idR): Response
    {
        $rdv = $repository->find($idR);
        $em->remove($rdv);
        $em->flush();
        return $this->redirect("/espaceTouriste/mesRDV/{idT}");
    }

}
