<?php

namespace Pineapple\controller;

use Pineapple\app\Application;
use Pineapple\http\HTTPRequest;

class BaseController
{
    public function beforeAction(HTTPRequest $request) {}
    public function afterAction(HTTPRequest $request) {}
    public function tearDownAction(HTTPRequest $request) {}

    public function getParam($name, $defaultValue=null)
    {
        return isset($_GET[$name]) ? $_GET[$name] : (isset($_POST[$name]) ? $_POST[$name] : $defaultValue);
    }

    public function redirect(HTTPRequest $request, $action, $controller=null)
    {
        if (is_null($controller)) {
            header('Location: ' . $action);
        } else {
            header('Location: ' . '/' . $controller . '/' . $action);
        }
    }

    public function render($template, $data=[])
    {

        $config = Application::Config();
        if (isset($config['template']['path']))
        {
            $suffix = isset($config['template']['suffix']) ? $config['template']['suffix'] : 'php';
            $view   = realpath($config['template']['path']) . DIRECTORY_SEPARATOR . $template . '.' .$suffix;

            if (is_array($data) && !empty($data)) {
                extract($data);
            }
            ob_start();
            include $view;
            echo ob_get_clean();
        }
    }
}
