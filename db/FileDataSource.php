<?php

abstract class FileDataSource implements DataSource
{
    protected $_file_name = null;

    public function __construct($file_name)
    {
        $this->_file_name = $file_name;
    }

    public function getFile()
    {
        return $this->_file_name;
    }

    public abstract function fetchAll($schema);
    public abstract function insert(array $row, $schema);
}