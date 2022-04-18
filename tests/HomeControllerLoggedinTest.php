<?php

/**
 * @copyright ReadyMadeHost. All rights reserved.
 */

namespace App\Tests;

use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class HomeControllerLoggedinTest extends WebTestCase
{
    public function testHomeForLoggedin()
    {
        $client = self::createClient();
        /** @var \Symfony\Bundle\FrameworkBundle\Routing\Router $router */
        $router = $this->getContainer()->get('router');
        /** @var UserRepository $userRepository */
        $userRepository = $this->getContainer()->get(UserRepository::class);

        $loggedinEmail = 'test@example.com';
        $testUser = $userRepository->findOneBy(['email' => $loggedinEmail]);
        $client->loginUser($testUser);

        $client->request('GET', $router->generate('app_home'));

        self::assertResponseIsSuccessful();
        self::assertSelectorTextContains('h4', 'Hello ' . $loggedinEmail . '!');
    }
}
