<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
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
        /*
         * affichages : email, firstname, lastname, phone, resume, photo
         */
        //$user = $this->entityManager->getRepository(User::class)->findOneById();

        return $this->render('user/index.html.twig', [
            'controller_name' => 'UserController',
            'page_name' => 'User index'
        ]);
    }

    /**
     * @Route("/edit", name="user_edit")
     * @return Response
     */
    public function edit(): Response
    {

        return $this->render('user/edit.html.twig', [
            'controller_name' => 'UserController',
            'page_name' => 'User edit'
        ]);
    }
}
