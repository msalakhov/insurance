<?php

namespace App\Repository;

use App\Entity\InsuranceObjectsTypesFields;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method InsuranceObjectsTypesFields|null find($id, $lockMode = null, $lockVersion = null)
 * @method InsuranceObjectsTypesFields|null findOneBy(array $criteria, array $orderBy = null)
 * @method InsuranceObjectsTypesFields[]    findAll()
 * @method InsuranceObjectsTypesFields[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class InsuranceObjectsTypesFieldsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, InsuranceObjectsTypesFields::class);
    }

    // /**
    //  * @return InsuranceObjectsTypesFields[] Returns an array of InsuranceObjectsTypesFields objects
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
    public function findOneBySomeField($value): ?InsuranceObjectsTypesFields
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
