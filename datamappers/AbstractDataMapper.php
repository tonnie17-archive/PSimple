<?php

abstract class AbstractDataMapper extends AbstractDataConnector
{
    use Sourcable;

    public function find($id) 
    {
        $source = $this->getSource();
        $row    = $source->fetchById($id, $this->getIdCol(), $this->getSchema());
        if (!is_null($row)) {
            $object = $this->buildModelFromData($row);
            return $object;
        }
        return null;
    }

    public function save(AbstractModel $model)
    {
        $data   = static::buildDataFromModel($model);
        $source = $this->getSource();
        $ret    = $source->insert($data, $this->getSchema());
        return $ret;
    }

    public function delete($id)
    {
        $source = $this->getSource();
        $ret    = $source->delete($id, $this->getIdCol(), $this->getSchema());
        return $ret;
    }

    public function update(AbstractModel $model)
    {
        $data   = static::buildDataFromModel($model);
        $source = $this->getSource();
        $ret    = $source->update($data, $this->getIdCol(), $this->getSchema());
        return $ret;
    }

    public static function buildDataFromModel(AbstractModel $model)
    {
        $data    = [];
        $getters = $model->getGetters();
        foreach ($getters as $key => $value) {
            $getter     = $getters[$key];
            $data[$key] = $model->$getter();
        };
        return $data;
    }

    public static function buildModelFromData($data)
    {
        $reflector = new ReflectionClass(static::model());
        if (!$reflector->isInstantiable()) {
            throw new Exception("Can't instantiate model");
        }
        $object     = $reflector->newInstanceWithoutConstructor();
        $setters    = $object->getSetters();
        foreach ($data as $key => $value) {
            $setter = $setters[$key];
            $object->$setter($value);
        };
        return $object;
    }
}
