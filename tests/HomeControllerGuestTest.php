<?php

/**
 * @copyright ReadyMadeHost. All rights reserved.
 */

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class HomeControllerGuestTest extends WebTestCase
{
    public function testHomeForGuest()
    {
        $client = self::createClient();
        /** @var \Symfony\Bundle\FrameworkBundle\Routing\Router $router */
        $router = $this->getContainer()->get('router');

        $client->request('GET', $router->generate('app_home'));

        self::assertResponseIsSuccessful();
        self::assertSelectorTextContains('h1', 'Symfony dev docker sample');
        self::assertSelectorTextContains('h4', 'Hello guest!');
    }
}
