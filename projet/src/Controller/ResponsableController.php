<?php

namespace App\Controller;

use App\Form\ModifierRDVResponsable;
use App\Repository\ConseillerRepository;
use App\Repository\SaisonRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\RDVRepository;
use Symfony\Component\Security\Core\Exception\AuthenticationException;

class ResponsableController extends AbstractController
{
    private function utilisateurCourant()
    {
        // vérifie qu'un utilisateur est connecté
        $user = $this->getUser();
        if (!$user)
        {
            throw new AuthenticationException("Non connecté");
        }
    }

    #[Route('/espaceResponsable', name: 'espace-responsable')]
    public function espaceR(ConseillerRepository $repository, SaisonRepository $saison): Response
    {
        // récupère la liste de tous les conseillers
        $conseillers = $repository->findAll();
        // récupère la saison (haute ou basse)
        $haute = $saison->getSaison()->getSaison();
        return $this->render('espaceResponsable/index.html.twig', [
            'conseillers' => $conseillers,
            'haute' => $haute,
        ]);
    }

    #[Route('/espaceResponsable/ListeDesRDV/{id}', name: 'liste_rdv_conseillers')]
    public function listeRDVC(Request $request, ConseillerRepository $conseillerRepository, RDVRepository $repository, SaisonRepository $saison, EntityManagerInterface $em, int $id): Response
    {
        // récupère le rendez-vous avec le conseiller de l'id passer en paramètre
        $lrdv = $repository->findBy(['Conseiller' => $id]);
        // récupère la liste de tous les conseillers
        $conseillers = $conseillerRepository->findAll();
        // récupère le conseiller avec l'id passer en paramètre
        $conseiller = $conseillerRepository->find($id);
        // récupère la saison (haute ou basse)
        $haute = $saison->getSaison()->getSaison();

        $form = $this->createForm(ModifierRDVResponsable::class, null, ['conseillers' => $conseillers, 'conseiller' => $conseiller]);
        // vérifie si il y a une requête et si le formulaire est valide
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            // récupère la date sélectionner dans le formulaire
            $date = $form->get("newDate")->getData();
            // récupère le rendez-vous à modifier
            $rdv = $repository->find($form->get("newId")->getData());
            // récupère le nouveau conseiller
            $cons = $conseillerRepository->find($form->get("nouveauConseiller")->getData());
            // affecte au rendez-vous le nouveau conseiller
            $rdv->setConseiller($cons);
            // affecte au rendez-vous le nouvel horaire
            $rdv->setHoraire(date_create_from_format("Y-m-d H:i:s", $date));
            $em->flush();
            return $this->redirect("/espaceResponsable/ListeDesRDV/{$id}");
        }

        return $this->render('espaceResponsable/listeRDV.html.twig', [
            'lrdv' => $lrdv,
            'conseiller' => $conseiller,
            'conseillers' => $conseillers,
            'haute' => $haute,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/espaceResponsable/miniCal/{id}', name: 'miniCal')]
    public function miniCal(ConseillerRepository $conseillerRepository, RDVRepository $repository, SaisonRepository $saison, int $id): Response
    {
        // récupère le rendez-vous avec le conseiller de l'id passer
        $lrdv = $repository->findBy(['Conseiller' => $id]);
        // récupère le conseiller avec l'id passer en paramètre
        $conseiller = $conseillerRepository->find($id);
        // récupère la date du dernier lundi
        $monday = new \DateTime("last Monday");
        // récupère la saison (haute ou basse)
        $haute = $saison->getSaison()->getSaison();
        return $this->render('espaceResponsable/miniCalendar.html.twig', [
            'lrdv' => $lrdv,
            'conseiller' => $conseiller,
            'haute' => $haute,
            'monday' =>$monday
        ]);
    }

    #[Route('/espaceResponsable/ListeDesRDV/{idC}/remove/{idR}', name: 'remove_rdv_conseillers')]
    public function removeRDVC(RDVRepository $repository, EntityManagerInterface $em, int $idC, int $idR): Response
    {
        // récupère le rendez-vous avec l'id passer en paramètre
        $rdv = $repository->find($idR);
        // supprime le rendez-vous de la base de donnée
        $em->remove($rdv);
        $em->flush();
        return $this->redirect("/espaceResponsable/ListeDesRDV/{$idC}");
    }

    #[Route('/espaceResponsable/modifSaison', name: 'modifSaison')]
    public function modifSaison(SaisonRepository $saison, EntityManagerInterface $manager): Response
    {
        // récupère la saison (haute ou basse)
        $saison = $saison->getSaison();
        // modifie la saison (inverse la saison)
        $saison->setSaison(!$saison->getSaison());
        $manager->flush();
        return $this->redirect("/espaceResponsable/");
    }
}
