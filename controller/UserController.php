<?php

use Pineapple\controller\BaseController;

class UserController extends BaseController
{
    protected $_user_logic;

    public function __construct(UserLogic $user_logic)
    {
        $this->_user_logic = $user_logic;
    }

    public function actionRegister($request)
    {
        $context = [
            'hasSuccess' => false
        ];
        if ($request->isPost()) {
            $name = $this->getParam('name');
            $this->_user_logic->register($name);
            $context['hasSuccess'] = true;
            $context['name']       = $name;
        }
        return $this->render('index', $context);
    }

    public function actionLogin($request)
    {
        return $this->redirect($request, 'register');
    }
}
