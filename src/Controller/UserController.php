<?php

namespace App\Controller;

use App\Form\UserType;
use App\Entity\Portrait;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class UserController
 * @IsGranted("ROLE_USER")
 * @package App\Controller
 * @Route("/user")
 */
class UserController extends AbstractController
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @Route("/profile", name="user_profile")
     * @return Response
     */
    public function index(): Response
    {
        return $this->render('user/index.html.twig', [
            'page_name' => 'profil'
        ]);
    }

    /**
     * @Route("/edit", name="user_edit")
     * @param Request $request
     * @return Response
     */
    public function edit(Request $request): Response
    {
        $user = $this->getUser();
        $form = $this->createForm(UserType::class, $user);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $profile = $form->getData();
            $this->entityManager->persist($profile);
            $this->entityManager->flush();

            return $this->redirectToRoute('user_profile');
        }

        return $this->render('user/edit.html.twig', [
        'controller_name' => 'UserController',
        'page_name' => 'User edit',
        'user_form' => $form->createView()
        ]);
    }
}