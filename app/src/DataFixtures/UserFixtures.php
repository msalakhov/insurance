<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{
    public const USER_REFERENCE = 'user';

    public function __construct(private UserPasswordHasherInterface $hasher) {}

    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setEmail('aaa@aaa.com');
        $user->setPassword($this->hasher->hashPassword($user, 'qwerty123456'));
        $user->setRoles(['ROLE_USER']);
        
        $manager->persist($user);
        $manager->flush();

        $this->addReference(self::USER_REFERENCE, $user);
    }
}
