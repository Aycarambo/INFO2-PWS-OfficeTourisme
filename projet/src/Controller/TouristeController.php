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

        $rdv = new RDV();

        /*$jours = [
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
            'Vendredi 17h30' => "ve17:30:00",];*/
        $jour8h = ["Lundi" => "lu08:00:00", "Mardi" => "ma08:00:00", "mercredi" => "Me08:00:00", "Jeudi" => "je08:00:00", "Vendredi" => "ve08:00:00"];
        $jour8h30 = ["Lundi" => "lu08:30:00", "Mardi" => "ma08:30:00", "mercredi" => "Me08:30:00", "Jeudi" => "je08:30:00", "Vendredi" => "ve08:30:00"];
        $jour9h = ["Lundi" => "lu09:00:00", "Mardi" => "ma09:00:00", "mercredi" => "Me09:00:00", "Jeudi" => "je09:00:00", "Vendredi" => "ve09:00:00"];
        $jour9h30 = ["Lundi" => "lu09:30:00", "Mardi" => "ma09:30:00", "mercredi" => "Me09:30:00", "Jeudi" => "je09:30:00", "Vendredi" => "ve09:30:00"];
        $jour10h = ["Lundi" => "lu10:00:00", "Mardi" => "ma10:00:00", "mercredi" => "Me10:00:00", "Jeudi" => "je10:00:00", "Vendredi" => "ve10:00:00"];
        $jour10h30 = ["Lundi" => "lu10:30:00", "Mardi" => "ma10:30:00", "mercredi" => "Me10:30:00", "Jeudi" => "je10:30:00", "Vendredi" => "ve10:30:00"];
        $jour11h = ["Lundi" => "lu11:00:00", "Mardi" => "ma11:00:00", "mercredi" => "Me11:00:00", "Jeudi" => "je11:00:00", "Vendredi" => "ve11:00:00"];
        $jour11h30 = ["Lundi" => "lu11:30:00", "Mardi" => "ma11:30:00", "mercredi" => "Me11:30:00", "Jeudi" => "je11:30:00", "Vendredi" => "ve11:30:00"];
        $jour12h = ["Lundi" => "lu12:00:00", "Mardi" => "ma12:00:00", "mercredi" => "Me12:00:00", "Jeudi" => "je12:00:00", "Vendredi" => "ve12:00:00"];
        $jour12h30 = ["Lundi" => "lu12:30:00", "Mardi" => "ma12:30:00", "mercredi" => "Me12:30:00", "Jeudi" => "je12:30:00", "Vendredi" => "ve12:30:00"];
        $jour13h = ["Lundi" => "lu13:00:00", "Mardi" => "ma13:00:00", "mercredi" => "Me13:00:00", "Jeudi" => "je13:00:00", "Vendredi" => "ve13:00:00"];
        $jour13h30 = ["Lundi" => "lu13:30:00", "Mardi" => "ma13:30:00", "mercredi" => "Me13:30:00", "Jeudi" => "je13:30:00", "Vendredi" => "ve13:30:00"];
        $jour14h = ["Lundi" => "lu14:00:00", "Mardi" => "ma14:00:00", "mercredi" => "Me14:00:00", "Jeudi" => "je14:00:00", "Vendredi" => "ve14:00:00"];
        $jour14h30 = ["Lundi" => "lu14:30:00", "Mardi" => "ma14:30:00", "mercredi" => "Me14:30:00", "Jeudi" => "je14:30:00", "Vendredi" => "ve14:30:00"];
        $jour15h = ["Lundi" => "lu15:00:00", "Mardi" => "ma15:00:00", "mercredi" => "Me15:00:00", "Jeudi" => "je15:00:00", "Vendredi" => "ve15:00:00"];
        $jour15h30 = ["Lundi" => "lu15:30:00", "Mardi" => "ma15:30:00", "mercredi" => "Me15:30:00", "Jeudi" => "je15:30:00", "Vendredi" => "ve15:30:00"];
        $jour16h = ["Lundi" => "lu16:00:00", "Mardi" => "ma16:00:00", "mercredi" => "Me16:00:00", "Jeudi" => "je16:00:00", "Vendredi" => "ve16:00:00"];
        $jour16h30 = ["Lundi" => "lu16:30:00", "Mardi" => "ma16:30:00", "mercredi" => "Me16:30:00", "Jeudi" => "je16:30:00", "Vendredi" => "ve16:30:00"];
        $jour17h = ["Lundi" => "lu17:00:00", "Mardi" => "ma17:00:00", "mercredi" => "Me17:00:00", "Jeudi" => "je17:00:00", "Vendredi" => "ve17:00:00"];
        $jour17h30 = ["Lundi" => "lu17:30:00", "Mardi" => "ma17:30:00", "mercredi" => "Me17:30:00", "Jeudi" => "je17:30:00", "Vendredi" => "ve17:30:00"];
        $jours = ["8h" => $jour8h,
                "8h30" => $jour8h30,
                "9h" => $jour9h,
                "9h30" => $jour9h30,
                "10h" => $jour10h,
                "10h30" => $jour10h30,
                "11h" => $jour11h,
                "11h30" => $jour11h30,
                "12h" => $jour12h,
                "12h30" => $jour12h30,
                "13h" => $jour13h,
                "13h30" => $jour13h30,
                "14h" => $jour14h,
                "14h30" => $jour14h30,
                "15h" => $jour15h,
                "15h30" => $jour15h30,
                "16h" => $jour16h,
                "16h30" => $jour16h30,
                "17h" => $jour17h,
                "17h30" => $jour17h30,
        ];

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
            ->add('heures', ChoiceType::class, [
                'choices' => $jours,

                'placeholder' => 'Choisissez un horaire',
                'expanded' => true,
                'mapped' => false,
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
            $currentDayName = $currentDate->format('l');
            $currentDay = $currentDate->format('d');
            $currentMonth = $currentDate->format('m');
            $currentWeek = $currentDate->format('w');
            $currentYear = $currentDate->format('Y');


            $semaine = $form->get('semaine')->getData();
            $horaire = $form->get('heures')->getData();
            $day = $horaire[0];
            $day .= $horaire[1];
            $horaire = substr($horaire, 1);
            $horaire = substr($horaire, 1);
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
                if ($day == "lu")
                {
                    if ($currentDayName == "Monday")
                    {
                        $currentDay += 7;
                        $creneau = "$currentYear-$currentMonth-$currentDay $horaire";
                    }
                    if ($currentDayName == "Tuesday")
                    {
                        $currentDay += 6;
                        $creneau = "$currentYear-$currentMonth-$currentDay $horaire";
                    }
                    if ($currentDayName == "Wednesday")
                    {
                        $currentDay += 5;
                        $creneau = "$currentYear-$currentMonth-$currentDay $horaire";
                    }
                    if ($currentDayName == "Thursday")
                    {
                        $currentDay += 4;
                        $creneau = "$currentYear-$currentMonth-$currentDay $horaire";
                    }
                    if ($currentDayName == "Friday")
                    {
                        $currentDay += 3;
                        $creneau = "$currentYear-$currentMonth-$currentDay $horaire";
                    }
                }
                else if ($day == "ma")
                {
                    if ($currentDayName == "Monday")
                    {
                        $currentDay += 8;
                        $creneau = "$currentYear-$currentMonth-$currentDay $horaire";
                    }
                    if ($currentDayName == "Tuesday")
                    {
                        $currentDay += 7;
                        $creneau = "$currentYear-$currentMonth-$currentDay $horaire";
                    }
                    if ($currentDayName == "Wednesday")
                    {
                        $currentDay += 6;
                        $creneau = "$currentYear-$currentMonth-$currentDay $horaire";
                    }
                    if ($currentDayName == "Thursday")
                    {
                        $currentDay += 5;
                        $creneau = "$currentYear-$currentMonth-$currentDay $horaire";
                    }
                    if ($currentDayName == "Friday")
                    {
                        $currentDay += 4;
                        $creneau = "$currentYear-$currentMonth-$currentDay $horaire";
                    }
                }
                else if ($day == "me")
                {
                    if ($currentDayName == "Monday")
                    {
                        $currentDay += 9;
                        $creneau = "$currentYear-$currentMonth-$currentDay $horaire";
                    }
                    if ($currentDayName == "Tuesday")
                    {
                        $currentDay += 8;
                        $creneau = "$currentYear-$currentMonth-$currentDay $horaire";
                    }
                    if ($currentDayName == "Wednesday")
                    {
                        $currentDay += 7;
                        $creneau = "$currentYear-$currentMonth-$currentDay $horaire";
                    }
                    if ($currentDayName == "Thursday")
                    {
                        $currentDay += 6;
                        $creneau = "$currentYear-$currentMonth-$currentDay $horaire";
                    }
                    if ($currentDayName == "Friday")
                    {
                        $currentDay += 5;
                        $creneau = "$currentYear-$currentMonth-$currentDay $horaire";
                    }
                }
                else if ($day == "je")
                {
                    if ($currentDayName == "Monday")
                    {
                        $currentDay += 10;
                        $creneau = "$currentYear-$currentMonth-$currentDay $horaire";
                    }
                    if ($currentDayName == "Tuesday")
                    {
                        $currentDay += 9;
                        $creneau = "$currentYear-$currentMonth-$currentDay $horaire";
                    }
                    if ($currentDayName == "Wednesday")
                    {
                        $currentDay += 8;
                        $creneau = "$currentYear-$currentMonth-$currentDay $horaire";
                    }
                    if ($currentDayName == "Thursday")
                    {
                        $currentDay += 7;
                        $creneau = "$currentYear-$currentMonth-$currentDay $horaire";
                    }
                    if ($currentDayName == "Friday")
                    {
                        $currentDay += 6;
                        $creneau = "$currentYear-$currentMonth-$currentDay $horaire";
                    }
                }
                else if ($day == "ve")
                {
                    if ($currentDayName == "Monday")
                    {
                        $currentDay += 11;
                        $creneau = "$currentYear-$currentMonth-$currentDay $horaire";
                    }
                    if ($currentDayName == "Tuesday")
                    {
                        $currentDay += 10;
                        $creneau = "$currentYear-$currentMonth-$currentDay $horaire";
                    }
                    if ($currentDayName == "Wednesday")
                    {
                        $currentDay += 9;
                        $creneau = "$currentYear-$currentMonth-$currentDay $horaire";
                    }
                    if ($currentDayName == "Thursday")
                    {
                        $currentDay += 8;
                        $creneau = "$currentYear-$currentMonth-$currentDay $horaire";
                    }
                    if ($currentDayName == "Friday")
                    {
                        $currentDay += 7;
                        $creneau = "$currentYear-$currentMonth-$currentDay $horaire";
                    }
                }
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
            $conseiller = null;
            foreach($listeConseiller as $unConseiller)
            {
                if ($rdv->getLangue() == "fr")
                {
                    if (!(($unConseiller->getLanguesParlees() == "fr") or ($unConseiller->getLanguesParlees() == "fr;en") or ($unConseiller->getLanguesParlees() == "en;fr"))) // s'il ne parle pas la langue du rdv
                    {
                        $bonneLangue = false;
                    }
                }
                else if ($rdv->getLangue())
                {
                    if (!(($unConseiller->getLanguesParlees() == "en") or ($unConseiller->getLanguesParlees() == "fr;en") or ($unConseiller->getLanguesParlees() == "en;fr")))
                    {
                        $bonneLangue = false;
                    }
                }
                if ($bonneLangue == true)
                {
                    foreach ($listeRDV as $unRDV)
                    {
                        if ($rdv->getHoraire() == $unRDV->getHoraire())
                        {
                            if ($unConseiller->getNom() == $unRDV->getConseiller()->getNom())
                            {
                                if ($unConseiller->getPrenom() == $unRDV->getConseiller()->getPrenom())
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
                }
            }

            if ($conseiller != null)
            {
                $rdv->setConseiller($conseiller);
                $entityManager->persist($rdv);
                $entityManager->flush();
                return $this->redirectToRoute('espaceTouriste');
            }
            else
            {
                //echo "<script>alert(\"Aucun conseiller disponible pour cet horaire\")</script>";
                return $this->redirectToRoute('espaceTouriste');
            }
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
