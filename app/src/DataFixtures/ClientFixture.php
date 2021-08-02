<?php

namespace App\DataFixtures;

use App\Entity\Client;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class ClientFixture extends Fixture
{
    private $faker;

    public function __construct()
    {
        $this->faker = Factory::create();
    }

    public function load(ObjectManager $manager)
    {
        for ($i = 0; $i < 4; $i++) {
            $manager->persist($this->getClient());

        }

        $manager->flush();
    }

    private function getClient()
    {
        return new Client(
            $this->faker->name(),
            $this->faker->city(),
            $this->faker->image()
        );
    }
}
