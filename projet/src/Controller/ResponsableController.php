<?php

namespace App\Controller;

use App\Form\ModifierRDVResponsable;
use App\Repository\ConseillerRepository;
use App\Repository\SaisonRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Conseiller;
use App\Repository\RDVRepository;
use App\Entity\Saison;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

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
    public function listeRDVC(ConseillerRepository $conseillerRepository, RDVRepository $repository, SaisonRepository $saison, int $id): Response
    {
        $lrdv = $repository->findBy(['Conseiller' => $id]);
        $conseillers = $conseillerRepository->findAll();
        $conseiller = $conseillerRepository->find($id);
        $haute = $saison->getSaison()->getSaison();
        $form = $this->createForm(ModifierRDVResponsable::class, null, ['conseillers' => $conseillers, 'conseiller' => $conseiller]);
        return $this->render('espaceResponsable/listeRDV.html.twig', [
            'lrdv' => $lrdv,
            'conseiller' => $conseiller,
            'conseillers' => $conseillers,
            'haute' => $haute,
            'form' => $form->createView(),
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

    #[Route('/espaceResponsable/ListeDesRDV/{idC}/modify/{idR}/{NidC}', name: 'modify_rdv_conseillers')]
    public function modifyRDVC(RDVRepository $repository, ConseillerRepository $Crepository, EntityManagerInterface $em, int $idC, int $idR, int $NidC): Response
    {
        $rdv = $repository->find($idR);
        $cons = $Crepository->find($NidC);
        $rdv->setConseiller($cons);
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
