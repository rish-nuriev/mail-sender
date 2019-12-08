<?php

use MailSender\{MailSenderService, PHPMailSender, SwiftMailSender};

require_once 'vendor/autoload.php';

$mailSenderService = new MailSenderService();
$mailSenderService->addDriver(new PHPMailSender(), 'mail');
$mailSenderService->addDriver(new SwiftMailSender(), 'swift');
$mailSenderService->setDriver('swift');
$mailSenderService->send('nuriev_rishat@mail.ru', 'Hello', 'This email has been sent by Swift');
$mailSenderService->setDriver('mail');
$mailSenderService->send('nuriev_rishat@mail.ru', 'Hello', 'This email has been sent by Mail function');
