<?php

namespace App\DataFixtures;

use App\Entity\Touriste;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Conseiller;
use App\Entity\RDV;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        //Touriste
        $touriste1 = new Touriste();
        $touriste1->setNom("Smith");
        $touriste1->setPrenom("John");
        $manager->persist($touriste1);

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
        $horaire1 = '10/12/2021 08:30:00';
        $rdv1->setHoraire(new \DateTime($horaire1));
        $rdv1->setLienVisio('google.com');
        $manager->persist($rdv1);

        $rdv2 = new RDV();
        $rdv2->setConseiller($conseiller2);
        $rdv2->setTouriste($touriste1);
        $horaire2 = '10/15/2021 10:30:00';
        $rdv2->setHoraire(new \DateTime($horaire2));
        $rdv2->setLienVisio('google.com');
        $manager->persist($rdv2);

        $rdv3 = new RDV();
        $rdv3->setConseiller($conseiller1);
        $rdv3->setTouriste($touriste1);
        $rdv3->setHoraire(new \DateTime($horaire2));
        $rdv3->setLienVisio('google.com');
        $manager->persist($rdv3);

        $manager->flush();
    }
}
