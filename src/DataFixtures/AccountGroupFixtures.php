<?php

namespace App\DataFixtures;


use App\Entity\AccountGroup;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AccountGroupFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $AccountGroup1 = new AccountGroup();
        $AccountGroup1->setName('COMPTE COURANT');
        $this->addReference('COMPTE COURANT', $AccountGroup1);
        $manager->persist($AccountGroup1);

        $AccountGroup2 = new AccountGroup();
        $AccountGroup2->setName('Livret A');
        $this->addReference('LIVRET A', $AccountGroup2);
        $manager->persist($AccountGroup2);

        $AccountGroup3 = new AccountGroup();
        $AccountGroup3->setName('PEL');
        $this->addReference('PEL', $AccountGroup3);
        $manager->persist($AccountGroup3);

        $manager->flush();
    }
}
