<?php

namespace App\DataFixtures;

use App\Entity\Actus;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Validator\Constraints\DateTime;

class ActusFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for ($i=1; $i<=10; $i++){
        	$actus = new Actus();
        	$actus->setTitle ("Titre de $i")
        			->setPlace ("lieu de $i")
        			->setEventDate (new \DateTime())
        			->setContent ("Contenu de $i")
        			->setPrice ("Prix/personne de $i")
        			->setUrlImg ("Image de $i")
        			->setCreatedAt (new \DateTime());

        	$manager->persist($actus);
        }

        $manager->flush();
    }
}
