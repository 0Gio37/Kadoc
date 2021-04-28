<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class UserController
 * @package App\Controller
 * @Route("/user")
 */
class UserController extends AbstractController
{
    /**
     * @return Response
     */
    public function index(): Response
    {
        /*
         * affichages : email, firstname, lastname, phone, resume, photo
         */
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
