<?php

namespace App\Controller;

use App\Entity\Ordinateur;
use App\Form\OrdinateurType;
use App\Repository\OrdinateurRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/ordinateur")
 */
class OrdinateurController extends AbstractController
{
    /**
     * @Route("/", name="ordinateur_index", methods={"GET"})
     */
    public function index(OrdinateurRepository $ordinateurRepository): Response
    {
        return $this->render('ordinateur/index.html.twig', [
            'ordinateurs' => $ordinateurRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="ordinateur_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $ordinateur = new Ordinateur();
        $form = $this->createForm(OrdinateurType::class, $ordinateur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($ordinateur);
            $entityManager->flush();

            return $this->redirectToRoute('ordinateur_index');
        }

        return $this->render('ordinateur/new.html.twig', [
            'ordinateur' => $ordinateur,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="ordinateur_show", methods={"GET"})
     */
    public function show(Ordinateur $ordinateur): Response
    {
        return $this->render('ordinateur/show.html.twig', [
            'ordinateur' => $ordinateur,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="ordinateur_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Ordinateur $ordinateur): Response
    {
        $form = $this->createForm(OrdinateurType::class, $ordinateur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('ordinateur_index');
        }

        return $this->render('ordinateur/edit.html.twig', [
            'ordinateur' => $ordinateur,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="ordinateur_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Ordinateur $ordinateur): Response
    {
        if ($this->isCsrfTokenValid('delete'.$ordinateur->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($ordinateur);
            $entityManager->flush();
        }

        return $this->redirectToRoute('ordinateur_index');
    }
}
