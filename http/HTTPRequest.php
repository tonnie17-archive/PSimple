<?php

class HTTPRequest
{
    private $__server;
    private $__session;
    private $__cookie;

    public function __construct()
    {
        $this->__server  = $_SERVER;
        $this->__session = HTTPSession::getInstance();
        $this->__cookie  = HTTPCookie::getInstance();
    }

    public function getCookie()
    {
        return $this->__cookie;
    }

    public function getSession()
    {
        return $this->__session;
    }

    public function getPathInfo()
    {
        return $this->__server['PATH_INFO'];
    }

    public function getRemoteAddr()
    {
        return $this->__server['REMOTE_ADDR'];
    }

    public function getRemotePort()
    {
        return $this->__server['REMOTE_PORT'];
    }

    public function getCookieString()
    {
        return $this->__server['HTTP_COOKIE'];
    }

    public function getRequestMethod()
    {
        return $this->__server['REQUEST_METHOD'];
    }

    public function getUA()
    {
        return $this->__server['HTTP_USER_AGENT'];
    }

    public function getRequestTime()
    {
        return $this->__server['REQUEST_TIME'];
    }

}
