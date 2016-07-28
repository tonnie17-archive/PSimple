<?php

class HTTPCookie
{
    private static $instance;
    
    private function __construct() {}
    
    public static function getInstance()
    {
        if (!isset(self::$instance))
        {
            self::$instance = new self;
        }
        
        return self::$instance;
    }

    public function __set($name, $value)
    {
        $_COOKIE[$name] = $value;
    }
    
    public function __get($name)
    {
        if ( isset($_COOKIE[$name]))
        {
            return $_COOKIE[$name];
        }
    }
    
    public function __isset($name)
    {
        return isset($_COOKIE[$name]);
    }

    public function destroy()
    {
        unset($_COOKIE);
    }
}