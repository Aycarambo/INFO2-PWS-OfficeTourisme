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

class ResponsableController extends AbstractController
{
    #[Route('/espaceResponsable', name: 'espace-responsable')]
    public function espaceR(ConseillerRepository $repository, SaisonRepository $saison): Response
    {
        $conseillers = $repository->findAll();
        $haute = $saison->getSaison()->getSaison();
        return $this->render('espaceResponsable/index.html.twig', [
            'conseillers' => $conseillers,
            'haute' => $haute,
        ]);
    }

    #[Route('/espaceResponsable/ListeDesRDV/{id}', name: 'liste_rdv_conseillers')]
    public function listeRDVC(Request $request, ConseillerRepository $conseillerRepository, RDVRepository $repository, SaisonRepository $saison, EntityManagerInterface $em, int $id): Response
    {
        $lrdv = $repository->findBy(['Conseiller' => $id]);
        $conseillers = $conseillerRepository->findAll();
        $conseiller = $conseillerRepository->find($id);
        $haute = $saison->getSaison()->getSaison();
        $form = $this->createForm(ModifierRDVResponsable::class, null, ['conseillers' => $conseillers, 'conseiller' => $conseiller]);

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            $date = $form->get("newDate")->getData();

            $rdv = $repository->find($form->get("newId")->getData());
            $cons = $conseillerRepository->find($form->get("nouveauConseiller")->getData());
            $rdv->setConseiller($cons);
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
        $lrdv = $repository->findBy(['Conseiller' => $id]);
        $conseiller = $conseillerRepository->find($id);
        $monday = date_create_from_format("Y-m-d", "2021-10-11");
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
        $rdv = $repository->find($idR);
        $em->remove($rdv);
        $em->flush();
        return $this->redirect("/espaceResponsable/ListeDesRDV/{$idC}");
    }

    #[Route('/espaceResponsable/modifSaison', name: 'modifSaison')]
    public function modifSaison(SaisonRepository $saison, EntityManagerInterface $manager): Response
    {
        $saison = $saison->getSaison();

        $saison->setSaison(!$saison->getSaison());
        $manager->flush();
        return $this->redirect("/espaceResponsable/");
    }
}
