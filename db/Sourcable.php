<?php

namespace Pineapple\db;

trait Sourcable {
    protected $_data_source = null;

    public function __construct(DataSource $source)
    {
        $this->_data_source = $source;
    }

    public function getSource()
    {
        return $this->_data_source;
    }
}