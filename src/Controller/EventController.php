<?php

namespace App\Controller;

use App\Entity\Event;
use App\Repository\EventRepository;
use App\Repository\ImageRepository;
use App\Repository\PlateformeRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class EventController extends AbstractController
{
    /**
     * @Route("/event", name="event")
     */
    public function index(EventRepository $evenement, PlateformeRepository $rplateforme, ImageRepository $irepo)
    {
        $platforms = $rplateforme->findAll();

        $event = $evenement->findAll();
        $images = $irepo->findBy(
            [],
            [],
            $limit = null,
            $offset = null
        );
        return $this->render('event/index.html.twig', [
            'event' => $event,
            'images' => $images,
            'platforms' => $platforms
        ]);
    }

    /**
     * @Route("/event/{id}", name="event.show", methods={"GET"})
     */
    public function show(Event $event, PlateformeRepository $rplateforme, ImageRepository $irepo)
    {
        $platforms = $rplateforme->findAll();
        $images = $irepo->findBy(
            [],
            [],
            $limit = null,
            $offset = null
        );
        return $this->render('event/show.html.twig', [
            'event' => $event,
            'images' => $images,
            'platforms' => $platforms
        ]);
    }
}
