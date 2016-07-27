<?php

class MailService implements EventListener
{
    public function update($context)
    {
        echo 'send a email to ' . $context->getName() . PHP_EOL;
    }
}
