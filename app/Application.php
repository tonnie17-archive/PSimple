<?php

class Application
{
    const PATH_NOT_FOUND    = 404;
    protected $_err_handler = null;

    public function __construct()
    {
        $this->_err_handler = new BaseErrorHandler;
    }

    public function dispatch()
    {
        var_dump('SERVER->', $_SERVER);
        var_dump('URL->' . $_SERVER['PATH_INFO']);
        var_dump('ENV->', $_ENV);

        $paths           = explode('/', $_SERVER['PATH_INFO']);
        $controller_path = trim($paths[1]);
        $action_path     = trim($paths[2]);

        $controller = ucfirst($controller_path . 'Controller');
        $action     = 'action' . ucfirst($action_path);

        try {
            $controller = IOC::find($controller);
            if (method_exists($controller, $action)) {
                $controller->$action();
            } else {
                throw new HTTPNotFoundException('action not exists');
            }
        } catch (HTTPException $e) {
            $this->_err_handler->handle($e);
        } catch (Exception $e) {
            $this->_err_handler->handle($e, self::PATH_NOT_FOUND);
        }
    }

    public function setErrorHandler(BaseErrorHandler $handler)
    {
        $this->_err_handler = $handler;
    }

}
