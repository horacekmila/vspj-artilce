<?php

namespace App\Repository;

use App\Entity\StateStateGroup;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method StateStateGroup|null find($id, $lockMode = null, $lockVersion = null)
 * @method StateStateGroup|null findOneBy(array $criteria, array $orderBy = null)
 * @method StateStateGroup[]    findAll()
 * @method StateStateGroup[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class StateStateGroupRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, StateStateGroup::class);
    }

    // /**
    //  * @return StateStateGroup[] Returns an array of StateStateGroup objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?StateStateGroup
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
