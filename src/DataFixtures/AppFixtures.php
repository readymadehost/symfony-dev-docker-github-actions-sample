<?php

/**
 * @copyright ReadyMadeHost. All rights reserved.
 */

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
    /**
     * @var UserPasswordEncoderInterface
     */
    protected $userPasswordEncoder;

    public function __construct(UserPasswordEncoderInterface $userPasswordEncoder)
    {
        $this->userPasswordEncoder = $userPasswordEncoder;
    }

    public function load(ObjectManager $manager): void
    {
        /* Persisting test user */
        $testUser = new User();
        $testUser->setEmail('test@example.com')
            ->setPassword($this->userPasswordEncoder->encodePassword($testUser, 'test@123'));
        $manager->persist($testUser);

        $manager->flush();
    }
}
