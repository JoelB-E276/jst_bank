<?php

namespace App\DataFixtures;

use App\Entity\User;
use DateTime;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    private $encoder;
    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);
        $user1 = new User();
        $password = $this->encoder->encodePassword($user1,'123456');
        $user1->setEmail("hopper@maboitemail.fr")
        ->setPassword($password)
        ->setFirstname("Grace")
        ->setLastname("Hopper")
        ->setAdress("fifh avenue")
        ->setCity("New-York")
        ->setZipCode("10021")
        ->setBirthDate(new DateTime("09-12-1906"))
        ->setSex("F");
        $manager->persist($user1);

        $user2 = new User();
        $password = $this->encoder->encodePassword($user2,'1234567');
        $user2->setEmail("lovelace@gmail.com")
        ->setPassword($password)
        ->setFirstname("Ada")
        ->setLastname("Lovelace")
        ->setAdress("12 Downing street")
        ->setCity("Londres")
        ->setZipCode("SW1A2")
        ->setBirthDate(new DateTime("10-12-1815"))
        ->setSex("F");
        $manager->persist($user2);

        $user3 = new User();
        $password = $this->encoder->encodePassword($user3,'12345678');
        $user3->setEmail("lamarr@yahoo.fr")
        ->setPassword($password)
        ->setFirstname("Hedy")
        ->setLastname("Lamarr")
        ->setAdress("27 Prinz Eugen-Strabe")
        ->setCity("Vienne")
        ->setZipCode("1030")
        ->setBirthDate(new DateTime("09-11-1914"))
        ->setSex("F");
        $manager->persist($user3);      

        $manager->flush();

        $this->addReference("Hopper", $user1);
        $this->addReference("Lovelace", $user2);
        $this->addReference("Lamarr", $user3);

    }
}
