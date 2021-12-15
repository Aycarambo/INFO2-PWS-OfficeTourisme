<?php

namespace App\Controller;

use App\Repository\RDVRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ConseillerController extends AbstractController
{
    #[Route('/espaceConseiller', name: 'conseiller')]
    public function espaceConseiller(): Response
    {
        return $this->render('conseiller/index.html.twig', [
            'controller_name' => 'ConseillerController',
        ]);
    }
    #[Route('/espaceConseiller/MesRDV', name: 'conseillerRDV')]
    public function conseillerRDV(RDVRepository $aRepository,): Response
    {
        date_default_timezone_set("Europe/Paris");
        $id = 1;
        $date = 'now'|date('Y/m/d');

        $mois = $date|date('m');
        $semaine = $date|date('w');

        $annee = $date|date('Y');

        $jour = $date|date('l');

        $lundi = $date|date('d');
        $mardi = $date|date('d');
        $mercredi = $date|date('d');
        $jeudi = $date|date('d');
        $vendredi = $date|date('d');

        if($jour == "Monday")
        {
            date_modify($mardi, '+1 day');
            date_modify($mercredi, '+2 day');
            date_modify($jeudi, '+3 day');
            date_modify($vendredi, '+4 day');
        }
        else if($jour == "Tuesday")
        {
            date_modify($lundi, '-1 day');
            date_modify($mercredi, '+1 day');
            date_modify($jeudi, '+2 day');
            date_modify($vendredi, '+3 day');
        }
        else if($jour == "Wednesday")
        {
            date_modify($lundi, '-2 day');
            date_modify($mardi, '-1 day');
            date_modify($jeudi, '+1 day');
            date_modify($vendredi, '+2 day');
        }
        else if($jour == "Thursday")
        {
            date_modify($lundi, '-3 day');
            date_modify($mardi, '-2 day');
            date_modify($mercredi, '-1 day');
            date_modify($vendredi, '+1 day');
        }
        else if($jour == "Friday")
        {
            date_modify($lundi, '-4 day');
            date_modify($mardi, '-3 day');
            date_modify($mercredi, '-2 day');
            date_modify($jeudi, '-1 day');
        }
        else if($jour == "Saturday")
        {
            date_modify($lundi, '-5 day');
            date_modify($mardi, '-4 day');
            date_modify($mercredi, '-3 day');
            date_modify($jeudi, '-2 day');
            date_modify($vendredi, '-1 day');
        }
        else if($jour == "Sunday")
        {
            date_modify($lundi, '-6 day');
            date_modify($mardi, '-5 day');
            date_modify($mercredi, '-4 day');
            date_modify($jeudi, '-3 day');
            date_modify($vendredi, '-2 day');
        }

        if('22' < $semaine and $semaine < '35')
        {
            $saisonHaute = true;
        }
        else
        {
            $saisonHaute = false;
        }
        if($saisonHaute)
        {
            $L8h = $aRepository->findRDV($id, "$annee-$mois-$lundi 08:00:00");
            $L8h30 = $aRepository->findRDV($id, "$annee-$mois-$lundi 08:30:00");
            $L9h = $aRepository->findRDV($id, "$annee-$mois-$lundi 09:00:00");
            $L9h30 = $aRepository->findRDV($id, "$annee-$mois-$lundi 09:30:00");
            $L10h = $aRepository->findRDV($id, "$annee-$mois-$lundi 10:00:00");
            $L10h30 = $aRepository->findRDV($id, "$annee-$mois-$lundi 10:30:00");
            $L11h = $aRepository->findRDV($id, "$annee-$mois-$lundi 11:00:00");
            $L11h30 = $aRepository->findRDV($id, "$annee-$mois-$lundi 11:30:00");
            $L12h = $aRepository->findRDV($id, "$annee-$mois-$lundi 12:00:00");
            $L12h30 = $aRepository->findRDV($id, "$annee-$mois-$lundi 12:30:00");
            $L13h = $aRepository->findRDV($id, "$annee-$mois-$lundi 13:00:00");
            $L13h30 = $aRepository->findRDV($id, "$annee-$mois-$lundi 13:30:00");
            $L14h = $aRepository->findRDV($id, "$annee-$mois-$lundi 14:00:00");
            $L14h30 = $aRepository->findRDV($id, "$annee-$mois-$lundi 14:30:00");
            $L15h = $aRepository->findRDV($id, "$annee-$mois-$lundi 15:00:00");
            $L15h30 = $aRepository->findRDV($id, "$annee-$mois-$lundi 15:30:00");
            $L16h = $aRepository->findRDV($id, "$annee-$mois-$lundi 16:00:00");
            $L16h30 = $aRepository->findRDV($id, "$annee-$mois-$lundi 16:30:00");
            $L17h = $aRepository->findRDV($id, "$annee-$mois-$lundi 17:00:00");
            $L17h30 = $aRepository->findRDV($id, "$annee-$mois-$lundi 17:30:00");
            $L18h = $aRepository->findRDV($id, "$annee-$mois-$lundi 18:00:00");
            $L18h30 = $aRepository->findRDV($id, "$annee-$mois-$lundi 18:30:00");
            $L19h = $aRepository->findRDV($id, "$annee-$mois-$lundi 19:00:00");
            $L19h30 = $aRepository->findRDV($id, "$annee-$mois-$lundi 19:30:00");
            $L20h = $aRepository->findRDV($id, "$annee-$mois-$lundi 20:00:00");

            $Ma8h = $aRepository->findRDV($id, "$annee-$mois-$mardi 08:00:00");
            $Ma8h30 = $aRepository->findRDV($id, "$annee-$mois-$mardi 08:30:00");
            $Ma9h = $aRepository->findRDV($id, "$annee-$mois-$mardi 09:00:00");
            $Ma9h30 = $aRepository->findRDV($id, "$annee-$mois-$mardi 09:30:00");
            $Ma10h = $aRepository->findRDV($id, "$annee-$mois-$mardi 10:00:00");
            $Ma10h30 = $aRepository->findRDV($id, "$annee-$mois-$mardi 10:30:00");
            $Ma11h = $aRepository->findRDV($id, "$annee-$mois-$mardi 11:00:00");
            $Ma11h30 = $aRepository->findRDV($id, "$annee-$mois-$mardi 11:30:00");
            $Ma12h = $aRepository->findRDV($id, "$annee-$mois-$mardi 12:00:00");
            $Ma12h30 = $aRepository->findRDV($id, "$annee-$mois-$mardi 12:30:00");
            $Ma13h = $aRepository->findRDV($id, "$annee-$mois-$mardi 13:00:00");
            $Ma13h30 = $aRepository->findRDV($id, "$annee-$mois-$mardi 13:30:00");
            $Ma14h = $aRepository->findRDV($id, "$annee-$mois-$mardi 14:00:00");
            $Ma14h30 = $aRepository->findRDV($id, "$annee-$mois-$mardi 14:30:00");
            $Ma15h = $aRepository->findRDV($id, "$annee-$mois-$mardi 15:00:00");
            $Ma15h30 = $aRepository->findRDV($id, "$annee-$mois-$mardi 15:30:00");
            $Ma16h = $aRepository->findRDV($id, "$annee-$mois-$mardi 16:00:00");
            $Ma16h30 = $aRepository->findRDV($id, "$annee-$mois-$mardi 16:30:00");
            $Ma17h = $aRepository->findRDV($id, "$annee-$mois-$mardi 17:00:00");
            $Ma17h30 = $aRepository->findRDV($id, "$annee-$mois-$mardi 17:30:00");
            $Ma18h = $aRepository->findRDV($id, "$annee-$mois-$mardi 18:00:00");
            $Ma18h30 = $aRepository->findRDV($id, "$annee-$mois-$mardi 18:30:00");
            $Ma19h = $aRepository->findRDV($id, "$annee-$mois-$mardi 19:00:00");
            $Ma19h30 = $aRepository->findRDV($id, "$annee-$mois-$mardi 19:30:00");
            $Ma20h = $aRepository->findRDV($id, "$annee-$mois-$mardi 20:00:00");

            $Me8h = $aRepository->findRDV($id, "$annee-$mois-$mercredi 08:00:00");
            $Me8h30 = $aRepository->findRDV($id, "$annee-$mois-$mercredi 08:30:00");
            $Me9h = $aRepository->findRDV($id, "$annee-$mois-$mercredi 09:00:00");
            $Me9h30 = $aRepository->findRDV($id, "$annee-$mois-$mercredi 09:30:00");
            $Me10h = $aRepository->findRDV($id, "$annee-$mois-$mercredi 10:00:00");
            $Me10h30 = $aRepository->findRDV($id, "$annee-$mois-$mercredi 10:30:00");
            $Me11h = $aRepository->findRDV($id, "$annee-$mois-$mercredi 11:00:00");
            $Me11h30 = $aRepository->findRDV($id, "$annee-$mois-$mercredi 11:30:00");
            $Me12h = $aRepository->findRDV($id, "$annee-$mois-$mercredi 12:00:00");
            $Me12h30 = $aRepository->findRDV($id, "$annee-$mois-$mercredi 12:30:00");
            $Me13h = $aRepository->findRDV($id, "$annee-$mois-$mercredi 13:00:00");
            $Me13h30 = $aRepository->findRDV($id, "$annee-$mois-$mercredi 13:30:00");
            $Me14h = $aRepository->findRDV($id, "$annee-$mois-$mercredi 14:00:00");
            $Me14h30 = $aRepository->findRDV($id, "$annee-$mois-$mercredi 14:30:00");
            $Me15h = $aRepository->findRDV($id, "$annee-$mois-$mercredi 15:00:00");
            $Me15h30 = $aRepository->findRDV($id, "$annee-$mois-$mercredi 15:30:00");
            $Me16h = $aRepository->findRDV($id, "$annee-$mois-$mercredi 16:00:00");
            $Me16h30 = $aRepository->findRDV($id, "$annee-$mois-$mercredi 16:30:00");
            $Me17h = $aRepository->findRDV($id, "$annee-$mois-$mercredi 17:00:00");
            $Me17h30 = $aRepository->findRDV($id, "$annee-$mois-$mercredi 17:30:00");
            $Me18h = $aRepository->findRDV($id, "$annee-$mois-$mercredi 18:00:00");
            $Me18h30 = $aRepository->findRDV($id, "$annee-$mois-$mercredi 18:30:00");
            $Me19h = $aRepository->findRDV($id, "$annee-$mois-$mercredi 19:00:00");
            $Me19h30 = $aRepository->findRDV($id, "$annee-$mois-$mercredi 19:30:00");
            $Me20h = $aRepository->findRDV($id, "$annee-$mois-$mercredi 20:00:00");

            $J8h = $aRepository->findRDV($id, "$annee-$mois-$jeudi 08:00:00");
            $J8h30 = $aRepository->findRDV($id, "$annee-$mois-$jeudi 08:30:00");
            $J9h = $aRepository->findRDV($id, "$annee-$mois-$jeudi 09:00:00");
            $J9h30 = $aRepository->findRDV($id, "$annee-$mois-$jeudi 09:30:00");
            $J10h = $aRepository->findRDV($id, "$annee-$mois-$jeudi 10:00:00");
            $J10h30 = $aRepository->findRDV($id, "$annee-$mois-$jeudi 10:30:00");
            $J11h = $aRepository->findRDV($id, "$annee-$mois-$jeudi 11:00:00");
            $J11h30 = $aRepository->findRDV($id, "$annee-$mois-$jeudi 11:30:00");
            $J12h = $aRepository->findRDV($id, "$annee-$mois-$jeudi 12:00:00");
            $J12h30 = $aRepository->findRDV($id, "$annee-$mois-$jeudi 12:30:00");
            $J13h = $aRepository->findRDV($id, "$annee-$mois-$jeudi 13:00:00");
            $J13h30 = $aRepository->findRDV($id, "$annee-$mois-$jeudi 13:30:00");
            $J14h = $aRepository->findRDV($id, "$annee-$mois-$jeudi 14:00:00");
            $J14h30 = $aRepository->findRDV($id, "$annee-$mois-$jeudi 14:30:00");
            $J15h = $aRepository->findRDV($id, "$annee-$mois-$jeudi 15:00:00");
            $J15h30 = $aRepository->findRDV($id, "$annee-$mois-$jeudi 15:30:00");
            $J16h = $aRepository->findRDV($id, "$annee-$mois-$jeudi 16:00:00");
            $J16h30 = $aRepository->findRDV($id, "$annee-$mois-$jeudi 16:30:00");
            $J17h = $aRepository->findRDV($id, "$annee-$mois-$jeudi 17:00:00");
            $J17h30 = $aRepository->findRDV($id, "$annee-$mois-$jeudi 17:30:00");
            $J18h = $aRepository->findRDV($id, "$annee-$mois-$jeudi 18:00:00");
            $J18h30 = $aRepository->findRDV($id, "$annee-$mois-$jeudi 18:30:00");
            $J19h = $aRepository->findRDV($id, "$annee-$mois-$jeudi 19:00:00");
            $J19h30 = $aRepository->findRDV($id, "$annee-$mois-$jeudi 19:30:00");
            $J20h = $aRepository->findRDV($id, "$annee-$mois-$jeudi 20:00:00");

            $V8h = $aRepository->findRDV($id, "$annee-$mois-$vendredi 08:00:00");
            $V8h30 = $aRepository->findRDV($id, "$annee-$mois-$vendredi 08:30:00");
            $V9h = $aRepository->findRDV($id, "$annee-$mois-$vendredi 09:00:00");
            $V9h30 = $aRepository->findRDV($id, "$annee-$mois-$vendredi 09:30:00");
            $V10h = $aRepository->findRDV($id, "$annee-$mois-$vendredi 10:00:00");
            $V10h30 = $aRepository->findRDV($id, "$annee-$mois-$vendredi 10:30:00");
            $V11h = $aRepository->findRDV($id, "$annee-$mois-$vendredi 11:00:00");
            $V11h30 = $aRepository->findRDV($id, "$annee-$mois-$vendredi 11:30:00");
            $V12h = $aRepository->findRDV($id, "$annee-$mois-$vendredi 12:00:00");
            $V12h30 = $aRepository->findRDV($id, "$annee-$mois-$vendredi 12:30:00");
            $V13h = $aRepository->findRDV($id, "$annee-$mois-$vendredi 13:00:00");
            $V13h30 = $aRepository->findRDV($id, "$annee-$mois-$vendredi 13:30:00");
            $V14h = $aRepository->findRDV($id, "$annee-$mois-$vendredi 14:00:00");
            $V14h30 = $aRepository->findRDV($id, "$annee-$mois-$vendredi 14:30:00");
            $V15h = $aRepository->findRDV($id, "$annee-$mois-$vendredi 15:00:00");
            $V15h30 = $aRepository->findRDV($id, "$annee-$mois-$vendredi 15:30:00");
            $V16h = $aRepository->findRDV($id, "$annee-$mois-$vendredi 16:00:00");
            $V16h30 = $aRepository->findRDV($id, "$annee-$mois-$vendredi 16:30:00");
            $V17h = $aRepository->findRDV($id, "$annee-$mois-$vendredi 17:00:00");
            $V17h30 = $aRepository->findRDV($id, "$annee-$mois-$vendredi 17:30:00");
            $V18h = $aRepository->findRDV($id, "$annee-$mois-$vendredi 18:00:00");
            $V18h30 = $aRepository->findRDV($id, "$annee-$mois-$vendredi 18:30:00");
            $V19h = $aRepository->findRDV($id, "$annee-$mois-$vendredi 19:00:00");
            $V19h30 = $aRepository->findRDV($id, "$annee-$mois-$vendredi 19:30:00");
            $V20h = $aRepository->findRDV($id, "$annee-$mois-$vendredi 20:00:00");

            return $this->render('conseiller/rdv.html.twig', [
                'controller_name' => 'ConseillerController',
                'L8h' => $L8h,
                'L8h30' => $L8h30,
                'L9h' => $L9h,
                'L9h30' => $L9h30,
                'L10h' => $L10h,
                'L10h30' => $L10h30,
                'L11h' => $L11h,
                'L11h30' => $L11h30,
                'L12h' => $L12h,
                'L12h30' => $L12h30,
                'L13h' => $L13h,
                'L13h30' => $L13h30,
                'L14h' => $L14h,
                'L14h30' => $L14h30,
                'L15h' => $L15h,
                'L15h30' => $L15h30,
                'L16h' => $L16h,
                'L16h30' => $L16h30,
                'L17h' => $L17h,
                'L17h30' => $L17h30,
                'L18h' => $L18h,
                'L18h30' => $L18h30,
                'L19h' => $L19h,
                'L19h30' => $L19h30,
                'L20h' => $L20h,

                'Ma8h' => $Ma8h,
                'Ma8h30' => $Ma8h30,
                'Ma9h' => $Ma9h,
                'Ma9h30' => $Ma9h30,
                'Ma10h' => $Ma10h,
                'Ma10h30' => $Ma10h30,
                'Ma11h' => $Ma11h,
                'Ma11h30' => $Ma11h30,
                'Ma12h' => $Ma12h,
                'Ma12h30' => $Ma12h30,
                'Ma13h' => $Ma13h,
                'Ma13h30' => $Ma13h30,
                'Ma14h' => $Ma14h,
                'Ma14h30' => $Ma14h30,
                'Ma15h' => $Ma15h,
                'Ma15h30' => $Ma15h30,
                'Ma16h' => $Ma16h,
                'Ma16h30' => $Ma16h30,
                'Ma17h' => $Ma17h,
                'Ma17h30' => $Ma17h30,
                'Ma18h' => $Ma18h,
                'Ma18h30' => $Ma18h30,
                'Ma19h' => $Ma19h,
                'Ma19h30' => $Ma19h30,
                'Ma20h' => $Ma20h,

                'Me8h' => $Me8h,
                'Me8h30' => $Me8h30,
                'Me9h' => $Me9h,
                'Me9h30' => $Me9h30,
                'Me10h' => $Me10h,
                'Me10h30' => $Me10h30,
                'Me11h' => $Me11h,
                'Me11h30' => $Me11h30,
                'Me12h' => $Me12h,
                'Me12h30' => $Me12h30,
                'Me13h' => $Me13h,
                'Me13h30' => $Me13h30,
                'Me14h' => $Me14h,
                'Me14h30' => $Me14h30,
                'Me15h' => $Me15h,
                'Me15h30' => $Me15h30,
                'Me16h' => $Me16h,
                'Me16h30' => $Me16h30,
                'Me17h' => $Me17h,
                'Me17h30' => $Me17h30,
                'Me18h' => $Me18h,
                'Me18h30' => $Me18h30,
                'Me19h' => $Me19h,
                'Me19h30' => $Me19h30,
                'Me20h' => $Me20h,

                'J8h' => $J8h,
                'J8h30' => $J8h30,
                'J9h' => $J9h,
                'J9h30' => $J9h30,
                'J10h' => $J10h,
                'J10h30' => $J10h30,
                'J11h' => $J11h,
                'J11h30' => $J11h30,
                'J12h' => $J12h,
                'J12h30' => $J12h30,
                'J13h' => $J13h,
                'J13h30' => $J13h30,
                'J14h' => $J14h,
                'J14h30' => $J14h30,
                'J15h' => $J15h,
                'J15h30' => $J15h30,
                'J16h' => $J16h,
                'J16h30' => $J16h30,
                'J17h' => $J17h,
                'J17h30' => $J17h30,
                'J18h' => $J18h,
                'J18h30' => $J18h30,
                'J19h' => $J19h,
                'J19h30' => $J19h30,
                'J20h' => $J20h,

                'V8h' => $V8h,
                'V8h30' => $V8h30,
                'V9h' => $V9h,
                'V9h30' => $V9h30,
                'V10h' => $V10h,
                'V10h30' => $V10h30,
                'V11h' => $V11h,
                'V11h30' => $V11h30,
                'V12h' => $V12h,
                'V12h30' => $V12h30,
                'V13h' => $V13h,
                'V13h30' => $V13h30,
                'V14h' => $V14h,
                'V14h30' => $V14h30,
                'V15h' => $V15h,
                'V15h30' => $V15h30,
                'V16h' => $V16h,
                'V16h30' => $V16h30,
                'V17h' => $V17h,
                'V17h30' => $V17h30,
                'V18h' => $V18h,
                'V18h30' => $V18h30,
                'V19h' => $V19h,
                'V19h30' => $V19h30,
                'V20h' => $V20h,

                'hauteSaison' => $saisonHaute,
            ]);
        }
        else
        {
            $L10h=$aRepository->findRDV($id, "$annee-$mois-$lundi 10:00:00");
            $L10h30=$aRepository->findRDV($id, "$annee-$mois-$lundi 10:30:00");
            $L11h=$aRepository->findRDV($id, "$annee-$mois-$lundi 11:00:00");
            $L11h30=$aRepository->findRDV($id, "$annee-$mois-$lundi 11:30:00");
            $L12h=$aRepository->findRDV($id, "$annee-$mois-$lundi 12:00:00");
            $L12h30=$aRepository->findRDV($id, "$annee-$mois-$lundi 12:30:00");
            $L13h=$aRepository->findRDV($id, "$annee-$mois-$lundi 13:00:00");
            $L13h30=$aRepository->findRDV($id, "$annee-$mois-$lundi 13:30:00");
            $L14h=$aRepository->findRDV($id, "$annee-$mois-$lundi 14:00:00");
            $L14h30=$aRepository->findRDV($id, "$annee-$mois-$lundi 14:30:00");
            $L15h=$aRepository->findRDV($id, "$annee-$mois-$lundi 15:00:00");
            $L15h30=$aRepository->findRDV($id, "$annee-$mois-$lundi 15:30:00");
            $L16h=$aRepository->findRDV($id, "$annee-$mois-$lundi 16:00:00");
            $L16h30=$aRepository->findRDV($id, "$annee-$mois-$lundi 16:30:00");
            $L17h=$aRepository->findRDV($id, "$annee-$mois-$lundi 17:00:00");
            $L17h30=$aRepository->findRDV($id, "$annee-$mois-$lundi 17:30:00");
            $L18h=$aRepository->findRDV($id, "$annee-$mois-$lundi 18:00:00");

            $Ma10h=$aRepository->findRDV($id, "$annee-$mois-$mardi 10:00:00");
            $Ma10h30=$aRepository->findRDV($id, "$annee-$mois-$mardi 10:30:00");
            $Ma11h=$aRepository->findRDV($id, "$annee-$mois-$mardi 11:00:00");
            $Ma11h30=$aRepository->findRDV($id, "$annee-$mois-$mardi 11:30:00");
            $Ma12h=$aRepository->findRDV($id, "$annee-$mois-$mardi 12:00:00");
            $Ma12h30=$aRepository->findRDV($id, "$annee-$mois-$mardi 12:30:00");
            $Ma13h=$aRepository->findRDV($id, "$annee-$mois-$mardi 13:00:00");
            $Ma13h30=$aRepository->findRDV($id, "$annee-$mois-$mardi 13:30:00");
            $Ma14h=$aRepository->findRDV($id, "$annee-$mois-$mardi 14:00:00");
            $Ma14h30=$aRepository->findRDV($id, "$annee-$mois-$mardi 14:30:00");
            $Ma15h=$aRepository->findRDV($id, "$annee-$mois-$mardi 15:00:00");
            $Ma15h30=$aRepository->findRDV($id, "$annee-$mois-$mardi 15:30:00");
            $Ma16h=$aRepository->findRDV($id, "$annee-$mois-$mardi 16:00:00");
            $Ma16h30=$aRepository->findRDV($id, "$annee-$mois-$mardi 16:30:00");
            $Ma17h=$aRepository->findRDV($id, "$annee-$mois-$mardi 17:00:00");
            $Ma17h30=$aRepository->findRDV($id, "$annee-$mois-$mardi 17:30:00");
            $Ma18h=$aRepository->findRDV($id, "$annee-$mois-$mardi 18:00:00");

            $Me10h=$aRepository->findRDV($id, "$annee-$mois-$mercredi 10:00:00");
            $Me10h30=$aRepository->findRDV($id, "$annee-$mois-$mercredi 10:30:00");
            $Me11h=$aRepository->findRDV($id, "$annee-$mois-$mercredi 11:00:00");
            $Me11h30=$aRepository->findRDV($id, "$annee-$mois-$mercredi 11:30:00");
            $Me12h=$aRepository->findRDV($id, "$annee-$mois-$mercredi 12:00:00");
            $Me12h30=$aRepository->findRDV($id, "$annee-$mois-$mercredi 12:30:00");
            $Me13h=$aRepository->findRDV($id, "$annee-$mois-$mercredi 13:00:00");
            $Me13h30=$aRepository->findRDV($id, "$annee-$mois-$mercredi 13:30:00");
            $Me14h=$aRepository->findRDV($id, "$annee-$mois-$mercredi 14:00:00");
            $Me14h30=$aRepository->findRDV($id, "$annee-$mois-$mercredi 14:30:00");
            $Me15h=$aRepository->findRDV($id, "$annee-$mois-$mercredi 15:00:00");
            $Me15h30=$aRepository->findRDV($id, "$annee-$mois-$mercredi 15:30:00");
            $Me16h=$aRepository->findRDV($id, "$annee-$mois-$mercredi 16:00:00");
            $Me16h30=$aRepository->findRDV($id, "$annee-$mois-$mercredi 16:30:00");
            $Me17h=$aRepository->findRDV($id, "$annee-$mois-$mercredi 17:00:00");
            $Me17h30=$aRepository->findRDV($id, "$annee-$mois-$mercredi 17:30:00");
            $Me18h=$aRepository->findRDV($id, "$annee-$mois-$mercredi 18:00:00");

            $J10h=$aRepository->findRDV($id, "$annee-$mois-$jeudi 10:00:00");
            $J10h30=$aRepository->findRDV($id, "$annee-$mois-$jeudi 10:30:00");
            $J11h=$aRepository->findRDV($id, "$annee-$mois-$jeudi 11:00:00");
            $J11h30=$aRepository->findRDV($id, "$annee-$mois-$jeudi 11:30:00");
            $J12h=$aRepository->findRDV($id, "$annee-$mois-$jeudi 12:00:00");
            $J12h30=$aRepository->findRDV($id, "$annee-$mois-$jeudi 12:30:00");
            $J13h=$aRepository->findRDV($id, "$annee-$mois-$jeudi 13:00:00");
            $J13h30=$aRepository->findRDV($id, "$annee-$mois-$jeudi 13:30:00");
            $J14h=$aRepository->findRDV($id, "$annee-$mois-$jeudi 14:00:00");
            $J14h30=$aRepository->findRDV($id, "$annee-$mois-$jeudi 14:30:00");
            $J15h=$aRepository->findRDV($id, "$annee-$mois-$jeudi 15:00:00");
            $J15h30=$aRepository->findRDV($id, "$annee-$mois-$jeudi 15:30:00");
            $J16h=$aRepository->findRDV($id, "$annee-$mois-$jeudi 16:00:00");
            $J16h30=$aRepository->findRDV($id, "$annee-$mois-$jeudi 16:30:00");
            $J17h=$aRepository->findRDV($id, "$annee-$mois-$jeudi 17:00:00");
            $J17h30=$aRepository->findRDV($id, "$annee-$mois-$jeudi 17:30:00");
            $J18h=$aRepository->findRDV($id, "$annee-$mois-$jeudi 18:00:00");

            $V10h=$aRepository->findRDV($id, "$annee-$mois-$vendredi 10:00:00");
            $V10h30=$aRepository->findRDV($id, "$annee-$mois-$vendredi 10:30:00");
            $V11h=$aRepository->findRDV($id, "$annee-$mois-$vendredi 11:00:00");
            $V11h30=$aRepository->findRDV($id, "$annee-$mois-$vendredi 11:30:00");
            $V12h=$aRepository->findRDV($id, "$annee-$mois-$vendredi 12:00:00");
            $V12h30=$aRepository->findRDV($id, "$annee-$mois-$vendredi 12:30:00");
            $V13h=$aRepository->findRDV($id, "$annee-$mois-$vendredi 13:00:00");
            $V13h30=$aRepository->findRDV($id, "$annee-$mois-$vendredi 13:30:00");
            $V14h=$aRepository->findRDV($id, "$annee-$mois-$vendredi 14:00:00");
            $V14h30=$aRepository->findRDV($id, "$annee-$mois-$vendredi 14:30:00");
            $V15h=$aRepository->findRDV($id, "$annee-$mois-$vendredi 15:00:00");
            $V15h30=$aRepository->findRDV($id, "$annee-$mois-$vendredi 15:30:00");
            $V16h=$aRepository->findRDV($id, "$annee-$mois-$vendredi 16:00:00");
            $V16h30=$aRepository->findRDV($id, "$annee-$mois-$vendredi 16:30:00");
            $V17h=$aRepository->findRDV($id, "$annee-$mois-$vendredi 17:00:00");
            $V17h30=$aRepository->findRDV($id, "$annee-$mois-$vendredi 17:30:00");
            $V18h=$aRepository->findRDV($id, "$annee-$mois-$vendredi 18:00:00");

            return $this->render('conseiller/rdv.html.twig', [
                'controller_name' => 'ConseillerController',
                'L10h' => $L10h,
                'L10h30' => $L10h30,
                'L11h' => $L11h,
                'L11h30' => $L11h30,
                'L12h' => $L12h,
                'L12h30' => $L12h30,
                'L13h' => $L13h,
                'L13h30' => $L13h30,
                'L14h' => $L14h,
                'L14h30' => $L14h30,
                'L15h' => $L15h,
                'L15h30' => $L15h30,
                'L16h' => $L16h,
                'L16h30' => $L16h30,
                'L17h' => $L17h,
                'L17h30' => $L17h30,
                'L18h' => $L18h,

                'Ma10h' => $Ma10h,
                'Ma10h30' => $Ma10h30,
                'Ma11h' => $Ma11h,
                'Ma11h30' => $Ma11h30,
                'Ma12h' => $Ma12h,
                'Ma12h30' => $Ma12h30,
                'Ma13h' => $Ma13h,
                'Ma13h30' => $Ma13h30,
                'Ma14h' => $Ma14h,
                'Ma14h30' => $Ma14h30,
                'Ma15h' => $Ma15h,
                'Ma15h30' => $Ma15h30,
                'Ma16h' => $Ma16h,
                'Ma16h30' => $Ma16h30,
                'Ma17h' => $Ma17h,
                'Ma17h30' => $Ma17h30,
                'Ma18h' => $Ma18h,

                'Me10h' => $Me10h,
                'Me10h30' => $Me10h30,
                'Me11h' => $Me11h,
                'Me11h30' => $Me11h30,
                'Me12h' => $Me12h,
                'Me12h30' => $Me12h30,
                'Me13h' => $Me13h,
                'Me13h30' => $Me13h30,
                'Me14h' => $Me14h,
                'Me14h30' => $Me14h30,
                'Me15h' => $Me15h,
                'Me15h30' => $Me15h30,
                'Me16h' => $Me16h,
                'Me16h30' => $Me16h30,
                'Me17h' => $Me17h,
                'Me17h30' => $Me17h30,
                'Me18h' => $Me18h,

                'J10h' => $J10h,
                'J10h30' => $J10h30,
                'J11h' => $J11h,
                'J11h30' => $J11h30,
                'J12h' => $J12h,
                'J12h30' => $J12h30,
                'J13h' => $J13h,
                'J13h30' => $J13h30,
                'J14h' => $J14h,
                'J14h30' => $J14h30,
                'J15h' => $J15h,
                'J15h30' => $J15h30,
                'J16h' => $J16h,
                'J16h30' => $J16h30,
                'J17h' => $J17h,
                'J17h30' => $J17h30,
                'J18h' => $J18h,

                'V10h' => $V10h,
                'V10h30' => $V10h30,
                'V11h' => $V11h,
                'V11h30' => $V11h30,
                'V12h' => $V12h,
                'V12h30' => $V12h30,
                'V13h' => $V13h,
                'V13h30' => $V13h30,
                'V14h' => $V14h,
                'V14h30' => $V14h30,
                'V15h' => $V15h,
                'V15h30' => $V15h30,
                'V16h' => $V16h,
                'V16h30' => $V16h30,
                'V17h' => $V17h,
                'V17h30' => $V17h30,
                'V18h' => $V18h,

                'hauteSaison' => $saisonHaute,
            ]);
        }

    }
}
