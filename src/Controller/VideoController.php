<?php

namespace App\Controller;

use App\Entity\Video;
use App\Repository\VideoRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class VideoController extends AbstractController
{
    /**
     * @Route("/video", name="video")
     */
    public function index(VideoRepository $video)
    {
        $vid = $video->findAll();

        return $this->render('video/index.html.twig', [
            'vid' => $vid,
        ]);
    }

    /**
     * @Route("/video/{id}", name="video.show", methods={"GET"})
     */
    public function show(Video $video)
    {
        return $this->render('video/show.html.twig', [
            'vid' => $video
        ]);
    }
}
