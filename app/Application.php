<?php

class Application
{
    protected $_err_handler = null;
    protected $_middlewares = [];

    private static $_config = null;

    public function __construct($config)
    {
        if (!is_array($config)) {
            throw new Exception("Invalid argument type of config");
        }
        static::$_config = $config;
        $this->_err_handler = new BaseErrorHandler;
        $this->_middlewares = array_merge($this->_middlewares, 
            isset($config['middlewares'])? $config['middlewares']:[]);
    }

    public static function Config()
    {
        return static::$_config;
    }

    private function onMiddlewares($request)
    {
        foreach ($this->_middlewares as $key => $middleware) {
            $m = new ReflectionClass($middleware);
            if (!$m->isInstantiable()) {
                throw new Exception("Middleware: " . $middleware . ' not exists');
            }
            $m->newInstance()->processRequest($request);
        }
    }

    public function dispatch()
    {
        $request    = new HTTPRequest();
        $controller = $request->getController();
        $action     = $request->getAction();

        try {
            $controller = IOC::find($controller);
            if (!method_exists($controller, $action)) {
                throw new HTTPNotFoundException('action ' . $action . ' not exists');
            }
            $controller->beforeAction($request);
            $this->onMiddlewares($request);
            $controller->$action($request);
            $controller->afterAction($request);
        } 
        catch (HTTPException $e) {
            $this->_err_handler->handle($e);
        } 
        catch (Exception $e) {
            $this->_err_handler->handle($e, BaseErrorHandler::PAGE_NOT_FOUND);
        } 
        finally {
            if (!is_string($controller)) {
                $controller->tearDownAction($request);
            }
        }
    }

    public static function log($msg, $level='debug')
    {
        $default_file = dirname(__DIR__) . '/logs/debug.log';
        $file = isset(static::$_config['log'][$level]) ? static::$_config['log'][$level] : $default_file;
        error_log($msg, 3, $file);
    }

    public function setErrorHandler(BaseErrorHandler $handler)
    {
        $this->_err_handler = $handler;
    }

}