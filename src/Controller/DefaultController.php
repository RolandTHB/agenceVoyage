<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/{_locale}")
 */
class DefaultController extends AbstractController
{
    /**
     * @Route("/{prenom}/{nom}", name="default")
     */
    public function index($prenom,$nom, Request $request)
    {
        return $this->render('default/index.html.twig', [
            'controller_name' => 'DefaultController',
            'prenom'=>$prenom,
            'nom'=>$nom,
//afficher var dumper pour mieux debuger
//            die(dump($request))
        ]);
    }

    /**
     *
     * @Route("/test-twig", name="test-twig")
     */

    public function indexTwig(Request $request)
    {
        return $this->render('default/index.html.twig', [

        ]);
    }



}
