<?php

class HTTPServerException extends HTTPException
{
    public function __construct($message='', $code = 500, Exception $previous = null) {
        parent::__construct($message, $code, $previous);
    }
}