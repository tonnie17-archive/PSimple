<?php

namespace Pineapple\db;

interface DataSource
{
    public function fetchById($id, $id_col, $schema);
    public function fetchAll($schema);
    public function insert(array $row, $schema);
    public function remove($id, $id_col, $schema);
}
