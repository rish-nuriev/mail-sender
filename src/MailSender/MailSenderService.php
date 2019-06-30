<?php

namespace MailSender;

class MailSenderService
{
    private $driver;
    private $drivers = [];

    public function addDriver(MailSenderInterface $driver, string $driverName)
    {
        $this->drivers[$driverName] = $driver;
    }

    public function setDriver(string $driver)
    {
        $this->driver = $driver;
    }

    public function send(string $toEmail, string $subject, string $content): bool
    {
        return $this->drivers[$this->driver]->send($toEmail, $subject, $content);
    }
}