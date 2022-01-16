<?php

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use App\Repository\UserRepository;
use App\Entity\User;


class ResponsableControllerTest extends WebTestCase
{
    public function test_responsable_non_connecte_est_redirige()
    {
        // Cas d'un utilisateur non connecté
        $client = static::createClient();
        $client->request('GET', '/espaceResponsable');
        // Si le client ne s'est pas un responsable, renvoie le code 302 (redirection) vers la page de connexion
        $this->assertEquals(302, $client->getResponse()->getStatusCode());
    }

    public function test_responsable_connecte()
    {
        $client = static::createClient();
        $userRepository = $this->getContainer()->get(UserRepository::class);

        // On récupere un utilisateur responsable
        $testUser = $userRepository->findOneBy(['email' => 'valentin@yahoo.fr']);

        // simuler la connection de testUser
        $client->loginUser($testUser);

        $client->request('GET', '/espaceResponsable');
        // Si le client est un responsable, il peut acceder à l'espace responsable (code 200)
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }

    public function test_touriste_redirige()
    {
        // Cas d'un utilisateur non responsable
        $client = static::createClient();

        $userRepository = $this->getContainer()->get(UserRepository::class);
        // On récupere un utilisateur quelconque
        $testUser = $userRepository->findOneBy(['email' => 'chloe@gmail.com']);
        // simuler la connection de testUser
        $client->loginUser($testUser);
        $client->request('GET', '/espaceResponsable');
        $this->assertEquals(403, $client->getResponse()->getStatusCode());
    }
}