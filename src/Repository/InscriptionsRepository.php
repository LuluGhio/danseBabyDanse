<?php

namespace App\Repository;

use App\Entity\Inscriptions;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Inscriptions|null find($id, $lockMode = null, $lockVersion = null)
 * @method Inscriptions|null findOneBy(array $criteria, array $orderBy = null)
 * @method Inscriptions[]    findAll()
 * @method Inscriptions[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class InscriptionsRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Inscriptions::class);
    }

    /**
     * @return Inscriptions[] Returns an array of Inscriptions objects
     */
    public function findAll(): array
    {
        $queryBuilder = $this->createQueryBuilder('i');    // 'i' is an alias = shortcut for Inscriptions

        return $this->createQueryBuilder('i')
                    ->orderBy('i.lastName','ASC')
        ;

        return $queryBuilder->getQuery()->getResult();

    }
    

    /*
    public function findOneBySomeField($value): ?Inscriptions
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
