<?php

namespace App\Repository;

use App\Entity\Actus;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Actus|null find($id, $lockMode = null, $lockVersion = null)
 * @method Actus|null findOneBy(array $criteria, array $orderBy = null)
 * @method Actus[]    findAll()
 * @method Actus[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ActusRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Actus::class);
    }

    /*
     * @param $eventDate
     * @return Actus[]
    */
    public function findByExampleField($eventDate): array   // Returns an array of Actus objects
    {
        $queryBuilder = $this->createQueryBuilder('a')      // 'a' is an alias = shortcut for Actus
            ->andWhere('a.eventDate < :eventDate')          // eventDate après la date où l'on charge la requête
            ->setParameter('eventDate', $eventDate)
            ->orderBy('a.eventDate', 'DESC')
            ->setMaxResults(3)
        ;

        return $queryBuilder->getQuery()->getResult();
    }

}
