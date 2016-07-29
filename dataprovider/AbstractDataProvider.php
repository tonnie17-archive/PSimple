<?php

namespace Pineapple\dataprovider;

use Pineapple\db\AbstractDataConnector;
use Pineapple\db\Sourcable;

abstract class AbstractDataProvider extends AbstractDataConnector
{
    use Sourcable;

    public function find($id)
    {
        $source = $this->getSource();
        $lists  = $source->fetchAll($this->getSchema());
        foreach ($lists as $key => $row) {
            if ($row[$this->getIdCol()]) {
                return $row;
            }
        }
        return $row;
    }

    public function findAll()
    {
        $source = $this->getSource();
        $lists  = $source->fetchAll($this->getSchema());
        if (is_null($lists)) {
            return array();
        }
        return $lists;
    }
}
