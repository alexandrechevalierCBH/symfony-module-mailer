<?php

namespace App\Service;

use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\Mailer\MailerInterface;

class Mailer
{
    public function __construct(private MailerInterface $mailer)
    {
    }

    public function sendMailAfterDinosaurCreation(string $name): void
    {
        $email = (new TemplatedEmail())
            ->from('hello@knplabs.com')
            ->to('alexandre.chevalier@knplabs.com')
            ->subject('Dinosaur created!')
            ->htmlTemplate('Mails/create.html.twig')
            ->text("Hey! The dinosaur $name was created !")
            ->context(['dino' => $name]);

        $this->mailer->send($email);
    }
}
