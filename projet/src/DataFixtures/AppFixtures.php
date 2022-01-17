<?php

namespace App\DataFixtures;

use App\Entity\Saison;
use App\Entity\Touriste;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Conseiller;
use App\Entity\RDV;
use App\Entity\User;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $date = new \DateTime('now');

        $jour = $date->format('l');

        $mois = $date->format('m');

        $annee = $date->format('Y');

        $interval = new \DateInterval('P1D');

        if($jour != "Monday")
        {
            $lundi = new \DateTime("last Monday");
            $mardi = new \DateTime('last Monday');
            $mercredi = new \DateTime('last Monday');
            $jeudi = new \DateTime('last Monday');
            $vendredi = new \DateTime('last Monday');

            $lundi = $lundi->format('d');

            $mardi = $mardi->add($interval);
            $mardi = $mardi->format('d');

            $mercredi = $mercredi->add($interval);
            $mercredi = $mercredi->add($interval);
            $mercredi = $mercredi->format('d');

            $jeudi = $jeudi->add($interval);
            $jeudi = $jeudi->add($interval);
            $jeudi = $jeudi->add($interval);
            $jeudi = $jeudi->format('d');

            $vendredi = $vendredi->add($interval);
            $vendredi = $vendredi->add($interval);
            $vendredi = $vendredi->add($interval);
            $vendredi = $vendredi->add($interval);
            $vendredi = $vendredi->format('d');
        }
        else
        {
            $lundi = new \DateTime('now');
            $mardi = new \DateTime('now');
            $mercredi = new \DateTime('now');
            $jeudi = new \DateTime('now');
            $vendredi = new \DateTime('now');

            $lundi = $lundi->format('d');

            $mardi = $mardi->add($interval);
            $mardi = $mardi->format('d');

            $mercredi = $mercredi->add($interval);
            $mercredi = $mercredi->add($interval);
            $mercredi = $mercredi->format('d');

            $jeudi = $jeudi->add($interval);
            $jeudi = $jeudi->add($interval);
            $jeudi = $jeudi->add($interval);
            $jeudi = $jeudi->format('d');

            $vendredi = $vendredi->add($interval);
            $vendredi = $vendredi->add($interval);
            $vendredi = $vendredi->add($interval);
            $vendredi = $vendredi->add($interval);
            $vendredi = $vendredi->format('d');
        }



        //Touriste
        $touriste1 = new Touriste();
        $touriste1->setNom("UwU");
        $touriste1->setPrenom("Chloé");
        $manager->persist($touriste1);

        $touriste2 = new Touriste();
        $touriste2->setNom("Monsieur");
        $touriste2->setPrenom("Cool");
        $manager->persist($touriste2);

        // Conseiller

        $conseiller1 = new Conseiller();
        $conseiller1->setPrenom('Théo-Timéo');
        $conseiller1->setNom('John');
        $conseiller1->setLanguesParlees("fr;en");

        $manager->persist($conseiller1);

        $conseiller2 = new Conseiller();
        $conseiller2->setPrenom('Jean');
        $conseiller2->setNom('Dupont');
        $conseiller2->setLanguesParlees("fr");

        $manager->persist($conseiller2);


        // RDV
        $rdv1 = new RDV();
        $rdv1->setConseiller($conseiller1);
        $rdv1->setTouriste($touriste1);

        $horaire1 = '10/12/2021 08:30:00';
        $rdv1->setHoraire(new \DateTime($horaire1));
        $rdv1->setLienVisio('google.com');
        $rdv1->setLangue("fr");

        $horaire = "$mois/$lundi/$annee 10:30:00";
        $rdv1->setHoraire(new \DateTime($horaire));
        $rdv1->setLienVisio('whereby.com/theo-timeo');
        $rdv1->setLangue('FR');

        $manager->persist($rdv1);

        $rdv2 = new RDV();
        $rdv2->setConseiller($conseiller2);
        $rdv2->setTouriste($touriste2);

        $horaire2 = '10/15/2021 10:30:00';
        $rdv2->setHoraire(new \DateTime($horaire2));
        $rdv2->setLienVisio('google.com');
        $rdv2->setLangue("fr");

        $horaire = "$mois/$lundi/$annee 8:30:00";
        $rdv2->setHoraire(new \DateTime($horaire));
        $rdv2->setLienVisio('whereby.com/theo-timeo');
        $rdv2->setLangue('EN');

        $manager->persist($rdv2);

        $rdv3 = new RDV();
        $rdv3->setConseiller($conseiller1);
        $rdv3->setTouriste($touriste2);

        $rdv3->setHoraire(new \DateTime($horaire2));
        $rdv3->setLienVisio('google.com');
        $rdv3->setLangue("fr");

        $horaire = "$mois/$mardi/$annee 13:30:00";
        $rdv3->setHoraire(new \DateTime($horaire));
        $rdv3->setLienVisio('whereby.com/theo-timeo');
        $rdv3->setLangue('FR');

        $manager->persist($rdv3);

        $rdv4 = new RDV();
        $rdv4->setConseiller($conseiller1);
        $rdv4->setTouriste($touriste1);
        $horaire = "$mois/$mardi/$annee 18:00:00";
        $rdv4->setHoraire(new \DateTime($horaire));
        $rdv4->setLienVisio('whereby.com/theo-timeo');
        $rdv4->setLangue('EN');
        $manager->persist($rdv4);

        $rdv5 = new RDV();
        $rdv5->setConseiller($conseiller1);
        $rdv5->setTouriste($touriste1);
        $horaire = "$mois/$mercredi/$annee 14:30:00";
        $rdv5->setHoraire(new \DateTime($horaire));
        $rdv5->setLienVisio('whereby.com/theo-timeo');
        $rdv5->setLangue('FR');
        $manager->persist($rdv5);

        $rdv6 = new RDV();
        $rdv6->setConseiller($conseiller1);
        $rdv6->setTouriste($touriste1);
        $horaire = "$mois/$mercredi/$annee 16:00:00";
        $rdv6->setHoraire(new \DateTime($horaire));
        $rdv6->setLienVisio('whereby.com/theo-timeo');
        $rdv6->setLangue('EN');
        $manager->persist($rdv6);

        $rdv7 = new RDV();
        $rdv7->setConseiller($conseiller1);
        $rdv7->setTouriste($touriste1);
        $horaire = "$mois/$jeudi/$annee 19:30:00";
        $rdv7->setHoraire(new \DateTime($horaire));
        $rdv7->setLienVisio('whereby.com/theo-timeo');
        $rdv7->setLangue('FR');
        $manager->persist($rdv7);

        $rdv8 = new RDV();
        $rdv8->setConseiller($conseiller1);
        $rdv8->setTouriste($touriste1);
        $horaire = "$mois/$jeudi/$annee 12:30:00";
        $rdv8->setHoraire(new \DateTime($horaire));
        $rdv8->setLienVisio('whereby.com/theo-timeo');
        $rdv8->setLangue('EN');
        $manager->persist($rdv8);

        $rdv9 = new RDV();
        $rdv9->setConseiller($conseiller1);
        $rdv9->setTouriste($touriste1);
        $horaire = "$mois/$vendredi/$annee 17:30:00";
        $rdv9->setHoraire(new \DateTime($horaire));
        $rdv9->setLienVisio('whereby.com/theo-timeo');
        $rdv9->setLangue('FR');
        $manager->persist($rdv9);

        $rdv10 = new RDV();
        $rdv10->setConseiller($conseiller1);
        $rdv10->setTouriste($touriste1);
        $horaire = "$mois/$vendredi/$annee 11:00:00";
        $rdv10->setHoraire(new \DateTime($horaire));
        $rdv10->setLienVisio('whereby.com/theo-timeo');
        $rdv10->setLangue('EN');
        $manager->persist($rdv10);

        $rdv11 = new RDV();
        $rdv11->setConseiller($conseiller1);
        $rdv11->setTouriste($touriste1);
        $horaire = "$mois/$mardi/$annee 10:30:00";
        $rdv11->setHoraire(new \DateTime($horaire));
        $rdv11->setLienVisio('whereby.com/theo-timeo');
        $rdv11->setLangue('FR');
        $manager->persist($rdv11);

        //Users
        $responsable = new User();
        $responsable->setPassword('$2y$13$Ec.mJbSc0eoMoM4hlWll4OlAPO6qdXFqMC8anrNbM.Jcid/tR1hG.');
        $responsable->setEmail("valentin@yahoo.fr");
        $responsable->setRoles(["ROLE_RESPONSABLE"]);
        $manager->persist($responsable);

        $conseillerU1 = new User();
        $conseillerU1->setPassword('$2y$13$LVGQx8F9FcSuH8nizkW6vuzCwzXleh4JdWxgnKm26RqQPcbC9dyq.');
        $conseillerU1->setEmail("theotimeo@free.fr");
        $conseillerU1->setRoles(["ROLE_CONSEILLER"]);
        $conseillerU1->setConseiller($conseiller1);
        $manager->persist($conseillerU1);

        $touristeU1 = new User();
        $touristeU1->setPassword('$2y$13$LVGQx8F9FcSuH8nizkW6vuzCwzXleh4JdWxgnKm26RqQPcbC9dyq.');
        $touristeU1->setEmail("chloe@gmail.com");
        $touristeU1->setRoles(["ROLE_TOURISTE"]);
        $touristeU1->setTouriste($touriste1);
        $manager->persist($touristeU1);

        // La saison
        $saison = new Saison();
        $saison->setSaison(True); // Haute saison
        $manager->persist($saison);

        $manager->flush();
    }
}
