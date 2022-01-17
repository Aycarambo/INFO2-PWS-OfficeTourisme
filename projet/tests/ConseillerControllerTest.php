<?php

use App\Repository\UserRepository;
use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ConseillerControllerTest extends WebTestCase
{
    public function test_conseiller_non_connecte_qui_veut_acceder_a_espace_est_redirige()
    {
        $client = static::createClient();
        $client->request('GET', '/espaceConseiller/');
        // Si le client ne s'est pas connecté, renvoie le code 302 (redirection) vers la page de connexion
        $this->assertEquals(302, $client->getResponse()->getStatusCode());
    }

    public function test_conseiller_connecte_qui_veut_acceder_a_espace_conseiller()
    {
        $client = static::createClient();
        $userRepository = $this->getContainer()->get(UserRepository::class);

        // Récupérer l'utilisateur test
        $testUser = $userRepository->findOneBy(['email' => 'theotimeo@free.fr']);

        // Simuler la connection de testUser
        $client->loginUser($testUser);

        // Test d'accès à la page
        $client->request('GET', '/espaceConseiller/');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }

    public function test_conseiller_non_connecte_qui_veut_acceder_a_ses_rdv_de_la_semaine()
    {
        $client = static::createClient();
        $client->request('GET', '/espaceConseiller/MesRDV/semaine+0');
        // Si le client ne s'est pas connecté, renvoie le code 302 (redirection) vers la page de connexion
        $this->assertEquals(302, $client->getResponse()->getStatusCode());
    }

    public function test_conseiller_connecte_qui_veut_acceder_a_ses_rdv_de_la_semaine()
    {
        $client = static::createClient();
        $userRepository = $this->getContainer()->get(UserRepository::class);

        // Récupérer l'utilisateur test
        $testUser = $userRepository->findOneBy(['email' => 'theotimeo@free.fr']);

        // Simuler la connection de testUser
        $client->loginUser($testUser);

        // Test d'accès à la page
        $client->request('GET', '/espaceConseiller/MesRDV/semaine+0');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }

    public function test_conseiller_non_connecte_qui_veut_acceder_a_ses_rdv_de_la_semaine_prochaine()
    {
        $client = static::createClient();
        $client->request('GET', '/espaceConseiller/MesRDV/semaine+1');
        // Si le client ne s'est pas connecté, renvoie le code 302 (redirection) vers la page de connexion
        $this->assertEquals(302, $client->getResponse()->getStatusCode());
    }

    public function test_conseiller_connecte_qui_veut_acceder_a_ses_rdv_de_la_semaine_prochaine()
    {
        $client = static::createClient();
        $userRepository = $this->getContainer()->get(UserRepository::class);

        // Récupérer l'utilisateur test
        $testUser = $userRepository->findOneBy(['email' => 'theotimeo@free.fr']);

        // Simuler la connection de testUser
        $client->loginUser($testUser);

        // Test d'accès à la page
        $client->request('GET', '/espaceConseiller/MesRDV/semaine+1');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }

    public function test_conseiller_non_connecte_qui_veut_acceder_a_ses_rdv_de_la_semaine_précédente()
    {
        $client = static::createClient();
        $client->request('GET', '/espaceConseiller/MesRDV/semaine-1');
        // Si le client ne s'est pas connecté, renvoie le code 302 (redirection) vers la page de connexion
        $this->assertEquals(302, $client->getResponse()->getStatusCode());
    }

    public function test_conseiller_connecte_qui_veut_acceder_a_ses_rdv_de_la_semaine_précédente()
    {
        $client = static::createClient();
        $userRepository = $this->getContainer()->get(UserRepository::class);

        // Récupérer l'utilisateur test
        $testUser = $userRepository->findOneBy(['email' => 'theotimeo@free.fr']);

        // Simuler la connection de testUser
        $client->loginUser($testUser);

        // Test d'accès à la page
        $client->request('GET', '/espaceConseiller/MesRDV/semaine-1');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }

    public function test_conseiller_non_connecte_qui_veut_acceder_au_détail_du_prochain_rdv()
    {
        $client = static::createClient();
        $client->request('GET', '/espaceConseiller/detailRDV/1');
        // Si le client ne s'est pas connecté, renvoie le code 302 (redirection) vers la page de connexion
        $this->assertEquals(302, $client->getResponse()->getStatusCode());
    }

    public function test_conseiller_non_qui_veut_acceder_au_détail_du_prochain_rdv()
    {
        $client = static::createClient();
        $userRepository = $this->getContainer()->get(UserRepository::class);

        // Récupérer l'utilisateur test
        $testUser = $userRepository->findOneBy(['email' => 'theotimeo@free.fr']);

        // Simuler la connection de testUser
        $client->loginUser($testUser);

        // Test d'accès à la page
        $client->request('GET', '/espaceConseiller/detailRDV/1');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }

}