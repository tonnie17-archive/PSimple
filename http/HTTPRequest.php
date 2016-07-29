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
        return isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : '';
    }

    public function getRemoteAddr()
    {
        return isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '';
    }

    public function getRemotePort()
    {
        return isset($_SERVER['REMOTE_PORT']) ? $_SERVER['REMOTE_PORT'] : 80;
    }

    public function getCookieString()
    {
        return isset($_SERVER['HTTP_COOKIE']) ? $_SERVER['HTTP_COOKIE'] : '';
    }

    public function getRequestMethod()
    {
        return isset($_SERVER['REQUEST_METHOD']) ? $_SERVER['REQUEST_METHOD'] : 'GET';
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
        return isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : null;
    }

    public function getRequestTime()
    {
        return isset($_SERVER['REQUEST_TIME']) ? $_SERVER['REQUEST_TIME'] : null;
    }

}
