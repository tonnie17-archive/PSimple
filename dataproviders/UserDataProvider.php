<?php

class UserDataProvider extends AbstractDataProvider
{
    private $_id_col   = 'id';
    protected $_schema = 'user';

    public function find($id)
    {
        $source     = $this->getSource();
        $user_lists = $source->fetchAll($this->_schema);
        foreach ($user_lists as $key => $user) {
            if ($user[$this->_id_col]) {
                return $user;
            }
        }
        return $user;
    }

    public function findAll()
    {
        $source     = $this->getSource();
        $user_lists = $source->fetchAll($this->_schema);
        if (is_null($user_lists)) {
            return array();
        }
        return $user_lists;
    }
}