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

        $intervalSemaine = new \DateInterval('P7D');

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
        $conseiller1->setLanguesParlees("fr");

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
        $horaire = "$mois/$lundi/$annee 10:30:00";
        $rdv1->setHoraire(new \DateTime($horaire));
        $rdv1->setLienVisio('whereby.com/theo-timeo');
        $rdv1->setLangue('FR');
        $manager->persist($rdv1);

        $rdv2 = new RDV();
        $rdv2->setConseiller($conseiller2);
        $rdv2->setTouriste($touriste2);
        $horaire = "$mois/$lundi/$annee 8:30:00";
        $rdv2->setHoraire(new \DateTime($horaire));
        $rdv2->setLienVisio('whereby.com/theo-timeo');
        $rdv2->setLangue('EN');
        $manager->persist($rdv2);

        $rdv3 = new RDV();
        $rdv3->setConseiller($conseiller1);
        $rdv3->setTouriste($touriste2);
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

        $rdv12 = new RDV();
        $rdv12->setConseiller($conseiller1);
        $rdv12->setTouriste($touriste1);
        $horaire = "$mois/$lundi/$annee 10:30:00";
        $rdv12->setHoraire(new \DateTime($horaire));
        $rdv12->setLienVisio('whereby.com/theo-timeo');
        $rdv12->setLangue('EN');
        $manager->persist($rdv12);

        $lundi = $lundi->sub($intervalSemaine);

        $rdv13 = new RDV();
        $rdv13->setConseiller($conseiller1);
        $rdv13->setTouriste($touriste1);
        $horaire = "$mois/$lundi/$annee 10:30:00";
        $rdv13->setHoraire(new \DateTime($horaire));
        $rdv13->setLienVisio('whereby.com/theo-timeo');
        $rdv13->setLangue('EN');
        $manager->persist($rdv13);

        $rdv14 = new RDV();
        $rdv14->setConseiller($conseiller1);
        $rdv14->setTouriste($touriste1);
        $horaire = "$mois/$mardi/$annee 15:30:00";
        $rdv14->setHoraire(new \DateTime($horaire));
        $rdv14->setLienVisio('whereby.com/theo-timeo');
        $rdv14->setLangue('EN');
        $manager->persist($rdv14);

        $rdv15 = new RDV();
        $rdv15->setConseiller($conseiller1);
        $rdv15->setTouriste($touriste2);
        $horaire = "$mois/$mercredi/$annee 12:30:00";
        $rdv15->setHoraire(new \DateTime($horaire));
        $rdv15->setLienVisio('whereby.com/theo-timeo');
        $rdv15->setLangue('FR');
        $manager->persist($rdv15);

        $rdv16 = new RDV();
        $rdv16->setConseiller($conseiller1);
        $rdv16->setTouriste($touriste2);
        $horaire = "$mois/$vendredi/$annee 8:30:00";
        $rdv16->setHoraire(new \DateTime($horaire));
        $rdv16->setLienVisio('whereby.com/theo-timeo');
        $rdv16->setLangue('FR');
        $manager->persist($rdv16);

        $lundi = $lundi->add($intervalSemaine);
        $lundi = $lundi->add($intervalSemaine);

        $rdv17 = new RDV();
        $rdv17->setConseiller($conseiller1);
        $rdv17->setTouriste($touriste2);
        $horaire = "$mois/$lundi/$annee 8:30:00";
        $rdv17->setHoraire(new \DateTime($horaire));
        $rdv17->setLienVisio('whereby.com/theo-timeo');
        $rdv17->setLangue('FR');
        $manager->persist($rdv17);

        $rdv18 = new RDV();
        $rdv18->setConseiller($conseiller1);
        $rdv18->setTouriste($touriste2);
        $horaire = "$mois/$mardi/$annee 16:30:00";
        $rdv18->setHoraire(new \DateTime($horaire));
        $rdv18->setLienVisio('whereby.com/theo-timeo');
        $rdv18->setLangue('EN');
        $manager->persist($rdv18);

        $rdv19 = new RDV();
        $rdv19->setConseiller($conseiller1);
        $rdv19->setTouriste($touriste2);
        $horaire = "$mois/$jeudi/$annee 12:00:00";
        $rdv19->setHoraire(new \DateTime($horaire));
        $rdv19->setLienVisio('whereby.com/theo-timeo');
        $rdv19->setLangue('FR');
        $manager->persist($rdv19);

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
