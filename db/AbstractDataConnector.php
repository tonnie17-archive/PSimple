<?php

namespace Pineapple\db;

abstract class AbstractDataConnector
{
    public function getIdCol()
    {
        return 'id';
    }

    public abstract function getSchema();

    public static function model(){}
}