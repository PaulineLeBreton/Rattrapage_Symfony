<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Ville;
use App\Entity\Etudiant;
use App\Entity\Ecole;
use Faker;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {

        $faker = Faker\Factory::create('fr_FR');

        for ($v = 1; $v <= 5; $v++){
            $ville = new Ville();
            $ville->setNom("ville$v");
            $manager->persist($ville);


            for ($r = 1; $r <= 5; $r++){
                $ecole = new Ecole();
                $ecole->setNom("ecole$r")
                    ->setAdresse("adresse$r")
                    ->setImage("https://picsum.photos/200/300")
                    ->setVille($ville);
                $manager->persist($ecole);


                for ($s = 1; $s <= 5; $s++){
                    $date = new DateTime();

                    $etudiant = new Etudiant();
                    $etudiant->setNom("nom$s")
                            ->setPrenom("prenom$s")
                            ->setDateNaissance($date)
                            ->setEtudiant($etudiant);
                    $manager->persist($etudiant);
                }
            }
        }
        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }
}
