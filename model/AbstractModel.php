<?php

namespace Pineapple\model;

use Pineapple\event\EventBus;
use Pineapple\event\EventListener;

abstract class AbstractModel
{
    protected abstract function getMapping();

    public function getGetters()
    {
        $getters = [];
        foreach ($this->getMapping() as $attr => $col) {
            $getters[$attr] = 'get' . ucfirst(strtolower($attr));
        }
        return $getters;
    }

    public function getSetters()
    {
        $setters = [];
        foreach ($this->getMapping() as $attr => $col) {
            $setters[$attr] = 'set' . ucfirst(strtolower($attr));
        }
        return $setters;
    }

    public function __call($method, $arguments) {
        if (!method_exists($this, $method)) {
            throw new \RuntimeException($method . '() method does not exists');
        }
    }

    public function on($event, EventListener $listener)
    {
        EventBus::subscribe($listener, $event);
        return $this;
    }

    public function off($event, EventListener $listener)
    {
        EventBus::unsubscribe($listener, $event);
        return $this;
    }

    public function trigger($event)
    {
        EventBus::notifyAll($event, $this);
        return $this;
    }
}

