<?php

namespace App\Repository;

use App\Entity\ContentPage;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ContentPage|null find($id, $lockMode = null, $lockVersion = null)
 * @method ContentPage|null findOneBy(array $criteria, array $orderBy = null)
 * @method ContentPage[]    findAll()
 * @method ContentPage[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ContentPageRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ContentPage::class);
    }

    // /**
    //  * @return ContentPage[] Returns an array of ContentPage objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ContentPage
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
