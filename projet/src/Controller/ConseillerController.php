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
    public function conseillerRDV(RDVRepository $aRepository): Response
    {
        //$date = new datetime('now');

        //if("22" < ($date->format('w')) and ($date->format('w') < "35"))
        //{
        $L8h=$aRepository->findRDV(1, "2021-12-13 08:00:00");
        $L8h30=$aRepository->findRDV(1, "2021-12-13 08:30:00");
        $L9h=$aRepository->findRDV(1, "2021-12-13 09:00:00");
        $L9h30=$aRepository->findRDV(1, "2021-12-13 09:30:00");
        $L10h=$aRepository->findRDV(1, "2021-12-13 10:00:00");
        $L10h30=$aRepository->findRDV(1, "2021-12-13 10:30:00");
        $L11h=$aRepository->findRDV(1, "2021-12-13 11:00:00");
        $L11h30=$aRepository->findRDV(1, "2021-12-13 11:30:00");
        $L12h=$aRepository->findRDV(1, "2021-12-13 12:00:00");
        $L12h30=$aRepository->findRDV(1, "2021-12-13 12:30:00");
        $L13h=$aRepository->findRDV(1, "2021-12-13 13:00:00");
        $L13h30=$aRepository->findRDV(1, "2021-12-13 13:30:00");
        $L14h=$aRepository->findRDV(1, "2021-12-13 14:00:00");
        $L14h30=$aRepository->findRDV(1, "2021-12-13 14:30:00");
        $L15h=$aRepository->findRDV(1, "2021-12-13 15:00:00");
        $L15h30=$aRepository->findRDV(1, "2021-12-13 15:30:00");
        $L16h=$aRepository->findRDV(1, "2021-12-13 16:00:00");
        $L16h30=$aRepository->findRDV(1, "2021-12-13 16:30:00");
        $L17h=$aRepository->findRDV(1, "2021-12-13 17:00:00");
        $L17h30=$aRepository->findRDV(1, "2021-12-13 17:30:00");
        $L18h=$aRepository->findRDV(1, "2021-12-13 18:00:00");
        $L18h30=$aRepository->findRDV(1, "2021-12-13 18:30:00");
        $L19h=$aRepository->findRDV(1, "2021-12-13 19:00:00");
        $L19h30=$aRepository->findRDV(1, "2021-12-13 19:30:00");
        $L20h=$aRepository->findRDV(1, "2021-12-13 20:00:00");

        $Ma8h=$aRepository->findRDV(1, "2021-12-14 08:00:00");
        $Ma8h30=$aRepository->findRDV(1, "2021-12-14 08:30:00");
        $Ma9h=$aRepository->findRDV(1, "2021-12-14 09:00:00");
        $Ma9h30=$aRepository->findRDV(1, "2021-12-14 09:30:00");
        $Ma10h=$aRepository->findRDV(1, "2021-12-14 10:00:00");
        $Ma10h30=$aRepository->findRDV(1, "2021-12-14 10:30:00");
        $Ma11h=$aRepository->findRDV(1, "2021-12-14 11:00:00");
        $Ma11h30=$aRepository->findRDV(1, "2021-12-14 11:30:00");
        $Ma12h=$aRepository->findRDV(1, "2021-12-14 12:00:00");
        $Ma12h30=$aRepository->findRDV(1, "2021-12-14 12:30:00");
        $Ma13h=$aRepository->findRDV(1, "2021-12-14 13:00:00");
        $Ma13h30=$aRepository->findRDV(1, "2021-12-14 13:30:00");
        $Ma14h=$aRepository->findRDV(1, "2021-12-14 14:00:00");
        $Ma14h30=$aRepository->findRDV(1, "2021-12-14 14:30:00");
        $Ma15h=$aRepository->findRDV(1, "2021-12-14 15:00:00");
        $Ma15h30=$aRepository->findRDV(1, "2021-12-14 15:30:00");
        $Ma16h=$aRepository->findRDV(1, "2021-12-14 16:00:00");
        $Ma16h30=$aRepository->findRDV(1, "2021-12-14 16:30:00");
        $Ma17h=$aRepository->findRDV(1, "2021-12-14 17:00:00");
        $Ma17h30=$aRepository->findRDV(1, "2021-12-14 17:30:00");
        $Ma18h=$aRepository->findRDV(1, "2021-12-14 18:00:00");
        $Ma18h30=$aRepository->findRDV(1, "2021-12-14 18:30:00");
        $Ma19h=$aRepository->findRDV(1, "2021-12-14 19:00:00");
        $Ma19h30=$aRepository->findRDV(1, "2021-12-14 19:30:00");
        $Ma20h=$aRepository->findRDV(1, "2021-12-14 20:00:00");

        $Me8h=$aRepository->findRDV(1, "2021-12-15 08:00:00");
        $Me8h30=$aRepository->findRDV(1, "2021-12-15 08:30:00");
        $Me9h=$aRepository->findRDV(1, "2021-12-15 09:00:00");
        $Me9h30=$aRepository->findRDV(1, "2021-12-15 09:30:00");
        $Me10h=$aRepository->findRDV(1, "2021-12-15 10:00:00");
        $Me10h30=$aRepository->findRDV(1, "2021-12-15 10:30:00");
        $Me11h=$aRepository->findRDV(1, "2021-12-15 11:00:00");
        $Me11h30=$aRepository->findRDV(1, "2021-12-15 11:30:00");
        $Me12h=$aRepository->findRDV(1, "2021-12-15 12:00:00");
        $Me12h30=$aRepository->findRDV(1, "2021-12-15 12:30:00");
        $Me13h=$aRepository->findRDV(1, "2021-12-15 13:00:00");
        $Me13h30=$aRepository->findRDV(1, "2021-12-15 13:30:00");
        $Me14h=$aRepository->findRDV(1, "2021-12-15 14:00:00");
        $Me14h30=$aRepository->findRDV(1, "2021-12-15 14:30:00");
        $Me15h=$aRepository->findRDV(1, "2021-12-15 15:00:00");
        $Me15h30=$aRepository->findRDV(1, "2021-12-15 15:30:00");
        $Me16h=$aRepository->findRDV(1, "2021-12-15 16:00:00");
        $Me16h30=$aRepository->findRDV(1, "2021-12-15 16:30:00");
        $Me17h=$aRepository->findRDV(1, "2021-12-15 17:00:00");
        $Me17h30=$aRepository->findRDV(1, "2021-12-15 17:30:00");
        $Me18h=$aRepository->findRDV(1, "2021-12-15 18:00:00");
        $Me18h30=$aRepository->findRDV(1, "2021-12-15 18:30:00");
        $Me19h=$aRepository->findRDV(1, "2021-12-15 19:00:00");
        $Me19h30=$aRepository->findRDV(1, "2021-12-15 19:30:00");
        $Me20h=$aRepository->findRDV(1, "2021-12-15 20:00:00");

        $J8h=$aRepository->findRDV(1, "2021-12-16 08:00:00");
        $J8h30=$aRepository->findRDV(1, "2021-12-16 08:30:00");
        $J9h=$aRepository->findRDV(1, "2021-12-16 09:00:00");
        $J9h30=$aRepository->findRDV(1, "2021-12-16 09:30:00");
        $J10h=$aRepository->findRDV(1, "2021-12-16 10:00:00");
        $J10h30=$aRepository->findRDV(1, "2021-12-16 10:30:00");
        $J11h=$aRepository->findRDV(1, "2021-12-16 11:00:00");
        $J11h30=$aRepository->findRDV(1, "2021-12-16 11:30:00");
        $J12h=$aRepository->findRDV(1, "2021-12-16 12:00:00");
        $J12h30=$aRepository->findRDV(1, "2021-12-16 12:30:00");
        $J13h=$aRepository->findRDV(1, "2021-12-16 13:00:00");
        $J13h30=$aRepository->findRDV(1, "2021-12-16 13:30:00");
        $J14h=$aRepository->findRDV(1, "2021-12-16 14:00:00");
        $J14h30=$aRepository->findRDV(1, "2021-12-16 14:30:00");
        $J15h=$aRepository->findRDV(1, "2021-12-16 15:00:00");
        $J15h30=$aRepository->findRDV(1, "2021-12-16 15:30:00");
        $J16h=$aRepository->findRDV(1, "2021-12-16 16:00:00");
        $J16h30=$aRepository->findRDV(1, "2021-12-16 16:30:00");
        $J17h=$aRepository->findRDV(1, "2021-12-16 17:00:00");
        $J17h30=$aRepository->findRDV(1, "2021-12-16 17:30:00");
        $J18h=$aRepository->findRDV(1, "2021-12-16 18:00:00");
        $J18h30=$aRepository->findRDV(1, "2021-12-16 18:30:00");
        $J19h=$aRepository->findRDV(1, "2021-12-16 19:00:00");
        $J19h30=$aRepository->findRDV(1, "2021-12-16 19:30:00");
        $J20h=$aRepository->findRDV(1, "2021-12-16 20:00:00");

        $V8h=$aRepository->findRDV(1, "2021-12-17 08:00:00");
        $V8h30=$aRepository->findRDV(1, "2021-12-17 08:30:00");
        $V9h=$aRepository->findRDV(1, "2021-12-17 09:00:00");
        $V9h30=$aRepository->findRDV(1, "2021-12-17 09:30:00");
        $V10h=$aRepository->findRDV(1, "2021-12-17 10:00:00");
        $V10h30=$aRepository->findRDV(1, "2021-12-17 10:30:00");
        $V11h=$aRepository->findRDV(1, "2021-12-17 11:00:00");
        $V11h30=$aRepository->findRDV(1, "2021-12-17 11:30:00");
        $V12h=$aRepository->findRDV(1, "2021-12-17 12:00:00");
        $V12h30=$aRepository->findRDV(1, "2021-12-17 12:30:00");
        $V13h=$aRepository->findRDV(1, "2021-12-17 13:00:00");
        $V13h30=$aRepository->findRDV(1, "2021-12-17 13:30:00");
        $V14h=$aRepository->findRDV(1, "2021-12-17 14:00:00");
        $V14h30=$aRepository->findRDV(1, "2021-12-17 14:30:00");
        $V15h=$aRepository->findRDV(1, "2021-12-17 15:00:00");
        $V15h30=$aRepository->findRDV(1, "2021-12-17 15:30:00");
        $V16h=$aRepository->findRDV(1, "2021-12-17 16:00:00");
        $V16h30=$aRepository->findRDV(1, "2021-12-17 16:30:00");
        $V17h=$aRepository->findRDV(1, "2021-12-17 17:00:00");
        $V17h30=$aRepository->findRDV(1, "2021-12-17 17:30:00");
        $V18h=$aRepository->findRDV(1, "2021-12-17 18:00:00");
        $V18h30=$aRepository->findRDV(1, "2021-12-17 18:30:00");
        $V19h=$aRepository->findRDV(1, "2021-12-17 19:00:00");
        $V19h30=$aRepository->findRDV(1, "2021-12-17 19:30:00");
        $V20h=$aRepository->findRDV(1, "2021-12-17 20:00:00");

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
        ]);
        //}
        /*else
        {
            $L10h=$aRepository->findRDV(1, "2021-12-13 10:00:00");
            $L10h30=$aRepository->findRDV(1, "2021-12-13 10:30:00");
            $L11h=$aRepository->findRDV(1, "2021-12-13 11:00:00");
            $L11h30=$aRepository->findRDV(1, "2021-12-13 11:30:00");
            $L12h=$aRepository->findRDV(1, "2021-12-13 12:00:00");
            $L12h30=$aRepository->findRDV(1, "2021-12-13 12:30:00");
            $L13h=$aRepository->findRDV(1, "2021-12-13 13:00:00");
            $L13h30=$aRepository->findRDV(1, "2021-12-13 13:30:00");
            $L14h=$aRepository->findRDV(1, "2021-12-13 14:00:00");
            $L14h30=$aRepository->findRDV(1, "2021-12-13 14:30:00");
            $L15h=$aRepository->findRDV(1, "2021-12-13 15:00:00");
            $L15h30=$aRepository->findRDV(1, "2021-12-13 15:30:00");
            $L16h=$aRepository->findRDV(1, "2021-12-13 16:00:00");
            $L16h30=$aRepository->findRDV(1, "2021-12-13 16:30:00");
            $L17h=$aRepository->findRDV(1, "2021-12-13 17:00:00");
            $L17h30=$aRepository->findRDV(1, "2021-12-13 17:30:00");
            $L18h=$aRepository->findRDV(1, "2021-12-13 18:00:00");

            $Ma10h=$aRepository->findRDV(1, "2021-12-14 10:00:00");
            $Ma10h30=$aRepository->findRDV(1, "2021-12-14 10:30:00");
            $Ma11h=$aRepository->findRDV(1, "2021-12-14 11:00:00");
            $Ma11h30=$aRepository->findRDV(1, "2021-12-14 11:30:00");
            $Ma12h=$aRepository->findRDV(1, "2021-12-14 12:00:00");
            $Ma12h30=$aRepository->findRDV(1, "2021-12-14 12:30:00");
            $Ma13h=$aRepository->findRDV(1, "2021-12-14 13:00:00");
            $Ma13h30=$aRepository->findRDV(1, "2021-12-14 13:30:00");
            $Ma14h=$aRepository->findRDV(1, "2021-12-14 14:00:00");
            $Ma14h30=$aRepository->findRDV(1, "2021-12-14 14:30:00");
            $Ma15h=$aRepository->findRDV(1, "2021-12-14 15:00:00");
            $Ma15h30=$aRepository->findRDV(1, "2021-12-14 15:30:00");
            $Ma16h=$aRepository->findRDV(1, "2021-12-14 16:00:00");
            $Ma16h30=$aRepository->findRDV(1, "2021-12-14 16:30:00");
            $Ma17h=$aRepository->findRDV(1, "2021-12-14 17:00:00");
            $Ma17h30=$aRepository->findRDV(1, "2021-12-14 17:30:00");
            $Ma18h=$aRepository->findRDV(1, "2021-12-14 18:00:00");

            $Me10h=$aRepository->findRDV(1, "2021-12-15 10:00:00");
            $Me10h30=$aRepository->findRDV(1, "2021-12-15 10:30:00");
            $Me11h=$aRepository->findRDV(1, "2021-12-15 11:00:00");
            $Me11h30=$aRepository->findRDV(1, "2021-12-15 11:30:00");
            $Me12h=$aRepository->findRDV(1, "2021-12-15 12:00:00");
            $Me12h30=$aRepository->findRDV(1, "2021-12-15 12:30:00");
            $Me13h=$aRepository->findRDV(1, "2021-12-15 13:00:00");
            $Me13h30=$aRepository->findRDV(1, "2021-12-15 13:30:00");
            $Me14h=$aRepository->findRDV(1, "2021-12-15 14:00:00");
            $Me14h30=$aRepository->findRDV(1, "2021-12-15 14:30:00");
            $Me15h=$aRepository->findRDV(1, "2021-12-15 15:00:00");
            $Me15h30=$aRepository->findRDV(1, "2021-12-15 15:30:00");
            $Me16h=$aRepository->findRDV(1, "2021-12-15 16:00:00");
            $Me16h30=$aRepository->findRDV(1, "2021-12-15 16:30:00");
            $Me17h=$aRepository->findRDV(1, "2021-12-15 17:00:00");
            $Me17h30=$aRepository->findRDV(1, "2021-12-15 17:30:00");
            $Me18h=$aRepository->findRDV(1, "2021-12-15 18:00:00");

            $J10h=$aRepository->findRDV(1, "2021-12-16 10:00:00");
            $J10h30=$aRepository->findRDV(1, "2021-12-16 10:30:00");
            $J11h=$aRepository->findRDV(1, "2021-12-16 11:00:00");
            $J11h30=$aRepository->findRDV(1, "2021-12-16 11:30:00");
            $J12h=$aRepository->findRDV(1, "2021-12-16 12:00:00");
            $J12h30=$aRepository->findRDV(1, "2021-12-16 12:30:00");
            $J13h=$aRepository->findRDV(1, "2021-12-16 13:00:00");
            $J13h30=$aRepository->findRDV(1, "2021-12-16 13:30:00");
            $J14h=$aRepository->findRDV(1, "2021-12-16 14:00:00");
            $J14h30=$aRepository->findRDV(1, "2021-12-16 14:30:00");
            $J15h=$aRepository->findRDV(1, "2021-12-16 15:00:00");
            $J15h30=$aRepository->findRDV(1, "2021-12-16 15:30:00");
            $J16h=$aRepository->findRDV(1, "2021-12-16 16:00:00");
            $J16h30=$aRepository->findRDV(1, "2021-12-16 16:30:00");
            $J17h=$aRepository->findRDV(1, "2021-12-16 17:00:00");
            $J17h30=$aRepository->findRDV(1, "2021-12-16 17:30:00");
            $J18h=$aRepository->findRDV(1, "2021-12-16 18:00:00");

            $V10h=$aRepository->findRDV(1, "2021-12-17 10:00:00");
            $V10h30=$aRepository->findRDV(1, "2021-12-17 10:30:00");
            $V11h=$aRepository->findRDV(1, "2021-12-17 11:00:00");
            $V11h30=$aRepository->findRDV(1, "2021-12-17 11:30:00");
            $V12h=$aRepository->findRDV(1, "2021-12-17 12:00:00");
            $V12h30=$aRepository->findRDV(1, "2021-12-17 12:30:00");
            $V13h=$aRepository->findRDV(1, "2021-12-17 13:00:00");
            $V13h30=$aRepository->findRDV(1, "2021-12-17 13:30:00");
            $V14h=$aRepository->findRDV(1, "2021-12-17 14:00:00");
            $V14h30=$aRepository->findRDV(1, "2021-12-17 14:30:00");
            $V15h=$aRepository->findRDV(1, "2021-12-17 15:00:00");
            $V15h30=$aRepository->findRDV(1, "2021-12-17 15:30:00");
            $V16h=$aRepository->findRDV(1, "2021-12-17 16:00:00");
            $V16h30=$aRepository->findRDV(1, "2021-12-17 16:30:00");
            $V17h=$aRepository->findRDV(1, "2021-12-17 17:00:00");
            $V17h30=$aRepository->findRDV(1, "2021-12-17 17:30:00");
            $V18h=$aRepository->findRDV(1, "2021-12-17 18:00:00");

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
            ]);
        }*/

    }
}
