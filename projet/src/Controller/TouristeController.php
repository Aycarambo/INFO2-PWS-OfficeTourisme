<?php

namespace App\Controller;

use App\Repository\RDVRepository;
use App\Repository\TouristeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;
use Symfony\Component\Security\Core\Exception\AuthenticationException;


class TouristeController extends AbstractController
{
    private function utilisateurCourant(TouristeRepository $repositoryTouriste)
    {
        $user = $this->getUser();
        if (!$user)
        {
            throw new AuthenticationException("Non connecté");
        }
        $touriste_id = $user->getTouriste();
        return $repositoryTouriste->find($touriste_id);
    }

    #[Route('/espaceTouriste', name: 'espaceTouriste')]
    public function espaceTouriste(TouristeRepository $repositoryTouriste): Response
    {
        $touriste = $this->utilisateurCourant($repositoryTouriste);
        return $this->render('touriste/espaceTouriste.html.twig', [
            'touriste' => $touriste,
        ]);
    }

    #[Route('/espaceTouriste/demandeRDV', name: 'demandeRDV')]
    public function demandeRDV(): Response
    {
        return $this->render('touriste/demandeRDV.html.twig', [
        ]);
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

    #[Route('/espaceTouriste/mesRDV/remove/{idR}', name: 'remove_rdv_touriste')]
    public function removeRDVT(RDVRepository $repositoryRDV, TouristeRepository $repositoryTouriste, EntityManagerInterface $em, int $idR): Response
    {
        $touriste = $this->utilisateurCourant($repositoryTouriste);

        $rdv = $repositoryRDV->find($idR);
        if ($rdv != NULL)
        {
            $em->remove($rdv);
            $em->flush();
        }

        // return $this->redirectToRoute("mesRDVtouriste");
        $listeRDV = $repositoryRDV->findBy(['Touriste' => $touriste], ['horaire' => 'ASC']);
        return $this->render("touriste/mesRDVtouriste.html.twig", [
            'listeRDV' => $listeRDV,
        ]);
    }

}
