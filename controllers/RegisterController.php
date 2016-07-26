<?php

class RegisterController extends BaseController
{
    protected $_user_logic;

    public function __construct(UserLogic $user_logic)
    {
        $this->_user_logic = $user_logic;
    }

    public function actionRegister()
    {
        $name = $this->getParam('name');
        $id = $this->_user_logic->register($name);
    }
}
