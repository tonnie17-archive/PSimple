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
        $user = new User($name);
        $user->on('register', new MailService());
        $this->_user_mapper->save($user);
        $user->trigger('register');
    }

    public function updateUser(User $user)
    {
        return $this->_user_mapper->update($user);
    }

    public function deleteUser($id)
    {
        return $this->_user_mapper->delete($id);
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
