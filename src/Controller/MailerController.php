<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;

class MailerController extends AbstractController
{
    #[Route('/mail', methods: ['GET'])]
    public function sendEmail(MailerInterface $mailer)
    {
        $email = (new Email())
            ->from('hello@knplabs.com')
            ->to('alexandre.chevalier@knplabs.com')
            ->subject('My first email !')
            ->text('Hi, this is my first email');

        $mailer->send($email);
        return new Response('oui');
    }
}
