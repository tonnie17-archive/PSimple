<?php

class UserLogic extends AbstractLogic
{
    protected $_user_provider;
    protected $_user_mapper;

    public function __construct(UserDataProvider $user_provider, UserDataMapper $user_mapper)
    {
        $this->_user_provider = $user_provider;
        $this->_user_mapper   = $user_mapper;
    }

    public function register($name)
    {
        $id = 1;
        $user = new User($id, $name);
        $this->_user_mapper->save($user);
        return $id;
    }

    public function getUser($id)
    {
        $user = $this->_user_provider->find($id);
        return $user;
    }

    public function getUserList()
    {
        $user_list = $this->_user_provider->findAll();
        return $user_list;
    }

}
