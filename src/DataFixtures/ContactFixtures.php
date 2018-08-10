<?php

namespace App\DataFixtures;

use App\Entity\Contact;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Validator\Constraints\DateTime;

class ContactFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for ($i=1; $i<=20; $i++){
        	$contact = new Contact();
        	$contact->setFirstName ("Prénom de $i")
        			->setLastName ("Nom de $i")
        			->setEmail ("Email de $i")
        			->setPhoneNumber ("01 02 03 04 05")
        			->setContent ("<p>Contenu du message de $i</p>")
        			->setPostedAt (new \DateTime());
        			
        	$manager->persist($contact);
        }

        $manager->flush();
    }
}
