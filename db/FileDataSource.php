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

    public function dump($content) {
        return file_put_contents($this->getFile(), $content);
    }

    public abstract static function initSource($path);
    public abstract function load();
    public abstract function fetchById($id, $id_col, $schema);
    public abstract function fetchAll($schema);
    public abstract function insert(array $row, $schema);
    public abstract function remove($id, $id_col, $schema);

}