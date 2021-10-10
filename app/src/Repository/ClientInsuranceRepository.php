<?php

namespace App\Repository;

use App\Entity\ClientInsurance;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ClientInsurance|null find($id, $lockMode = null, $lockVersion = null)
 * @method ClientInsurance|null findOneBy(array $criteria, array $orderBy = null)
 * @method ClientInsurance[]    findAll()
 * @method ClientInsurance[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ClientInsuranceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ClientInsurance::class);
    }

    // /**
    //  * @return ClientInsurance[] Returns an array of ClientInsurance objects
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


    public function findInsLteDate(\DateTime $dateTime): ?ClientInsurance
    {
        $qb = $this->createQueryBuilder('ci');

        $qb
            ->andWhere($qb->expr()->lte('ci.renewalDate', ':date'))
            ->setParameter(':date', $dateTime->format('Y-m-d'));

        return $qb->getQuery()->getResult();
    }
}
