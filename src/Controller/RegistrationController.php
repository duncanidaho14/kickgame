<?php

namespace App\Controller;

use App\Entity\Registration;
use App\Repository\ImageRepository;
use App\Repository\RegistrationRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class RegistrationController extends AbstractController
{
    /**
     * @Route("/registration", name="registration")
     */
    public function index(RegistrationRepository $registration, ImageRepository $irepo)
    {
        $regist = $registration->findAll();
        $images = $irepo->findBy(
            [],
            [],
            $limit = null,
            $offset = null
        );
        return $this->render('registration/index.html.twig', [
            'regist' => $regist,
            'images' => $images
        ]);
    }

    /**
     * @Route("/registration/{id}", name="registration.show", methods={"GET"})
     */
    public function show(Registration $registration, ImageRepository $irepo)
    {
        $images = $irepo->findBy(
            [],
            [],
            $limit = null,
            $offset = null
        );
        return $this->render('registration/show.html.twig', [
            'regist' => $registration,
            'images' => $images
        ]);
    }
}
