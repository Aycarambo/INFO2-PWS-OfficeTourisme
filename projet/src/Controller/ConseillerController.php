<?php

namespace App\Controller;

use App\Repository\ConseillerRepository;
use App\Repository\RDVRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ConseillerController extends AbstractController
{
    #[Route('/espaceConseiller/{id}', name: 'conseiller')]
    public function espaceConseiller(ConseillerRepository $conseillerRepository, RDVRepository $repository, int $id): Response
    {
        $lrdv = $repository->findBy(['Conseiller' => $id]);
        $conseiller = $conseillerRepository->find($id);
        return $this->render('conseiller/index.html.twig', [
            'controller_name' => 'ConseillerController',
            'conseiller' => $conseiller,
            'listeRDV' => $lrdv,
        ]);
    }
    #[Route('/espaceConseiller/{id}/MesRDV', name: 'conseillerRDV')]
    public function conseillerRDV(RDVRepository $aRepository, int $id): Response
    {
        date_default_timezone_set("Europe/Paris");
        $id = 1;

        $date = new \DateTime('now');

        $semaine = $date->format('w');

        $premierJourSemaine = new \DateTime("last Monday");
        $premierJourSemaine = date("now");

        $listeRDVs=$aRepository->trouveLaListeRDVs($id, $premierJourSemaine);



        if('22' < $semaine and $semaine < '35')
        {
            $saisonHaute = true;
        }
        else
        {
            $saisonHaute = false;
        }
        if($saisonHaute){}
        else
        {
            $agenda=[];
            for ($jour=1 ; $jour<=5 ; $jour++){
                for ($heure=8.0 ; $heure<=20 ; $heure+=0.5) {
                    $agenda[$this->nomJour($jour)][$this->nomHeure($heure)]=$this->RDVExiste($jour, $heure, $listeRDVs);
                }
            }

            return $this->render('conseiller/rdv.html.twig', [
                'agenda' => $agenda,
                'hauteSaison' => $saisonHaute,
            ]);
        }

    }

    private function nomJour(int $jour)
    {
        //$day = date('w');
        //$lundiNumero = date('d/m', strtotime('-'.($day-1).' days'));
        //$NumeroJour = date('d/m', strtotime('+'.($jour-$day).' days'));

        switch($jour) {
            case 1:
                return "Lundi";
            case 2:

                return "Mardi";
            case 3:
                return "Mercredi";
            case 4:
                return "Jeudi";
            case 5:
                return "Vendredi";
        }
    }

    private function nomHeure(float $heure)
    {
        $heureEnString="";
        $entier = floor($heure);
        $fraction = $heure - $entier;

        if(strlen((string)($entier))==1){
            $heureEnString.="0";
        }

        $heureEnString.=$entier.":";
        if($fraction==".5"){
            $heureEnString.="30";
        } else {
            $heureEnString.="00";
        }

        return $heureEnString;
    }

    private function RDVExiste(int $jour, float $heure, array $listeRDV)
    {
        $RDVExiste=false;
        $nomHeure=$this->nomHeure($heure).":00";

        $date = new \DateTime('now');
        $interval = new \DateInterval('P1D');
        for($i=1; $i<$jour; $i++){
            $date->add($interval);
        }

        $rdv = $date->format('Y-m-d $nomHeure');



        foreach ($listeRDV as $element){
            if($element.horaire==$rdv){
                $RDVExiste=true;
            }
        }

        return $RDVExiste;
    }
}
