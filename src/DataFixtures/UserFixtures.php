<?php

namespace App\DataFixtures;

use App\Entity\User;
use DateTime;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);
        $user1 = new User();
        $user1->setEmail("hopper@maboitemail.fr")
        ->setPassword("Cobol")
        ->setFirstname("Grace")
        ->setLastname("Hopper")
        ->setAdress("fifh avenue")
        ->setCity("New-York")
        ->setZipCode("10021")
        ->setBirthDate(new DateTime("09-12-1906"))
        ->setSex("F");
        $manager->persist($user1);

        $user2 = new User();
        $user2->setEmail("lovelace@gmail.com")
        ->setPassword("firstprogram")
        ->setFirstname("Ada")
        ->setLastname("Lovelace")
        ->setAdress("12 Downing street")
        ->setCity("Londres")
        ->setZipCode("SW1A 2AA")
        ->setBirthDate(new DateTime("10-12-1815"))
        ->setSex("F");
        $manager->persist($user2);

        $user3 = new User();
        $user3->setEmail("lamarr@yahoo.fr")
        ->setPassword("fhss")
        ->setFirstname("Hedy")
        ->setLastname("Lamarr")
        ->setAdress("27 Prinz Eugen-Strabe")
        ->setCity("Vienne")
        ->setZipCode("1030")
        ->setBirthDate(new DateTime("09-11-1914"))
        ->setSex("F");
        $manager->persist($user3);      

        $manager->flush();
    }
}
