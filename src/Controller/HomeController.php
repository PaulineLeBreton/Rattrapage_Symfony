<?php

namespace App\Controller;

//J'aurais fais de mon mieux, mais j'ai trop d'erreurs et j'ai trop de mal à comprendre la logique derrière Symfony !

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use App\Repository\VilleRepository;
use App\Repository\EtudiantRepository;
use App\Repository\EcoleRepository;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(VilleRepository $villeRepository): Response
    {

        $villes = $villeRepository->findAll();

        return $this->render('home/index.html.twig', [
            'villes' => $villes,
        ]);
    }


    /**
    * @Route("/ville/{nom}", name="home_ville")
    */
    public function villeName(string $nom, VilleRepository $villeRepository): Response
    {
        $ville = $villeRepository->findOneBy(
            ['nom' => $nom]
        );

        return $this->render('home/ville.html.twig', [
            'ville' => $ville,
        ]);
    }

    /**
    * @Route("/ecole/{nom}", name="home_ecole")
    */
    public function ecoleName(string $nom, EcoleRepository $ecoleRepository): Response
    {
        $ecole = $ecoleRepository->findOneBy(
            ['nom' => $nom]
        );

        return $this->render('home/ecole.html.twig', [
            'ecole' => $ecole,
        ]);
    }
}
