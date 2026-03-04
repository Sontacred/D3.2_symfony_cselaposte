<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Site;
use App\Entity\Salarie;
use Faker\Factory;
use Faker\Generator;

class AppFixtures extends Fixture
{
    private Generator $faker;

    public function __construct()
    {
        $this->faker = Factory::create('fr_FR');
    }

    public function load(ObjectManager $manager): void
    {
        // Création de 10 sites
        for ($i = 1; $i <= 10; $i++) {

            $site = new Site();
            $site->setNomSite($this->faker->region());
            $manager->persist($site);

            // Ajout de 3 salariés pour chaque site
            for ($j = 1; $j <= 3; $j++) {

                $salarie = new Salarie();
                $salarie->setNomSal($this->faker->lastName());
                $salarie->setPrenomSal($this->faker->firstName());
                $salarie->setEmailSal($this->faker->email());
                $salarie->setMdpSal("secret");
                $salarie->setSiteSal($site);

                $manager->persist($salarie);
            }
        }

        $manager->flush();
    }
}