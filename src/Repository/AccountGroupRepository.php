<?php

namespace App\Repository;

use App\Entity\AccountGroup;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method AccountGroup|null find($id, $lockMode = null, $lockVersion = null)
 * @method AccountGroup|null findOneBy(array $criteria, array $orderBy = null)
 * @method AccountGroup[]    findAll()
 * @method AccountGroup[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AccountGroupRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AccountGroup::class);
    }

    // /**
    //  * @return AccountGroup[] Returns an array of AccountGroup objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?AccountGroup
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
