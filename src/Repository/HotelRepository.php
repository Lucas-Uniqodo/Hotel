<?php

namespace App\Repository;

use App\Entity\Hotel;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Hotel|null find($id, $lockMode = null, $lockVersion = null)
 * @method Hotel|null findOneBy(array $criteria, array $orderBy = null)
 * @method Hotel[]    findAll()
 * @method Hotel[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HotelRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Hotel::class);
    }

    // /**
    //  * @return Hotel[] Returns an array of Hotel objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('h.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Hotel
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
    public function findAllBelowPrice( float $price ): ?array 
    {
        // return $this->createQueryBuilder('h')
        //     ->andWhere('h.price < :price')
        //     ->setParameter('price', $price)
        //     ->orderBy('h.id', 'ASC')
        //     ->setMaxResults(10)
        //     ->getQuery()
        //     ->getResult();
        $entityManager = $this->getEntityManager();

        return $entityManager->createQuery(
            'SELECT h FROM App\Entity\Hotel h 
            WHERE h.price < :price
            ORDER BY h.id ASC'
        )
        ->setParameter('price', $price)
        ->execute();
    }

}
