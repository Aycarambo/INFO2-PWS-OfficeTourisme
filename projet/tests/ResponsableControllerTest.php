<?php

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ResponsableControllerTest extends WebTestCase
{
    public function test_responsable_non_connecte_est_redirige()
    {
        $client = static::createClient();
        $client->request('POST', '/espaceResponsable');
        // Si le client ne s'est pas connecté, renvoie le code 302 (redirection) vers la page de connexion
        $this->assertEquals(302, $client->getResponse()->getStatusCode());
    }

}