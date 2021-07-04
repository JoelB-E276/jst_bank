<?php

namespace App\DataFixtures;

use App\Entity\User;
use App\Entity\Account;
use App\Entity\AccountType;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AccountFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);
        $user = new User();
        $account1 = new Account();
        $account1->setUser($user)
        ->setaccountNumber("AAA")
        ->setAccountType($this->getReference('COMPTE COURANT'));
        $manager->persist($account1);
        $manager->flush();
    }
}
