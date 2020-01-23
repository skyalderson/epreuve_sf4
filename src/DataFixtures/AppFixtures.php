<?php

namespace App\DataFixtures;

use App\Entity\Joueurs;
use App\Entity\Carte;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $carte[0] = new Carte();
        $carte[0]->setNom('Carte 1');
        $manager->persist($carte[0]);

        $carte[1] = new Carte();
        $carte[1]->setNom('Carte 1');
        $manager->persist($carte[1]);

        $joueur = new Joueurs();
        $joueur->setNom("Didier");
        $joueur->setEmail("didier@didier.com");
        $joueur->setScore(153);
        $joueur->setCarte($carte[0]);
        $joueur->setPositionX(4);
        $joueur->setPositionY(8);
        $manager->persist($joueur);

        $joueur = new Joueurs();
        $joueur->setNom("Georges");
        $joueur->setEmail("georges@georges.com");
        $joueur->setScore(2);
        $joueur->setCarte($carte[0]);
        $joueur->setPositionX(15);
        $joueur->setPositionY(16);
        $manager->persist($joueur);

        $joueur = new Joueurs();
        $joueur->setNom("Martine");
        $joueur->setEmail("martine@martine.com");
        $joueur->setScore(26);
        $joueur->setCarte($carte[1]);
        $joueur->setPositionX(23);
        $joueur->setPositionY(42);
        $manager->persist($joueur);




        $manager->flush();
    }
}
