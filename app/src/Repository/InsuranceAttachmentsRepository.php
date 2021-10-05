<?php

namespace App\Repository;

use App\Entity\InsuranceAttachments;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method InsuranceAttachments|null find($id, $lockMode = null, $lockVersion = null)
 * @method InsuranceAttachments|null findOneBy(array $criteria, array $orderBy = null)
 * @method InsuranceAttachments[]    findAll()
 * @method InsuranceAttachments[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class InsuranceAttachmentsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, InsuranceAttachments::class);
    }

    // /**
    //  * @return InsuranceAttachments[] Returns an array of InsuranceAttachments objects
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
    public function findOneBySomeField($value): ?InsuranceAttachments
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
