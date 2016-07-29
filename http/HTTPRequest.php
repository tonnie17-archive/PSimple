<?php

namespace Pineapple\http;

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


    public static function makeAction($action)
    {
        $action = trim($action);
        return 'action' . ucfirst($action);
    }

    public function getController()
    {
        $paths           = explode('/', $this->getPathInfo());
        $controller_path = empty(trim($paths[1])) ? 'Index' : trim($paths[1]);
        return ucfirst($controller_path . 'Controller');
    }

    public function getAction()
    {
        $paths = explode('/', $this->getPathInfo());
        return static::makeAction($paths[2]);
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

    public function isGet()
    {
        return $this->getRequestMethod() === 'GET';
    }

    public function isPost()
    {
        return $this->getRequestMethod() === 'POST';
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
