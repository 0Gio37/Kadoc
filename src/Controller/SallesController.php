<?php

namespace App\Controller;

use App\Entity\Portrait;
use App\Entity\Salle;
use App\Form\SallesType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SallesController extends AbstractController
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager){
        $this->entityManager = $entityManager;
    }

    /**
     * @Route("/salles", name="salles")
     */
    public function index(): Response
    {
        $salles = $this->entityManager->getRepository(Salle::class)->findAll();

        return $this->render('salles/index.html.twig', [
            'Salles' => $salles,
        ]);
    }

    /**
     * @Route("/salles/new", name="new_salles")
     */
    public function new(Request $request): Response
    {
        $salle = new Salle();
        $form = $this->createForm(SallesType::class, $salle);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()){
            $salle = $form->getData();
            $this ->entityManager->persist($salle);
            $this->entityManager->flush();
            return $this->redirectToRoute('salles');

        }

        return $this->render(
            'salles/new.html.twig',
            ['form' => $form->createView()]
        );
    }


}
