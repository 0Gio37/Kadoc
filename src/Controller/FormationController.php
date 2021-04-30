<?php

namespace App\Controller;

use App\Entity\Filiere;
use App\Entity\Formation;
use App\Form\FormationEditType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FormationController extends AbstractController
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }


    /**
     * @Route("/formation", name="formation")
     */
    public function index(): Response
    {
        $formations = $this->entityManager->getRepository(Formation::class)->findAll();

        return $this->render('formation/index.html.twig', [
            'formations' => $formations,
            /*'dump' => dd($formations),*/
        ]);
    }

    /**
     * @Route("/formation-edit/{id}", name="formation-edit")
     */
    public function edit(Formation $formation,Request $request): Response
    {

        $form = $this->createForm(FormationEditType::class);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
             $this->entityManager->persist($formation);
             $this->entityManager->flush();

             return $this->redirectToRoute('formation');
        }

        return $this->render('formation/edit.html.twig', [
            'formulaire' => $form->createView(),
        ]);
    }
}
