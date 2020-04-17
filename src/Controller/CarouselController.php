<?php

namespace App\Controller;

use App\Repository\ImageRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class CarouselController extends AbstractController
{
    /**
     * @Route("/carousel", name="carousel")
     */
    public function index(ImageRepository $repo)
    {
        $images = $repo->find(1);
        $imagestwo = $repo->findBy(
            ['id' => 2],
            [],
            $limit = 1,
            $offset = null
        );
        $imagesthree = $repo->findBy(
            ['id' => 3],
            [],
            $limit = 1,
            $offset = null
        );
        return $this->render('layout/layout.html.twig', [
            'images' => $images,
            'imagestwo' => $imagestwo,
            'imagesthree' => $imagesthree,
        ]);
    }
}
