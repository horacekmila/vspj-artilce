<?php

namespace App\Repository;

use App\Entity\ArticleMagazine;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ArticleMagazine|null find($id, $lockMode = null, $lockVersion = null)
 * @method ArticleMagazine|null findOneBy(array $criteria, array $orderBy = null)
 * @method ArticleMagazine[]    findAll()
 * @method ArticleMagazine[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ArticleMagazineRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ArticleMagazine::class);
    }

    // /**
    //  * @return ArticleMagazine[] Returns an array of ArticleMagazine objects
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
    public function findOneBySomeField($value): ?ArticleMagazine
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
