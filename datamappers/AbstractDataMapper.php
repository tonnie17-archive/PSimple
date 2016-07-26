<?php

abstract class AbstractDataMapper
{
    use Sourcable;
    
    public abstract function save(AbstractModel $model);
    public abstract function delete(AbstractModel $model);
    public abstract function update(AbstractModel $model);
}
