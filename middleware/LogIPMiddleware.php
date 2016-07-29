<?php

use Pineapple\app\Application;
use Pineapple\middleware\Middlewarable;

class LogIPMiddleware implements Middlewarable
{
    public function processRequest($request)
    {
        Application::log('Request From -> ' . $request->getRemoteAddr() . PHP_EOL);
    }
}