<?php

namespace App\Controller;


use App\Repository\AdRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdController extends AbstractController
{
    /**
     * @Route("/ads", name="ads_index")
     * @param AdRepository $repo
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(AdRepository $repo)
    {

        $ads = $repo->findAll ();

        return $this->render('ad/index.html.twig', [
            'ads' => $ads,
        ]);
    }

    /**
     * Permet d'afficher une seule annonce
     *
     * @Route("/ads/{slug}", name="ads_show")
     *
     * @param $slug
     * @param AdRepository $repo
     * @return Response
     */
    public function show($slug, AdRepository $repo) {

        // Je récupère l'annonce qui correspond au slug

        $ad = $repo->findOneBySlug($slug);

        return $this->render ('ad/show.html.twig', [
            'ad' => $ad,
        ]);

    }
}
