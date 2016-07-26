<?php

abstract class AbstractDataProvider
{
    use Sourcable;

    public abstract function find($id);
    public abstract function findAll();
}
