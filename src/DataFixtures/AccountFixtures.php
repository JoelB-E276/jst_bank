<?php

namespace App\DataFixtures;

use App\Entity\User;
use App\Entity\Account;
use App\Entity\AccountGroup;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use DateTime;

class AccountFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $account1 = new Account();
        $account1->setUser($this->getReference('Hopper'))
        ->setaccountNumber("76310794789185")
        ->setAccountGroup($this->getReference('COMPTE COURANT'))
        ->setAmount(1230.98)
        ->setCreatedAt(new DateTime());
        $this->addReference('76310794789185', $account1);
        $manager->persist($account1);

        $account2 = new Account();
        $account2->setUser($this->getReference('Lovelace'))
        ->setaccountNumber("76125480580161")
        ->setAccountGroup($this->getReference('COMPTE COURANT'))
        ->setAmount(560.30)
        ->setCreatedAt(new DateTime());
        $this->addReference('76125480580161', $account2);
        $manager->persist($account2);

        $account3 = new Account();
        $account3->setUser($this->getReference('Hopper'))
        ->setaccountNumber("76043156789143")
        ->setAccountGroup($this->getReference('Livret A'))
        ->setAmount(1200)
        ->setCreatedAt(new DateTime());
        $this->addReference('76043156789143', $account3);
        $manager->persist($account3);

        $account4 = new Account();
        $account4->setUser($this->getReference('Lovelace'))
        ->setaccountNumber("76362567890189")
        ->setAccountGroup($this->getReference('PEL'))
        ->setAmount(100)
        ->setCreatedAt(new DateTime());
        $this->addReference('76362567890189', $account4);
        $manager->persist($account4);

        $account5 = new Account();
        $account5->setUser($this->getReference('Lovelace'))
        ->setaccountNumber("76425923489021")
        ->setAccountGroup($this->getReference('Livret A'))
        ->setAmount(693.65)
        ->setCreatedAt(new DateTime());
        $this->addReference('76425923489021', $account5);
        $manager->persist($account5);        

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            UserFixtures::class,
            AccountGroupFixtures::class,
        ];
    }
}
