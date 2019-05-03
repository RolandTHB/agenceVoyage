<?php

namespace App\Controller;

use App\Entity\Activite;
use App\Form\ActiviteType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\Translation\TranslatorInterface;

/**
 * @Route("/{_locale}")
 */
class ActiviteController extends AbstractController
{
    /**
     * @Route("/activite", name="activite")
     */
    public function index(TranslatorInterface $translator)
    {
        $repository = $this->getDoctrine()->getRepository(Activite::class);
        $activites = $repository->findAll();
        $translator->trans('add_an_activity');


        return $this->render('activite/index.html.twig', [
            'controller_name' => 'ActiviteController',
            'activites' => $activites
        ]);
    }

    /**
     * @Route("/activite/add", name="add_activite")
     */
    public function addActivite()
    {
        $entityManager = $this->getDoctrine()->getManager();
        $activite = new Activite();
        $activite->setName('Premiere activite');
        $activite->setImage('images/cuba.jpg');

        $entityManager->persist($activite);
        $entityManager->flush();

        return $this->render('activite/add-activite.html.twig', [
            'activite' => $activite,
        ]);
    }

    /**
     * @Route("/activite/{activite}/update", name="")
     */
    public function update(Activite $activite)
    {
        $activite->setName('Ski');
        $activite->setImage('https://www.objetconnecte.net/wp-content/uploads/2015/01/Sport-dhiver-Une.jpg');

        $this->getDoctrine()->getManager()->flush();

        return $this->render('activite/index.html.twig', [
            'controller_name' => 'ActiviteController',
            'activite' => $activite,
        ]);
    }

    /**
     * @Route("/activite/{activite}/delete", name="delete_activite")
     */
    public function delete(Activite $activite)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($activite);
        $entityManager->flush();

        return $this->redirectToRoute('activite');

    }

    /**
     * @Route("/activite/add-form", name="add-form_activite")
     * @Route("/activite/update/{activite}", name="update_activite")
     */
    public function addForm(Request $request, Activite $activite = null)
    {
        if (!$activite) {
            $activite = new Activite();
        }
        $form = $this->createForm(ActiviteType::class, new Activite());
        // Ici nous traitons notre requête
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $activite = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($activite);
            $em->flush();

            return $this->redirectToRoute('activite');
        } else {
            return $this->render('activite/add-activite.html.twig', [
                'form' => $form->createView(),
                'errors' => $form->getErrors()
            ]);
        }
    }

//    /**
//     * @Route("/")
//     */
//    public function homeAction(TranslatorInterface $translator, Request $request)
//    {
//        die(dump($translator->trans('add_an_activity')));
//
//
//    }
}
