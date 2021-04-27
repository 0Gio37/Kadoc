<?php

namespace App\Controller;

use App\Form\ContactUsType;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Routing\Annotation\Route;

class ContactUsController extends AbstractController
{
    /**
     * @Route("/contact", name="contact_us")
     */
    public function index(Request $request, MailerInterface $mailer): Response
    {
        $formContact = $this->createForm(ContactUsType::class);

        $formContact->handleRequest($request);

        if($formContact->isSubmitted() && $formContact->isValid()){
            $data = $formContact->getData();

            $userMail = $data['mail'];

            $message = (new TemplatedEmail())
                ->from($userMail)
                ->to('romain.barbaray@gmail.com')
                ->subject('Inscription réussie')
                ->htmlTemplate('mail/register.html.twig')
                ->context([
                              'user' => $data['nom']
                          ]);

            $mailer->send($message);
        }

        return $this->render('contact_us/index.html.twig', [
            'form' => $formContact->createView()
        ]);
    }
}
