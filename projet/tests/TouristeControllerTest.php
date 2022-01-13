<?php

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

}