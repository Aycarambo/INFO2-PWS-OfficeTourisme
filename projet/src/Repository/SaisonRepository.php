<?php

namespace App\Repository;

use App\Entity\Saison;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Saison|null find($id, $lockMode = null, $lockVersion = null)
 * @method Saison|null findOneBy(array $criteria, array $orderBy = null)
 * @method Saison[]    findAll()
 * @method Saison[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SaisonRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Saison::class);
    }

    public function getSaison()
    {
        return $this->createQueryBuilder('s')
            ->getQuery()
            ->getOneOrNullResult();
    }

    // /**
    //  * @return Saison[] Returns an array of Saison objects
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
    public function findOneBySomeField($value): ?Saison
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
