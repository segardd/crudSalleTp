<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Salle;
use App\Entity\Ordinateur;

class SalleOrdinateurFixtures extends Fixture
{
    public function load(ObjectManager $manager) {
        $salle1 = new Salle;
        $salle1->setBatiment('A');
        $salle1->setEtage(1);
        $salle1->setNumero(11);
        $manager->persist($salle1);
        $salle2 = new Salle;
        $salle2->setBatiment('A');
        $salle2->setEtage(2);
        $salle2->setNumero(22);
        $manager->persist($salle2);
        $ordi1 = new Ordinateur;
        $ordi1->setNumero(5);
        $ordi1->setIp('10.1.16.005');
        $ordi1->setSalle($salle1);
        $manager->persist($ordi1);
        $ordi2 = new Ordinateur;
        $ordi2->setNumero(6);
        $ordi2->setIp('10.1.16.006');
        $ordi2->setSalle($salle2);
        $manager->persist($ordi2);
        $ordi3 = new Ordinateur;
        $ordi3->setNumero(7);
        $ordi3->setIp('10.1.16.007');
        $manager->persist($ordi3);
        $manager->flush();
        }
       
}
