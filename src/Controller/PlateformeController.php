<?php

namespace App\Controller;

use App\Entity\Plateforme;
use App\Repository\ImageRepository;
use App\Repository\PlateformeRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PlateformeController extends AbstractController
{
    /**
     * @Route("/plateforme/{id}", name="plateforme.show", methods={"GET"})
     */
    public function show(PlateformeRepository $prepo, Plateforme $plateforme, ImageRepository $irepo)
    {
        $platforms = $prepo->findAll();
        $images = $irepo->findBy(
            [],
            [],
            $limit = null,
            $offset = null
        );
        return $this->render('plateforme/show.html.twig', [
            'plateforme' => $plateforme,
            'images' => $images,
            'platforms' => $platforms
        ]);
    }
    
    /**
     * @Route("/plateforme", name="plateforme")
     */
    public function index(PlateformeRepository $rplateforme, ImageRepository $irepo)
    {
        $platform = $rplateforme->findAll();
        $plateforme = $rplateforme->findAll();
        $images = $irepo->findBy(
            [],
            [],
            $limit = null,
            $offset = null
        );
        
        return $this->render('plateforme/index.html.twig', [
            'platform' => $platform,
            'images' => $images,
            'platforms' => $plateforme
        ]);
    }

    
}
