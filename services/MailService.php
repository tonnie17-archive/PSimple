<?php

use Pineapple\app\Application;
use Pineapple\event\EventListener;

class MailService implements EventListener
{
    public function update($event, $context)
    {
        Application::log('send a email to ' . $context->getName() . PHP_EOL);
    }
}
