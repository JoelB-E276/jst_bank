<?php

namespace App\DataFixtures;

use App\Entity\Operation;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use DateTime;

class OperationFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);
        $operation1 = new Operation();
        $operation1->setAccount($this->getReference('76310794789185'))
        ->setName('ACHAT LECLERC')
        ->setOperationDate(new DateTime())
        ->setAmount(80)
        ->setOperationType("D");
        $manager->persist($operation1);

        $operation2 = new Operation();
        $operation2->setAccount($this->getReference('76310794789185'))
        ->setName('VENTE PRODUIT 22/40')
        ->setOperationDate(new DateTime())
        ->setAmount(1500.99)
        ->setOperationType("C");
        $manager->persist($operation2);        
        
        $operation3 = new Operation();
        $operation3->setAccount($this->getReference('76125480580161'))
        ->setName('ACHAT LECLERC')
        ->setOperationDate(new DateTime())
        ->setAmount(50)
        ->setOperationType("D");
        $manager->persist($operation3);
        
        $operation4 = new Operation();
        $operation4->setAccount($this->getReference('76125480580161'))
        ->setName('PAIEMENT FACTURE')
        ->setOperationDate(new DateTime())
        ->setAmount(195.25)
        ->setOperationType("D");
        $manager->persist($operation4);

        $operation5 = new Operation();
        $operation5->setAccount($this->getReference('76125480580161'))
        ->setName('ACHAT MACHINE A LAVER')
        ->setOperationDate(new DateTime())
        ->setAmount(120)
        ->setOperationType("D");
        $manager->persist($operation5);

        $operation6 = new Operation();
        $operation6->setAccount($this->getReference('76043156789143'))
        ->setName('PAIEMENT COMPTANT PRODUIT')
        ->setOperationDate(new DateTime())
        ->setAmount(300)
        ->setOperationType("D");
        $manager->persist($operation6);

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            AccountFixtures::class,
        ];
    }
}
