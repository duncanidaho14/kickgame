<?php

namespace App\Controller;

use App\Entity\Image;
use App\Entity\Jeuxvideo;
use App\Entity\Plateforme;
use App\Repository\ImageRepository;
use App\Repository\JeuxvideoRepository;
use App\Repository\PlateformeRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class JeuxvideoController extends AbstractController
{
    /**
     * @Route("/", name="home")
     * @Route("/jeuxvideo", name="jeuxvideo")
     */
    public function index(JeuxvideoRepository $jeuxvideo, PlateformeRepository $rplateforme, ImageRepository $irepo)
    {
        $game = $jeuxvideo->findAll();
        $platforms = $rplateforme->findAll();

        $images = $irepo->findBy(
            [],
            [],
            $limit = null,
            $offset = null
        );
        return $this->render('jeuxvideo/index.html.twig', [
            'game' => $game,
            'images' => $images,
            'platforms' => $platforms
        ]);
    }

    /**
     * @Route("/jeuxvideo/{id}", name="jeuxvideo.show", methods={"GET"})
     */
    public function show(Jeuxvideo $jeuxvideo, ImageRepository $irepo, PlateformeRepository $rplateform)
    {
        $platforms = $rplateform->findAll();
        $images = $irepo->findBy(
            [],
            [],
            $limit = null,
            $offset = null
        );
        return $this->render('jeuxvideo/show.html.twig', [
            'game' => $jeuxvideo,
            'images' => $images,
            'platforms' => $platforms
        ]);
    }
}
