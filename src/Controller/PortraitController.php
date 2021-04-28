<?php

namespace App\Controller;

use App\Entity\Portrait;
use App\Form\PortraitType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PortraitController extends AbstractController
{
    //private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager){
        $this->entityManager = $entityManager;
    }
    /**
     * @Route("/portrait", name="portrait")
     */
    public function index(): Response
    {
        $portraits = $this->entityManager->getRepository(Portrait::class)->findAll();

        return $this->render(
            'portrait/index.html.twig',
            [
                'controller_name' => 'PortraitController',
            ]
        );
    }

    /**
     * @Route("/newPortrait", name="newPortrait")
     */
    public function new(Request $request)
    {
        $portrait = new Portrait();
        $form = $this->createForm(PortraitType::class, $portrait);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $portrait= $form->getData();

            $this->entityManager->persist($portrait);
            $this->entityManager->flush();

            return $this->render(
                'portrait/index.html.twig'
            );
        }



        return $this->render(
            'portrait/new.html.twig',
            ['formPortrait' => $form->createView()]
        );
    }

    /**
     * @Route("/newPortrait/{id}/edit", name="edit")
     */



    public function edit(Portrait $portrait, Request $request){

        $form = $this->createForm(PortraitType::class, $portrait);

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $portrait= $form->getData();

            $this->entityManager->persist($portrait);
            $this->entityManager->flush();



            return $this->render(
                'portrait/index.html.twig'
            );
        }
        return $this->render(
            'portrait/new.html.twig',
            ['formPortrait' => $form->createView()]
        );

    }
}
