<?php

namespace App\Repository;

use App\Entity\Permis;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Permis|null find($id, $lockMode = null, $lockVersion = null)
 * @method Permis|null findOneBy(array $criteria, array $orderBy = null)
 * @method Permis[]    findAll()
 * @method Permis[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PermisRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Permis::class);
    }

    // /**
    //  * @return Permis[] Returns an array of Permis objects
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
    public function findOneBySomeField($value): ?Permis
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
