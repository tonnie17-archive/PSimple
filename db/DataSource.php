<?php

interface DataSource
{
    public function fetchAll($schema);
    public function insert(array $row, $schema);
}
