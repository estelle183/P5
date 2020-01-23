<?php

namespace App\Controller;


use App\Entity\Ad;
use App\Form\AdType;
use App\Repository\AdRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdController extends AbstractController
{
    /**
     * @Route("/ads", name="ads_index")
     * @param AdRepository $repo
     * @return Response
     */
    public function index(AdRepository $repo)
    {

        $ads = $repo->findAll ();

        return $this->render('ad/index.html.twig', [
            'ads' => $ads,
        ]);
    }

    /**
     * Permet de créer une annonce
     *
     * @Route("/ads/new", name="ads_create")
     *
     * @return Response
     */
    public function create() {
        $ad = new Ad();

        $form = $this->createForm (AdType::class, $ad);

        return $this->render('ad/new.html.twig', [
            'form' =>$form->createView ()
        ]);

    }

    /**
     * Permet d'afficher une seule annonce
     *
     * @Route("/ads/{slug}", name="ads_show")
     *
     * @return Response
     *
     */
    public function show(Ad $ad) {


        return $this->render ('ad/show.html.twig', [
            'ad' => $ad,
        ]);

    }
}
