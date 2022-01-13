<?php

namespace App\Controller;

use App\Repository\ConseillerRepository;
use App\Repository\RDVRepository;
use mysql_xdevapi\Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Exception\AuthenticationException;

class ConseillerController extends AbstractController
{
    private function utilisateurCourant(ConseillerRepository $repositoryConseiller)
    {
        $user = $this->getUser();
        if(!$user){
            throw new AuthenticationException("non connecté");
        }
        $conseiller_id = $user->getConseiller();
        return $repositoryConseiller->find($conseiller_id);
    }

    #[Route('/espaceConseiller/', name: 'conseillerAuth')]
    public function espaceConseillerAuth(ConseillerRepository $conseillerRepository, RDVRepository $repository): Response
    {
        $conseiller = $this->utilisateurCourant($conseillerRepository);
        $lrdv = $repository->findBy(['Conseiller' => $conseiller->getId()]);
        return $this->render('conseiller/index.html.twig', [
            'controller_name' => 'ConseillerController',
            'conseiller' => $conseiller,
            'listeRDV' => $lrdv,
        ]);
    }

    #[Route('/espaceConseiller/detailRDV/{id}', name: 'detail rdv')]
    public function detailRDVConseiller(ConseillerRepository $conseillerRepository, RDVRepository $repository, int $id): Response
    {
        $conseiller = $this->utilisateurCourant($conseillerRepository);
        $lrdv = $repository->findBy(['Conseiller' => $conseiller->getId()]);

        return $this->render('conseiller/detailRDV.html.twig', [
            'controller_name' => 'ConseillerController',
            'conseiller' => $conseiller,
            'LRDV' => $lrdv,
            'idRDV' => $id,
        ]);
    }


    #[Route('/espaceConseiller/MesRDV/semaine+{semaine}', name: 'conseillerRDV/SemainesFutursOuEnCours')]
    public function conseillerRDVSemainesFutursOuEnCours(ConseillerRepository $conseillerRepository, RDVRepository $aRepository, int $semaine): Response
    {
        date_default_timezone_set("Europe/Paris");
        $idConseiller = $this->utilisateurCourant($conseillerRepository)->getId();

        $date = new \DateTime('now');

        $nombreJours=7*$semaine;
        $interval= new \DateInterval("P".$nombreJours."D");
        $semaine = clone $date;
        $semaine->add($interval);


        //recuperer le premier jour de la semaine
        $ajd = new \DateTime();
        if($ajd->format("D")=="Mon"){
            //si on est lundi
            $premierJourSemaine=$ajd;
        } else {
            $premierJourSemaine = new \DateTime("last Monday");
        }

        //pour ne pas avoir la semaine en cours
        $premierJourSemaine->add($interval);

        //recuperer le dernier jour de la semaine
        $dernierJourSemaine = clone $premierJourSemaine;
        $dernierJourSemaine->add(new \DateInterval("P5D"));
        $listeRDVs=$aRepository->trouveLaListeRDVs($idConseiller, $premierJourSemaine->format("Y-m-d ")."00:00:00", $dernierJourSemaine->format("Y-m-d ")."00:00:00");


        if('22' < $semaine->format('W') and $semaine->format('W') < '35')
        {
            $saisonHaute = true;

        }
        else
        {
            $saisonHaute = false;
        }

        $agenda=[];

        if($saisonHaute){

            for ($jour=1 ; $jour<=5 ; $jour++){
                for ($heure=8.0 ; $heure<=20 ; $heure+=0.5) {
                    $agenda[$this->nomJour($jour)][$this->nomHeure($heure)]=$this->RDVExiste($jour, $heure, $listeRDVs, $premierJourSemaine);
                }
            }
        }
        else
        {

            for ($jour=1 ; $jour<=5 ; $jour++){
                for ($heure=10.0 ; $heure<=18.0 ; $heure+=0.5) {
                    $agenda[$this->nomJour($jour)][$this->nomHeure($heure)]=$this->RDVExiste($jour, $heure, $listeRDVs, $premierJourSemaine);
                }
            }
        }
        return $this->render('conseiller/rdv.html.twig', [
            'agenda' => $agenda,
            'premierJourSemaine' => $premierJourSemaine->format("d/m"),
            'dernierJourSemaine' => $dernierJourSemaine->format("d/m"),
            'year' => $dernierJourSemaine->format("Y"),
        ]);
    }

    #[Route('/espaceConseiller/MesRDV/semaine-{semaine}', name: 'conseillerRDV/AutreSemaine')]
    public function conseillerRDVAutreSemaine(ConseillerRepository $conseillerRepository, RDVRepository $aRepository, int $semaine): Response
    {
        date_default_timezone_set("Europe/Paris");
        $idConseiller = $this->utilisateurCourant($conseillerRepository)->getId();

        $date = new \DateTime('now');

        $nombreJours=7*$semaine;
        $interval= new \DateInterval("P".$nombreJours."D");
        $semaine = clone $date;
        $semaine->sub($interval);


        //recuperer le premier jour de la semaine
        $ajd = new \DateTime();
        if($ajd->format("D")=="Mon"){
            //si on est lundi
            $premierJourSemaine=$ajd;
        } else {
            $premierJourSemaine = new \DateTime("last Monday");
        }

        //pour ne pas avoir la semaine en cours
        $premierJourSemaine->sub($interval);

        //recuperer le dernier jour de la semaine
        $dernierJourSemaine = clone $premierJourSemaine;
        $dernierJourSemaine->add(new \DateInterval("P5D"));
        $listeRDVs=$aRepository->trouveLaListeRDVs($idConseiller, $premierJourSemaine->format("Y-m-d ")."00:00:00", $dernierJourSemaine->format("Y-m-d ")."00:00:00");




        if('22' < $semaine->format('W') and $semaine->format('W') < '35')
        {
            $saisonHaute = true;

        }
        else
        {
            $saisonHaute = false;
        }

        $agenda=[];

        if($saisonHaute){

            for ($jour=1 ; $jour<=5 ; $jour++){
                for ($heure=8.0 ; $heure<=20 ; $heure+=0.5) {
                    $agenda[$this->nomJour($jour)][$this->nomHeure($heure)]=$this->RDVExiste($jour, $heure, $listeRDVs, $premierJourSemaine);
                }
            }
        }
        else
        {

            for ($jour=1 ; $jour<=5 ; $jour++){
                for ($heure=10.0 ; $heure<=18.0 ; $heure+=0.5) {
                    $agenda[$this->nomJour($jour)][$this->nomHeure($heure)]=$this->RDVExiste($jour, $heure, $listeRDVs, $premierJourSemaine);
                }
            }
        }
        return $this->render('conseiller/rdv.html.twig', [
            'agenda' => $agenda,
            'premierJourSemaine' => $premierJourSemaine->format("d/m"),
            'dernierJourSemaine' => $dernierJourSemaine->format("d/m"),
            'year' => $dernierJourSemaine->format("Y"),
        ]);
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

    private function RDVExiste(int $jour, float $heure, array $listeRDV, $premierJourDeLaSemaine)
    {
        $RDVExiste=false;
        $nomHeure=$this->nomHeure($heure).":00";
        $premierJourSemaine = clone $premierJourDeLaSemaine;

        //incrémenter le premier jour de la semaine $jour fois pour obtenir le jour souhaité
        $interval = new \DateInterval('P1D');
        for($i=1; $i<$jour; $i++){
            $premierJourSemaine->add($interval);
        }
        $rdv = $premierJourSemaine->format('Y-m-d ').$nomHeure;


        foreach ($listeRDV as $element){
            if($element->getHoraire()->format("Y-m-d H:i:s")==$rdv){
                $RDVExiste=true;
            }
        }


        return $RDVExiste;
    }
}
