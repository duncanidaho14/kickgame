<?php

namespace App\Controller;

use App\Entity\Categorie;
use App\Entity\Plateforme;
use App\Repository\ImageRepository;
use App\Repository\CategorieRepository;
use App\Repository\PlateformeRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CategorieController extends AbstractController
{
    /**
     * @Route("/categorie", name="categorie")
     */
    public function index(CategorieRepository $categorie, ImageRepository $irepo, PlateformeRepository $rplateforme)
    {
        $platforms = $rplateforme->findAll();
        $images = $irepo->findBy(
            [],
            [],
            $limit = null,
            $offset = null
        );
        $cat = $categorie->findAll();

        return $this->render('categorie/index.html.twig', [
            'cat' => $cat,
            'images' => $images,
            'platforms' => $platforms
        ]);
    }

    /**
     * @Route("/categorie/{id}", name="categorie.show", methods={"GET"})
     */
    public function show(Categorie $categorie, ImageRepository $irepo, PlateformeRepository $rplateforme)
    {
        $platforms = $rplateforme->findAll();
        $images = $irepo->findBy(
            [],
            [],
            $limit = null,
            $offset = null
        );
        return $this->render('categorie/show.html.twig', [
            'categorie' => $categorie,
            'images' => $images,
            'platforms' => $platforms
        ]);
    }
}
