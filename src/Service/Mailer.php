<?php

namespace App\Service;

use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

class Mailer
{
    public function __construct(private MailerInterface $mailer)
    {
    }

    public function sendMailAfterDinosaurCreation(string $name): void
    {
        $email = (new Email())
            ->from('hello@knplabs.com')
            ->to('alexandre.chevalier@knplabs.com')
            ->subject('Dinosaur created!')
            ->text("Hey! The dinosaur $name was created !");

        $this->mailer->send($email);
    }
}
