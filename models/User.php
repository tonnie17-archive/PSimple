<?php

class User extends AbstractModel
{
    private $_id;
    private $_name;

    public function __construct($id, $name)
    {
        if (!is_int($id)) {
            throw new InvalidArgumentException('Invalid Argument!');
        }
        $this->_id   = $id;
        $this->_name = $name;
    }

    public function getId()
    {
        return $this->_id;
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
