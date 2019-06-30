<?php

namespace MailSender;

use Swift_Mailer;
use Swift_Message;
use Swift_SmtpTransport;

class SwiftMailSender implements MailSenderInterface
{
    private $host = 'smtp.gmail.com';
    private $port = 465;
    private $encryption = 'ssl';
    private $from = 'RNuriev Mail Sender';

    // Here you should add your credentials
    private $fromEmail = '';
    private $email = '';
    private $password = '';

    public function send(string $toEmail, string $subject, string $content): bool
    {
        $transporter = new Swift_SmtpTransport($this->host, $this->port, $this->encryption);
        $transporter->setUsername($this->email)->setPassword($this->password);
        $mailer = new Swift_Mailer($transporter);
        $message = new Swift_Message($transporter);

        $message->setSubject($subject)
            ->setFrom(array($this->fromEmail => $this->from))
            ->setTo(array($toEmail))
            ->setBody($content);

        return $mailer->send($message);
    }
}