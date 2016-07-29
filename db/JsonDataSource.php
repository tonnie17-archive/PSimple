<?php

namespace Pineapple\db;

class JsonDataSource extends FileDataSource
{
    public static function initSource($path)
    {
        if (!file_exists($path)) {
            file_put_contents($path, json_encode([]));
        }
    }

    public function fetchById($id, $id_col, $schema)
    {
        $lists = $this->load($schema);
        foreach ($lists as $key => $row) {
            if (isset($row[$id_col]) && $id === $row[$id_col]) {
                return $row;
            }
        }
        return null;
    }

    public function fetchAll($schema)
    {
        $lists = $this->load($schema);
        return $lists;
    }

    public function insert(array $row, $schema)
    {
        $lists = $this->load();
        if (!isset($lists[$schema])) {
            $lists[$schema] = [];
        }
        $child_lists = &$lists[$schema];
        array_push($child_lists, $row);
        $this->dump(json_encode($lists));
    }

    public function update(array $row, $id_col, $schema)
    {
        $lists       = $this->load();
        $child_lists = &$lists[$schema];
        $id          = $row[$id_col];
        foreach ($child_lists as $key => $r) {
            if (isset($r[$id_col]) && $r[$id_col] === $id) {
                unset($r);
                array_push($child_lists, $row);
            }
        }
        $this->dump(json_encode($lists));
    }

    public function remove($id, $id_col, $schema)
    {
        $lists       = $this->load($schema);
        $child_lists = &$lists[$schema];
        foreach ($lists as $key => $r) {
            if (isset($r[$id_col]) && $r[$id_col] === $id) {
                unset($r);
            }
        }
        $this->dump(json_encode($lists));
    }

    public function load($schema=null)
    {
        if (is_null($schema)) {
            return json_decode(file_get_contents($this->getFile()), true);
        }
        if (!is_string($schema)) {
            throw new InvalidArgumentException('schema type must be string');
        }
        $lists = json_decode(file_get_contents($this->getFile()), true);
        if (!isset($lists[$schema])) {
            throw new Exception('schema does not exists');
        }
        return $lists[$schema];
    }
}
