<?php

namespace MailSender;

class PHPMailSender implements MailSenderInterface
{
    public function send(string $toEmail, string $subject, string $content): bool
    {
        return mail($toEmail, $subject, $content);
    }
}