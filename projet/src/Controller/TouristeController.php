<?php

namespace App\Controller;

use App\Entity\RDV;
use App\Entity\Touriste;
use App\Repository\ConseillerRepository;
use App\Repository\RDVRepository;
use App\Repository\TouristeRepository;
use Doctrine\Persistence\ManagerRegistry;
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
    public function demandeRDV(Request $request, ManagerRegistry $doctrine, ConseillerRepository $conseillerRepository, TouristeRepository $touristeRepository, RDVRepository $RDVRepository): Response
    {
        $dateRDV = "la date";

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
            ->add('lienVisio', ChoiceType::class, [
                'choices' => [
                    'Lundi 8h00' => "lu08:00:00",
                    'Lundi 8h30' => "lu08:30:00",
                    'Lundi 9h00' => "lu09:00:00",
                    'Lundi 9h30' => "lu09:30:00",
                    'Lundi 10h00' => "lu10:00:00",
                    'Lundi 10h30' => "lu10:30:00",
                    'Lundi 11h00' => "lu11:00:00",
                    'Lundi 11h30' => "lu11:30:00",
                    'Lundi 12h00' => "lu12:00:00",
                    'Lundi 12h30' => "lu12:30:00",
                    'Lundi 13h00' => "lu13:00:00",
                    'Lundi 13h30' => "lu13:30:00",
                    'Lundi 14h00' => "lu14:00:00",
                    'Lundi 14h30' => "lu14:30:00",
                    'Lundi 15h00' => "lu15:00:00",
                    'Lundi 15h30' => "lu15:30:00",
                    'Lundi 16h00' => "lu16:00:00",
                    'Lundi 16h30' => "lu16:30:00",
                    'Lundi 17h00' => "lu17:00:00",
                    'Lundi 17h30' => "lu17:30:00",
                    'Mardi 8h00' => "ma08:00:00",
                    'Mardi 8h30' => "ma08:30:00",
                    'Mardi 9h00' => "ma09:00:00",
                    'Mardi 9h30' => "ma09:30:00",
                    'Mardi 10h00' => "ma10:00:00",
                    'Mardi 10h30' => "ma10:30:00",
                    'Mardi 11h00' => "ma11:00:00",
                    'Mardi 11h30' => "ma11:30:00",
                    'Mardi 12h00' => "ma12:00:00",
                    'Mardi 12h30' => "ma12:30:00",
                    'Mardi 13h00' => "ma13:00:00",
                    'Mardi 13h30' => "ma13:30:00",
                    'Mardi 14h00' => "ma14:00:00",
                    'Mardi 14h30' => "ma14:30:00",
                    'Mardi 15h00' => "ma15:00:00",
                    'Mardi 15h30' => "ma15:30:00",
                    'Mardi 16h00' => "ma16:00:00",
                    'Mardi 16h30' => "ma16:30:00",
                    'Mardi 17h00' => "ma17:00:00",
                    'Mardi 17h30' => "ma17:30:00",
                    'Mercredi 8h00' => "me08:00:00",
                    'Mercredi 8h30' => "me08:30:00",
                    'Mercredi 9h00' => "me09:00:00",
                    'Mercredi 9h30' => "me09:30:00",
                    'Mercredi 10h00' => "me10:00:00",
                    'Mercredi 10h30' => "me10:30:00",
                    'Mercredi 11h00' => "me11:00:00",
                    'Mercredi 11h30' => "me11:30:00",
                    'Mercredi 12h00' => "me12:00:00",
                    'Mercredi 12h30' => "me12:30:00",
                    'Mercredi 13h00' => "me13:00:00",
                    'Mercredi 13h30' => "me13:30:00",
                    'Mercredi 14h00' => "me14:00:00",
                    'Mercredi 14h30' => "me14:30:00",
                    'Mercredi 15h00' => "me15:00:00",
                    'Mercredi 15h30' => "me15:30:00",
                    'Mercredi 16h00' => "me16:00:00",
                    'Mercredi 16h30' => "me16:30:00",
                    'Mercredi 17h00' => "me17:00:00",
                    'Mercredi 17h30' => "me17:30:00",
                    'Jeudi 8h00' => "je08:00:00",
                    'Jeudi 8h30' => "je08:30:00",
                    'Jeudi 9h00' => "je09:00:00",
                    'Jeudi 9h30' => "je09:30:00",
                    'Jeudi 10h00' => "je10:00:00",
                    'Jeudi 10h30' => "je10:30:00",
                    'Jeudi 11h00' => "je11:00:00",
                    'Jeudi 11h30' => "je11:30:00",
                    'Jeudi 12h00' => "je12:00:00",
                    'Jeudi 12h30' => "je12:30:00",
                    'Jeudi 13h00' => "je13:00:00",
                    'Jeudi 13h30' => "je13:30:00",
                    'Jeudi 14h00' => "je14:00:00",
                    'Jeudi 14h30' => "je14:30:00",
                    'Jeudi 15h00' => "je15:00:00",
                    'Jeudi 15h30' => "je15:30:00",
                    'Jeudi 16h00' => "je16:00:00",
                    'Jeudi 16h30' => "je16:30:00",
                    'Jeudi 17h00' => "je17:00:00",
                    'Jeudi 17h30' => "je17:30:00",
                    'Vendredi 8h00' => "ve08:00:00",
                    'Vendredi 8h30' => "ve08:30:00",
                    'Vendredi 9h00' => "ve09:00:00",
                    'Vendredi 9h30' => "ve09:30:00",
                    'Vendredi 10h00' => "ve10:00:00",
                    'Vendredi 10h30' => "ve10:30:00",
                    'Vendredi 11h00' => "ve11:00:00",
                    'Vendredi 11h30' => "ve11:30:00",
                    'Vendredi 12h00' => "ve12:00:00",
                    'Vendredi 12h30' => "ve12:30:00",
                    'Vendredi 13h00' => "ve13:00:00",
                    'Vendredi 13h30' => "ve13:30:00",
                    'Vendredi 14h00' => "ve14:00:00",
                    'Vendredi 14h30' => "ve14:00:30",
                    'Vendredi 15h00' => "ve15:00:00",
                    'Vendredi 15h30' => "ve15:30:00",
                    'Vendredi 16h00' => "ve16:08:00",
                    'Vendredi 16h30' => "ve16:30:00",
                    'Vendredi 17h00' => "ve17:00:00",
                    'Vendredi 17h30' => "ve17:30:00",],

                'placeholder' => 'Choisissez une langue',
                'expanded' => true,
            ],
            )

            ->add('Valider', SubmitType::class)
            ->getForm();


        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $rdv = $form->getData();

            $creneau = ""; // Initialisation

            date_default_timezone_set("Europe/Paris");
            $currentDate = new \DateTime('now');
            $currentDayName = $currentDate->format('d');
            $currentMonth = $currentDate->format('m');
            $currentWeek = $currentDate->format('w');
            $currentYear = $currentDate->format('Y');


            $semaine = $form->get('semaine')->getData();
            $horaire = $form->get('lienVisio')->getData();
            $day = $horaire[0];
            $day .= $horaire[1];
            substr($horaire, 1);
            substr($horaire, 1);
            if ($semaine == "CS")//Cette semaine
            {
                if ($day == "lu")
                {
                    if ($currentDayName == "Monday")
                    {
                        $creneau = "$currentYear-$currentMonth-$currentDay $horaire";
                    }
                    if ($currentDayName == "Tuesday")
                    {
                        $currentDay -= 1;
                        $creneau = "$currentYear-$currentMonth-$currentDay $horaire";
                    }
                    if ($currentDayName == "Wednesday")
                    {
                        $currentDay -= 2;
                        $creneau = "$currentYear-$currentMonth-$currentDay $horaire";
                    }
                    if ($currentDayName == "Thursday")
                    {
                        $currentDay -= 3;
                        $creneau = "$currentYear-$currentMonth-$currentDay $horaire";
                    }
                    if ($currentDayName == "Friday")
                    {
                        $currentDay -= 4;
                        $creneau = "$currentYear-$currentMonth-$currentDay $horaire";
                    }
                }
                else if ($day == "ma")
                {
                    if ($currentDayName == "Monday")
                    {
                        $currentDay += 1;
                        $creneau = "$currentYear-$currentMonth-$currentDay $horaire";
                    }
                    if ($currentDayName == "Tuesday")
                    {
                        $creneau = "$currentYear-$currentMonth-$currentDay $horaire";
                    }
                    if ($currentDayName == "Wednesday")
                    {
                        $currentDay -= 1;
                        $creneau = "$currentYear-$currentMonth-$currentDay $horaire";
                    }
                    if ($currentDayName == "Thursday")
                    {
                        $currentDay -= 2;
                        $creneau = "$currentYear-$currentMonth-$currentDay $horaire";
                    }
                    if ($currentDayName == "Friday")
                    {
                        $currentDay -= 3;
                        $creneau = "$currentYear-$currentMonth-$currentDay $horaire";
                    }
                }
                else if ($day == "me")
                {
                    if ($currentDayName == "Monday")
                    {
                        $currentDay += 2;
                        $creneau = "$currentYear-$currentMonth-$currentDay $horaire";
                    }
                    if ($currentDayName == "Tuesday")
                    {
                        $currentDay += 1;
                        $creneau = "$currentYear-$currentMonth-$currentDay $horaire";
                    }
                    if ($currentDayName == "Wednesday")
                    {
                        $creneau = "$currentYear-$currentMonth-$currentDay $horaire";
                    }
                    if ($currentDayName == "Thursday")
                    {
                        $currentDay -= 1;
                        $creneau = "$currentYear-$currentMonth-$currentDay $horaire";
                    }
                    if ($currentDayName == "Friday")
                    {
                        $currentDay -= 2;
                        $creneau = "$currentYear-$currentMonth-$currentDay $horaire";
                    }
                }
                else if ($day == "je")
                {
                    if ($currentDayName == "Monday")
                    {
                        $currentDay += 3;
                        $creneau = "$currentYear-$currentMonth-$currentDay $horaire";
                    }
                    if ($currentDayName == "Tuesday")
                    {
                        $currentDay += 2;
                        $creneau = "$currentYear-$currentMonth-$currentDay $horaire";
                    }
                    if ($currentDayName == "Wednesday")
                    {
                        $currentDay += 1;
                        $creneau = "$currentYear-$currentMonth-$currentDay $horaire";
                    }
                    if ($currentDayName == "Thursday")
                    {
                        $creneau = "$currentYear-$currentMonth-$currentDay $horaire";
                    }
                    if ($currentDayName == "Friday")
                    {
                        $currentDay -= 1;
                        $creneau = "$currentYear-$currentMonth-$currentDay $horaire";
                    }
                }
                else if ($day == "ve")
                {
                    if ($currentDayName == "Monday")
                    {
                        $currentDay += 4;
                        $creneau = "$currentYear-$currentMonth-$currentDay $horaire";
                    }
                    if ($currentDayName == "Tuesday")
                    {
                        $currentDay += 3;
                        $creneau = "$currentYear-$currentMonth-$currentDay $horaire";
                    }
                    if ($currentDayName == "Wednesday")
                    {
                        $currentDay += 2;
                        $creneau = "$currentYear-$currentMonth-$currentDay $horaire";
                    }
                    if ($currentDayName == "Thursday")
                    {
                        $currentDay += 1;
                        $creneau = "$currentYear-$currentMonth-$currentDay $horaire";
                    }
                    if ($currentDayName == "Friday")
                    {
                        $creneau = "$currentYear-$currentMonth-$currentDay $horaire";
                    }
                }
            }
            else if ($semaine == "SP")//Semaine prochaine
            {

            }

            $entityManager = $doctrine->getManager();

            $rdv->setHoraire(new \DateTime($creneau));
            $rdv->setLangue($form->get('langue')->getData());
            $rdv->setTouriste($touristeRepository->find(1));//utiliser $this->utilisateurCourant($touristeRepository);
            $rdv->setLienVisio('google.com');

            $listeRDV = $RDVRepository->findAll();
            $listeConseiller = $conseillerRepository->findAll();

            $conseillerLibre = true;
            $bonneLangue = true;
            $conseiller = $conseillerRepository->find(1);
            foreach($listeConseiller as $unConseiller)
            {
                if ($unConseiller->getLanguesParlees() != $rdv->getLangue()) // s'il parle la langue du rdv
                {
                    $bonneLangue = false;
                }
                else
                {
                    foreach ($listeRDV as $unRDV)
                    {
                        if ($rdv->getHoraire() == $unRDV->getHoraire())
                        {
                            if ($unConseiller->getNom())
                            {
                                if ($unConseiller->getPrenom())
                                {
                                    $conseillerLibre = false;
                                }
                            }
                        }
                    }
                }
                if ($conseillerLibre == true and $bonneLangue == true)
                {
                    $conseiller = $unConseiller;
                    break;
                }
            }


            $rdv->setConseiller($conseiller);

            $entityManager->persist($rdv);
            $entityManager->flush();

            return $this->redirectToRoute('espaceTouriste');
        }

        return $this->render('touriste/demandeRDV.html.twig', [
            'form' => $form->createView(),
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
}
