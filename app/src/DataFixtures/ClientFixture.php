<?php

namespace App\DataFixtures;

use App\ImageOptimizer;
use App\Entity\Client;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Faker\Generator;
use Symfony\Component\HttpFoundation\File\Exception\FileException;

class ClientFixture extends Fixture implements DependentFixtureInterface
{
    private Generator $faker;

    public function __construct()
    {
        $this->faker = Factory::create();
    }

    public function load(ObjectManager $manager)
    {
        for ($i = 0; $i < 4; $i++) {
            $client = new Client();
            $client->setName($this->faker->name);
            $client->setCity($this->faker->city);
            $client->setPhoto($this->faker->image);
            $client->setEmail($this->faker->email);
            $client->setUser($this->getReference(UserFixtures::USER_REFERENCE));

            $manager->persist($client);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            UserFixtures::class,
        ];
    }
}
