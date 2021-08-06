<?php

namespace App\DataFixtures;

use App\Entity\InsuranceObjectsTypes;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class InsuranceObjectsTypesFixture extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $arTypes = ['Home', 'Auto', 'Collection', 'Umbrella'];
        foreach ($arTypes as $type) {
            $insuranceObjectsTypes = new InsuranceObjectsTypes($type);
            $manager->persist($insuranceObjectsTypes);
        }

        $manager->flush();
    }
}
