<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Address;
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
        return new Response('mail');
    }

    #[Route('/cc', methods: ['GET'])]
    public function sendEmailWithCc(MailerInterface $mailer)
    {
        $email = (new Email())
            ->from('hello@knplabs.com')
            ->to('alexandre.chevalier@knplabs.com')
            ->subject('My first email with cc!')
            ->text('Hi, this is my first email')
            ->cc('edgar@knplabs.com');

        $mailer->send($email);
        return new Response('cc');
    }

    #[Route('/bcc', methods: ['GET'])]
    public function sendEmailWithBccAndHighPriority(MailerInterface $mailer)
    {
        $email = (new Email())
            ->from(new Address('hello@knplabs.com', 'KnpLabs'))
            ->to('alexandre.chevalier@knplabs.com')
            ->subject('My first email with bcc and hight priority!')
            ->text('Hi, this is my first email')
            ->bcc('edgar@knplabs.com');

        $mailer->send($email);
        return new Response('bcc and high priority');
    }
}
