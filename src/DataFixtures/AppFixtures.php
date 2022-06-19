<?php

namespace App\DataFixtures;

use App\Entity\Employes;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{

    public function __construct()
    {
        //$this->faker =Factory::create('fr_FR');
    }
    public function load(ObjectManager $manager): void
    {

        $manager->flush();
    }
}
