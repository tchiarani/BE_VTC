<?php

namespace App\Repository;

use App\Entity\Inclus;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Inclus|null find($id, $lockMode = null, $lockVersion = null)
 * @method Inclus|null findOneBy(array $criteria, array $orderBy = null)
 * @method Inclus[]    findAll()
 * @method Inclus[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class InclusRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Inclus::class);
    }

    // /**
    //  * @return Inclus[] Returns an array of Inclus objects
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
    public function findOneBySomeField($value): ?Inclus
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
