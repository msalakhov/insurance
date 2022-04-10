<?php

namespace App\Repository;

use App\Entity\InsuranceObjectsTypes;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method InsuranceObjectsTypes|null find($id, $lockMode = null, $lockVersion = null)
 * @method InsuranceObjectsTypes|null findOneBy(array $criteria, array $orderBy = null)
 * @method InsuranceObjectsTypes[]    findAll()
 * @method InsuranceObjectsTypes[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class InsuranceObjectsTypesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, InsuranceObjectsTypes::class);
    }

    /**
     * @return InsuranceObjectsTypes[] Returns an array of InsuranceObjectsTypes objects
     */
    public function findAll()
    {
        return $this->createQueryBuilder('i')
            ->orderBy('i.id', 'ASC')
            ->getQuery()
            ->getResult()
        ;
    }

    // /**
    //  * @return InsuranceObjectsTypes[] Returns an array of InsuranceObjectsTypes objects
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
    public function findOneBySomeField($value): ?InsuranceObjectsTypes
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
