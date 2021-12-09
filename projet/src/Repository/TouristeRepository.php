<?php

namespace App\Repository;

use App\Entity\Touriste;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Touriste|null find($id, $lockMode = null, $lockVersion = null)
 * @method Touriste|null findOneBy(array $criteria, array $orderBy = null)
 * @method Touriste[]    findAll()
 * @method Touriste[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TouristeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Touriste::class);
    }

    // /**
    //  * @return Touriste[] Returns an array of Touriste objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Touriste
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
