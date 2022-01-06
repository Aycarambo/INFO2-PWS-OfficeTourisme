<?php

namespace App\Controller;

use App\Entity\RDV;
use App\Repository\RDVRepository;
use App\Repository\TouristeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
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
        $dateRDV = "la date";
        return $this->render('touriste/demandeRDV.html.twig', [
            'post' => $_POST,
            'dateRDV' => $dateRDV,
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

    #[Route('/espaceTouriste/validationRDV', name: 'ValidationRDV')]
    public function validerRDV(Request $request): Response
    {
        $rdv = new RDV();

        $form = $this->createFormBuilder($rdv)
            ->add('semaine', ChoiceType::class, [
                'choices' => [
                    'Cette semaine' => "CS",
                    'Semaine Prochaine' => "SP",],
                'mapped' => false,
            ],
            )
            ->add('langue', ChoiceType::class, [
                'choices' => [
                    'Français' => "fr",
                    'English' => "en",],
                'placeholder' => 'Choisissez une langue',
            ],
            )
            ->add('horaire', ChoiceType::class, [
                'choices' => [
                    'Lundi 8h00' => "l8",
                    'Lundi 8h30' => "l830",
                    'Lundi 9h00' => "l9",
                    'Lundi 9h30' => "l930",
                    'Lundi 10h00' => "l10",
                    'Lundi 10h30' => "l1030",
                    'Lundi 11h00' => "l11",
                    'Lundi 11h30' => "l1130",
                    'Lundi 12h00' => "l12",
                    'Lundi 12h30' => "l1230",
                    'Lundi 13h00' => "l13",
                    'Lundi 13h30' => "l1330",
                    'Lundi 14h00' => "l14",
                    'Lundi 14h30' => "l1430",
                    'Lundi 15h00' => "l15",
                    'Lundi 15h30' => "l1530",
                    'Lundi 16h00' => "l168",
                    'Lundi 16h30' => "l1630",
                    'Lundi 17h00' => "l17",
                    'Lundi 17h30' => "l1730",
                    'Mardi 8h00' => "ma8",
                    'Mardi 8h30' => "ma830",
                    'Mardi 9h00' => "ma9",
                    'Mardi 9h30' => "ma930",
                    'Mardi 10h00' => "ma10",
                    'Mardi 10h30' => "ma1030",
                    'Mardi 11h00' => "ma11",
                    'Mardi 11h30' => "ma1130",
                    'Mardi 12h00' => "ma12",
                    'Mardi 12h30' => "ma1230",
                    'Mardi 13h00' => "ma13",
                    'Mardi 13h30' => "ma1330",
                    'Mardi 14h00' => "ma14",
                    'Mardi 14h30' => "ma1430",
                    'Mardi 15h00' => "ma15",
                    'Mardi 15h30' => "ma1530",
                    'Mardi 16h00' => "ma168",
                    'Mardi 16h30' => "ma1630",
                    'Mardi 17h00' => "ma17",
                    'Mardi 17h30' => "ma1730",
                    'Mercredi 8h00' => "me8",
                    'Mercredi 8h30' => "me830",
                    'Mercredi 9h00' => "me9",
                    'Mercredi 9h30' => "me930",
                    'Mercredi 10h00' => "me10",
                    'Mercredi 10h30' => "me1030",
                    'Mercredi 11h00' => "me11",
                    'Mercredi 11h30' => "me1130",
                    'Mercredi 12h00' => "me12",
                    'Mercredi 12h30' => "me1230",
                    'Mercredi 13h00' => "me13",
                    'Mercredi 13h30' => "me1330",
                    'Mercredi 14h00' => "me14",
                    'Mercredi 14h30' => "me1430",
                    'Mercredi 15h00' => "me15",
                    'Mercredi 15h30' => "me1530",
                    'Mercredi 16h00' => "me168",
                    'Mercredi 16h30' => "me1630",
                    'Mercredi 17h00' => "me17",
                    'Mercredi 17h30' => "me1730",
                    'Jeudi 8h00' => "j8",
                    'Jeudi 8h30' => "j830",
                    'Jeudi 9h00' => "j9",
                    'Jeudi 9h30' => "j930",
                    'Jeudi 10h00' => "j10",
                    'Jeudi 10h30' => "j1030",
                    'Jeudi 11h00' => "j11",
                    'Jeudi 11h30' => "j1130",
                    'Jeudi 12h00' => "j12",
                    'Jeudi 12h30' => "j1230",
                    'Jeudi 13h00' => "j13",
                    'Jeudi 13h30' => "j1330",
                    'Jeudi 14h00' => "j14",
                    'Jeudi 14h30' => "j1430",
                    'Jeudi 15h00' => "j15",
                    'Jeudi 15h30' => "j1530",
                    'Jeudi 16h00' => "j168",
                    'Jeudi 16h30' => "j1630",
                    'Jeudi 17h00' => "j17",
                    'Jeudi 17h30' => "j1730",
                    'Vendredi 8h00' => "v8",
                    'Vendredi 8h30' => "v830",
                    'Vendredi 9h00' => "v9",
                    'Vendredi 9h30' => "v930",
                    'Vendredi 10h00' => "v10",
                    'Vendredi 10h30' => "v1030",
                    'Vendredi 11h00' => "v11",
                    'Vendredi 11h30' => "v1130",
                    'Vendredi 12h00' => "v12",
                    'Vendredi 12h30' => "v1230",
                    'Vendredi 13h00' => "v13",
                    'Vendredi 13h30' => "v1330",
                    'Vendredi 14h00' => "v14",
                    'Vendredi 14h30' => "v1430",
                    'Vendredi 15h00' => "v15",
                    'Vendredi 15h30' => "v1530",
                    'Vendredi 16h00' => "v168",
                    'Vendredi 16h30' => "v1630",
                    'Vendredi 17h00' => "v17",
                    'Vendredi 17h30' => "v1730",],

                'placeholder' => 'Choisissez une langue',
                'expanded' => true,
            ],
            )
            ->add('save', SubmitType::class)
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $task = $form->getData();

            $rdv->setConseiller(1);
            $rdv->setTouriste(1);
            $horaire = '10/12/2021 08:00:00';
            $rdv->setHoraire(new \DateTime($horaire));
            $rdv->setLienVisio('google.com');
            $manager->persist($rdv);

            return $this->redirectToRoute('espaceTouriste');
        }

        return $this->render('touriste/demandeRDV.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
