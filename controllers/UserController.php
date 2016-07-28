<?php

class UserController extends BaseController
{
    protected $_user_logic;

    public function __construct(UserLogic $user_logic)
    {
        $this->_user_logic = $user_logic;
    }

    public function actionRegister($request)
    {
        $name = $this->getParam('name');
        $this->_user_logic->register($name);
    }

    public function actionUpdate($request)
    {
        $id   = $this->getParam('id');
        $name = $this->getParam('name');
        $this->_user_logic->updateUser($name);
    }
}
