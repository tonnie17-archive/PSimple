<?php

class JsonDataSource extends FileDataSource
{
    public function fetchAll($schema)
    {
        $lists = json_decode(file_get_contents($this->getFile()), true);
        if (!is_null($schema))
        {
            $lists = $lists[$schema];
        }
        return $lists;
    }

    public function insert(array $row, $schema)
    {
        $lists = json_decode(file_get_contents($this->getFile()), true);
        if (!is_null($schema))
        {
            $child_lists = &$lists[$schema];
            array_push($child_lists, $row);
        } else {
            throw InvalidArgumentException('schema cant not be null');
        }
        file_put_contents($this->getFile(), json_encode($lists));
    }
}
