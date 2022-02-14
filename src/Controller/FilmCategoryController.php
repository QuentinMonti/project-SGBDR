<?php

namespace App\Controller;

use App\Entity\FilmCategory;
use App\Form\FilmCategoryType;
use App\Repository\FilmCategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Knp\Component\Pager\PaginatorInterface;



/**
 * @Route("/index")
 */
class FilmCategoryController extends AbstractController
{
    /**
     * @Route("/", name="film_category_asc", methods={"GET"})
     */
    public function index(FilmCategoryRepository $filmCategoryRepository,PaginatorInterface $paginator, Request $request): Response
    {
        $donnees = $filmCategoryRepository->sortCategoryASC();
        $film = $paginator->paginate(
            $donnees,
            $request->query->getInt('page',1),10

        );
        return $this->render('film_category/index.html.twig', [
            'film_categories' => $film,
        ]);
    }

    /**
     * @Route("/index/desc", name="film_category_desc", methods={"GET"})
     */
    public function sortCategoryDESC(FilmCategoryRepository $filmCategoryRepository,PaginatorInterface $paginator, Request $request): Response
    {
        $donnees = $filmCategoryRepository->sortCategoryDESC();
        $film = $paginator->paginate(
            $donnees,
            $request->query->getInt('page',1),10

        );
        return $this->render('film_category/index.html.twig', [
            'film_categories' => $film,
        ]);
    }
}
