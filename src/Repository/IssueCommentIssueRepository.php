<?php

namespace App\Repository;

use App\Entity\IssueCommentIssue;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method IssueCommentIssue|null find($id, $lockMode = null, $lockVersion = null)
 * @method IssueCommentIssue|null findOneBy(array $criteria, array $orderBy = null)
 * @method IssueCommentIssue[]    findAll()
 * @method IssueCommentIssue[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class IssueCommentIssueRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, IssueCommentIssue::class);
    }

    // /**
    //  * @return IssueCommentIssue[] Returns an array of IssueCommentIssue objects
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
    public function findOneBySomeField($value): ?IssueCommentIssue
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
