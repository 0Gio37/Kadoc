<?php

namespace App\Controller;

use App\Entity\Portrait;
use App\Entity\User;
use App\Form\PortraitType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PortraitController extends AbstractController
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @Route("/portrait", name="portrait")
     */
    public function index()
    : Response
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
     * @Route("/{id}/newPortrait", name="newPortrait")
     */
    public function new(Request $request, User $user)
    {
        $portrait = new Portrait();
        $form     = $this->createForm(PortraitType::class, $portrait);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $portrait = $form->getData();
            $this->entityManager->persist($portrait);
            $this->entityManager->flush();
            $user->setPortrait($portrait);
            $this->entityManager->flush();

            return $this->redirectToRoute('home'); //expected "user/profile"
        }

        return $this->render(
            'portrait/new.html.twig',
            [
                'formPortrait' => $form->createView(),
                'thisTest'     => $portrait
            ]
        );
    }

    /**
     * @Route("/newPortrait/{id}/edit", name="edit")
     */
    public function edit(Portrait $portrait, Request $request)
    : Response {
        $form = $this->createForm(PortraitType::class, $portrait);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $portrait = $form->getData();

            $this->entityManager->persist($portrait);
            $this->entityManager->flush();

            return $this->redirectToRoute('home'); //expected "user/profile"
        }

        return $this->render(
            'portrait/new.html.twig',
            ['formPortrait' => $form->createView()]
        );
    }
}
