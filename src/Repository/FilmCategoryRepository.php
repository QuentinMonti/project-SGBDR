<?php

namespace App\Repository;

use App\Entity\FilmCategory;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method FilmCategory|null find($id, $lockMode = null, $lockVersion = null)
 * @method FilmCategory|null findOneBy(array $criteria, array $orderBy = null)
 * @method FilmCategory[]    findAll()
 * @method FilmCategory[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FilmCategoryRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, FilmCategory::class);
    }

    public function sortASCFilmCategory()
    {
        return $this->createQueryBuilder('a')
            ->orderBy('a.category_id', 'ASC')
            ->getQuery()
            ->getResult()
        ;
    }

    public function sortCategoryASC()
    {
        return $this->createQueryBuilder('a')
            ->select('c.title, c.rental_rate, c.rating, b.name , COUNT(e.rental_id) AS rental_number')
            ->leftJoin(
                'App\Entity\Category',
                'b',
                'WITH',
                'b.category_id = a.category_id'
            )
            ->leftJoin(
                'App\Entity\Film',
                'c',
                'WITH',
                'c.film_id = a.film_id'
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
            ->groupBy('c.film_id')
            ->orderBy('b.name','ASC')
            ->getQuery()
            ->getResult()
        ;
    }

    public function sortCategoryDESC()
    {
        return $this->createQueryBuilder('a')
            ->select('c.title, c.rental_rate, c.rating, b.name , COUNT(e.rental_id) AS rental_number')
            ->leftJoin(
                'App\Entity\Category',
                'b',
                'WITH',
                'b.category_id = a.category_id'
            )
            ->leftJoin(
                'App\Entity\Film',
                'c',
                'WITH',
                'c.film_id = a.film_id'
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
            ->groupBy('c.film_id')
            ->orderBy('b.name','DESC')
            ->getQuery()
            ->getResult()
        ;
    }

    // /**
    //  * @return FilmCategory[] Returns an array of FilmCategory objects
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
    public function findOneBySomeField($value): ?FilmCategory
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
