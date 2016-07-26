<?php

class BaseController
{
    public function getParam($name, $defaultValue=null)
    {
        return isset($_GET[$name]) ? $_GET[$name] : (isset($_POST[$name]) ? $_POST[$name] : $defaultValue);
    }
}
