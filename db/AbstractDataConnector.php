<?php

abstract class AbstractDataConnector
{
    public function getIdCol()
    {
        return 'id';
    }

    public abstract function getSchema();

    public abstract static function model();
}