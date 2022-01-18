<?php

namespace App\Controller;


use App\Entity\RDV;
use App\Entity\Touriste;
use App\Repository\ConseillerRepository;
use App\Repository\RDVRepository;
use App\Repository\TouristeRepository;
use Doctrine\Persistence\ManagerRegistry;

use App\Domain\Command\SuppressionRdVCommand;
use App\Domain\Command\SuppressionRdVHandler;
use Doctrine\ORM\EntityManagerInterface;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
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
    public function demandeRDV(Request $request, ManagerRegistry $doctrine, ConseillerRepository $conseillerRepository, TouristeRepository $touristeRepository, RDVRepository $RDVRepository): Response
    {

        $rdv = new RDV();


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
            $rdv->setTouriste($this->utilisateurCourant($touristeRepository));
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
    public function removeRDVT(
        RDVRepository $repositoryRDV,
        TouristeRepository $repositoryTouriste,
        int $idR,
        SuppressionRdVHandler $handler
    ): Response
    {
        $touriste = $this->utilisateurCourant($repositoryTouriste);

        $commandeSuppression=new SuppressionRdVCommand($touriste->getId(),$idR);
        $handler->handle($commandeSuppression);

        return $this->redirectToRoute("mesRDVtouriste");
    }

}
