<?php

use Pineapple\model\AbstractModel;

class User extends AbstractModel
{
    private $_id;
    private $_name;

    protected function getMapping()
    {
        return [
            'id'   => 'id',
            'name' => 'name'
        ];
    }

    public function __construct($name)
    {
        $this->_name = $name;
    }

    public function getId()
    {
        return $this->_id;
    } 

    public function setId($id)
    {
        $this->_id = $id;
    }

    public function getName()
    {
        return $this->_name;
    } 

    public function setName($name)
    {
        $this->_name = $name;
    }
}
