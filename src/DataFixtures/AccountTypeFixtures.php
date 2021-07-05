<?php

namespace App\DataFixtures;


use App\Entity\AccountType;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AccountTypeFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $accountType1 = new AccountType();
        $accountType1->setName('COMPTE COURANT');
        $this->addReference('COMPTE COURANT', $accountType1);
        $manager->persist($accountType1);

        $accountType2 = new AccountType();
        $accountType2->setName('Livret A');
        $this->addReference('Livret A', $accountType2);
        $manager->persist($accountType2);

        $accountType3 = new AccountType();
        $accountType3->setName('PEL');
        $this->addReference('PEL', $accountType3);
        $manager->persist($accountType3);

        $manager->flush();
    }
}
