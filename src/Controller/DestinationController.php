<?php

namespace App\Controller;

use App\Entity\Destination;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/{_locale}")
 */
class DestinationController extends AbstractController
{
    /**
     * @Route("/destinations", name="destinations")
     */
    public function index()
    {
        return $this->render('destination/index.html.twig', [
            'controller_name' => 'DestinationController',
        ]);
    }

    /**
     * @Route("/detail{lieu}", name="destination_detail")
     */
    public function detail($lieu)
    {
        return $this->render('destination/destination-detail.html.twig', [
            'controller_name' => 'DestinationController',
            'destination' => $lieu
        ]);
    }

    /**
     * @Route("/destination/add", name="add_destination")
     */
    public function addDestination()
    {
        $entityManager = $this->getDoctrine()->getManager();
        $destination = new Destination();
        $destination->setName('Premiere destination');
        $destination->setImage('Bienvenue dans notre premiere destination');
        $destination->setCountry('Bienvenue dans notre premiere destination');
        $destination->setDateDuVoyage('janvier');
//        $destination->setPays('Bienvenue dans notre premiere destination');

        $entityManager->persist($destination);


        $entityManager->flush();
        return $this->render('destination/index.html.twig', [
            'destination' => $destination,
        ]);


    }
}
