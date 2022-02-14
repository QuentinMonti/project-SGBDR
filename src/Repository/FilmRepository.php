<?php

namespace App\Repository;

use App\Entity\Film;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Film|null find($id, $lockMode = null, $lockVersion = null)
 * @method Film|null findOneBy(array $criteria, array $orderBy = null)
 * @method Film[]    findAll()
 * @method Film[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FilmRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Film::class);
    }

    public function sortASCFilm()
    {
        return $this->createQueryBuilder('a')
            ->select('a.title, a.rental_rate, a.rating, b.name , COUNT(e.rental_id) AS rental_number')
            
            ->leftJoin(
                'App\Entity\FilmCategory',
                'c',
                'WITH',
                'c.film_id = a.film_id'
            )
            ->leftJoin(
                'App\Entity\Category',
                'b',
                'WITH',
                'b.category_id = c.category_id'
            )
            ->leftJoin(
                'App\Entity\Inventory',
                'd',
                'WITH',
                'd.film_id = c.film_id'
            )
            ->leftJoin(
                'App\Entity\Rental',
                'e',
                'WITH',
                'e.inventory_id = d.inventory_id'
            )
            ->groupBy('d.film_id')
            ->orderBy('a.title','ASC')
            ->getQuery()
            ->getResult()
        ;
    }

    public function sortDESCFilm()
    {
        return $this->createQueryBuilder('a')
            ->select('a.title, a.rental_rate, a.rating, b.name , COUNT(e.rental_id) AS rental_number')
            
            ->leftJoin(
                'App\Entity\FilmCategory',
                'c',
                'WITH',
                'c.film_id = a.film_id'
            )
            ->leftJoin(
                'App\Entity\Category',
                'b',
                'WITH',
                'b.category_id = c.category_id'
            )
            ->leftJoin(
                'App\Entity\Inventory',
                'd',
                'WITH',
                'd.film_id = c.film_id'
            )
            ->leftJoin(
                'App\Entity\Rental',
                'e',
                'WITH',
                'e.inventory_id = d.inventory_id'
            )
            ->groupBy('d.film_id')
            ->orderBy('a.title','DESC')
            ->getQuery()
            ->getResult()
        ;
    }

    public function sortASCRental()
    {
        return $this->createQueryBuilder('a')
        ->select('a.title, a.rental_rate, a.rating, b.name , COUNT(e.rental_id) AS rental_number')
        
        ->leftJoin(
            'App\Entity\FilmCategory',
            'c',
            'WITH',
            'c.film_id = a.film_id'
        )
        ->leftJoin(
            'App\Entity\Category',
            'b',
            'WITH',
            'b.category_id = c.category_id'
        )
        ->leftJoin(
            'App\Entity\Inventory',
            'd',
            'WITH',
            'd.film_id = c.film_id'
        )
        ->leftJoin(
            'App\Entity\Rental',
            'e',
            'WITH',
            'e.inventory_id = d.inventory_id'
        )
        ->groupBy('d.film_id')
        ->orderBy('rental_number','ASC')
        ->getQuery()
        ->getResult()
        ;
    }

    public function sortDESCRental()
    {
        return $this->createQueryBuilder('a')
            ->select('a.title, a.rental_rate, a.rating, b.name , COUNT(e.rental_id) AS rental_number')
            
            ->leftJoin(
                'App\Entity\FilmCategory',
                'c',
                'WITH',
                'c.film_id = a.film_id'
            )
            ->leftJoin(
                'App\Entity\Category',
                'b',
                'WITH',
                'b.category_id = c.category_id'
            )
            ->leftJoin(
                'App\Entity\Inventory',
                'd',
                'WITH',
                'd.film_id = c.film_id'
            )
            ->leftJoin(
                'App\Entity\Rental',
                'e',
                'WITH',
                'e.inventory_id = d.inventory_id'
            )
            ->groupBy('d.film_id')
            ->orderBy('rental_number','DESC')
            ->getQuery()
            ->getResult()
        ;
    }

    // /**
    //  * @return Film[] Returns an array of Film objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('f.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Film
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
