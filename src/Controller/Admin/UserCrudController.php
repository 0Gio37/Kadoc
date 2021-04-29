<?php

namespace App\Controller\Admin;

use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Event\AfterEntityPersistedEvent;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TelephoneField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeEntityPersistedEvent;
use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeEntityUpdatedEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;


class UserCrudController extends AbstractCrudController implements EventSubscriberInterface
{
    public static function getEntityFqcn(): string
    {
        return User::class;
    }

    /** @var UserPasswordEncoderInterface */
    private UserPasswordEncoderInterface $passwordEncoder;
    private MailerInterface $mailer;


    public function __construct(
        UserPasswordEncoderInterface $passwordEncoder,
        MailerInterface $mailer)
    {
        $this->passwordEncoder = $passwordEncoder;
        $this->mailer = $mailer;
    }



    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('lastname'),
            TextField::new('firstname'),
            TelephoneField::new('phone'),
            EmailField::new('email'),
            TextEditorField::new('resume'),
            ArrayField::new('roles'),
            TextField::new('password'),
        ];
    }

    public static function getSubscribedEvents(): array
    {
        return [
            BeforeEntityPersistedEvent::class => 'encodePassword',
            BeforeEntityUpdatedEvent::class => 'encodePassword',
            AfterEntityPersistedEvent::class => 'sendPasswordReset'
        ];
    }

    public function encodePassword($event): void
    {
        $user = $event->getEntityInstance();
        if ($user->getPassword()) {
            $user->setPassword($this->passwordEncoder->encodePassword($user, $user->getPassword()));
        }
    }

    public function sendPasswordReset($event): \Symfony\Component\HttpFoundation\Response
    {
        $user = $event->getEntityInstance();
        return $this->forward(
            'App\Controller\ResetPasswordController::processSendingPasswordResetEmail',
            [
                'emailFormData' => $user->getEmail(),
                'mailer' => $this->mailer,
                'firstPasswordSetup' => true
            ]
        );


    }




}
