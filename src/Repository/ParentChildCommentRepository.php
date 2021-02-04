<?php

namespace App\Repository;

use App\Entity\ParentChildComment;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ParentChildComment|null find($id, $lockMode = null, $lockVersion = null)
 * @method ParentChildComment|null findOneBy(array $criteria, array $orderBy = null)
 * @method ParentChildComment[]    findAll()
 * @method ParentChildComment[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ParentChildCommentRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ParentChildComment::class);
    }

    // /**
    //  * @return ParentChildComment[] Returns an array of ParentChildComment objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ParentChildComment
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
