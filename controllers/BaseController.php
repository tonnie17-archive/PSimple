<?php

class BaseController
{
    public function beforeAction($request) {}
    public function afterAction($request) {}
    public function tearDownAction($request) {}

    public function getParam($name, $defaultValue=null)
    {
        return isset($_GET[$name]) ? $_GET[$name] : (isset($_POST[$name]) ? $_POST[$name] : $defaultValue);
    }
}
