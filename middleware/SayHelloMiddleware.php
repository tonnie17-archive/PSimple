<?php

class SayHelloMiddleware implements Middlewarable
{
    public function processRequest($request)
    {
        echo 'Hello! ' . $request->getRemoteAddr() . PHP_EOL;
    }
}