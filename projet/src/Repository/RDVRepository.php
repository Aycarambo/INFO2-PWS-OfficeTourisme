<?php

namespace App\Repository;

use App\Domain\Agenda;
use App\Entity\RDV;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method RDV|null find($id, $lockMode = null, $lockVersion = null)
 * @method RDV|null findOneBy(array $criteria, array $orderBy = null)
 * @method RDV[]    findAll()
 * @method RDV[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RDVRepository extends ServiceEntityRepository implements Agenda
{
    public function supprimerRdv($touristeId, $rdvId)
    {

        $rdv = $this->find($rdvId);
        if ($rdv != NULL)
        {
            $this->getEntityManager()->remove($rdv);
            $this->getEntityManager()->flush();
        }
    }

    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, RDV::class);
    }

    // /**
    //  * @return RDV[] Returns an array of RDV objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?RDV
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
    public function trouveLaListeRDVs(int $id, $premierJourSemaine, $finDeSemaine)
    {
        $querybuilder=$this->createQueryBuilder('rdv')
            ->where('rdv.horaire >= :premierJour')
            ->andWhere('rdv.horaire <= :finSemaine')
            ->andWhere('rdv.Conseiller = :idConseiller')
            ->setParameter('idConseiller', $id)
            ->setParameter('premierJour', $premierJourSemaine)
            ->setParameter('finSemaine', $finDeSemaine);
        $query=$querybuilder->getQuery();
        $results = $query->execute();
        return $results;
    }
}
