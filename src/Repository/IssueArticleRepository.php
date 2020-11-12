<?php

namespace App\Repository;

use App\Entity\IssueArticle;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method IssueArticle|null find($id, $lockMode = null, $lockVersion = null)
 * @method IssueArticle|null findOneBy(array $criteria, array $orderBy = null)
 * @method IssueArticle[]    findAll()
 * @method IssueArticle[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class IssueArticleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, IssueArticle::class);
    }

    // /**
    //  * @return IssueArticle[] Returns an array of IssueArticle objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('i.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?IssueArticle
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
