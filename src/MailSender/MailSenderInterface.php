<?php

namespace MailSender;

interface MailSenderInterface
{
    public function send(string $toEmail, string $subject, string $content): bool;
}