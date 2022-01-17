<?php

use App\Repository\UserRepository;
use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class TouristeControllerTest extends WebTestCase
{
    public function test_touriste_non_connecte_qui_veut_acceder_a_espace_est_redirige()
    {
        $client = static::createClient();
        $client->request('GET', '/espaceTouriste');
        // Si le client ne s'est pas connecté, renvoie le code 302 (redirection) vers la page de connexion
        $this->assertEquals(302, $client->getResponse()->getStatusCode());
    }

    public function test_client_accede_espace_si_connecte()
    {
        $client = static::createClient();
        $userRepository = $this->getContainer()->get(UserRepository::class);

        // Récupérer l'utilisateur test
        $testUser = $userRepository->findOneBy(['email' => 'chloe@gmail.com']);

        // simuler la connection de testUser
        $client->loginUser($testUser);

        // test d'accès à la page
        $client->request('GET', '/espaceTouriste');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }

    public function test_supprimer_un_rdv_utilise_agenda()
    {
        $agenda=$this->createMock(Agenda::class);
        $agenda->expects($this->once())->method("supprimerRdv");

        $touristeId = 1;
        $rdvId = 1;

        $suppressionRdVHandler=new SuppressionRdVHandler($agenda);
        $suppressionRdVCommand = new SuppressionRdVCommand($touristeId,$rdvId);

        $suppressionRdVHandler->handle($suppressionRdVCommand);
    }
}
