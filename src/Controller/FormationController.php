<?php

namespace App\Controller;

use App\Entity\Filiere;
use App\Entity\Formation;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FormationController extends AbstractController
{
    private EntityManagerInterface $entityManager;


    /**
     * @Route("/formation", name="formation")
     */
    public function index(EntityManagerInterface $entityManager): Response
    {
        $formations = $entityManager->getRepository(Formation::class)->findAll();

        return $this->render('formation/index.html.twig', [
            'formations' => $formations,
            /*'dump' => dd($formations),*/
        ]);
    }
}
