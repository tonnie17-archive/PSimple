<?php

class Application
{
    protected $_err_handler = null;
    protected $_middlewares = [];

    private $_config = null;

    public function __construct($config)
    {
        $this->_err_handler = new BaseErrorHandler;
        $this->_middlewares = array_merge($this->_middlewares, 
            isset($config['middlewares'])? $config['middlewares']:[]);
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
        $request         = new HTTPRequest();
        $paths           = explode('/', $request->getPathInfo());
        $controller_path = trim($paths[1]);
        $action_path     = trim($paths[2]);

        $controller = ucfirst($controller_path . 'Controller');
        $action     = 'action' . ucfirst($action_path);

        try {
            $controller = IOC::find($controller);
            if (!method_exists($controller, $action)) {
                throw new HTTPNotFoundException('action not exists');
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

    public function setErrorHandler(BaseErrorHandler $handler)
    {
        $this->_err_handler = $handler;
    }

}
