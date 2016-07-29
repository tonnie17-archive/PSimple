<?php

namespace Pineapple\common;

use Pineapple\app\Application;
use Pineapple\http\HTTPServerException;

class IOC
{
    protected static $_registry = [];
    protected static $_pools    = [];

    public static function N($class, array $args = array(), $alias = null)
    {
        $name = is_string($alias) ? $alias: $class;
        static::bind($name, function() use ($class, $args) {
            $args = array_map(function($depn) {
                if (!isset(static::$_registry[$depn])) {
                    return $depn;
                }
                return static::find($depn);
            }, $args);
            return new $class(...$args);
        });
    }

    public static function bind($name, Callable $callable)
    {
        static::$_registry[$name] = $callable;
    }

    public static function find($name)
    {
        if (!isset(static::$_registry[$name])) {
            throw new HTTPServerException($name . ' not in IOC registry list');
        }
        if (!isset(static::$_pools[$name])) {
            $resolver = static::$_registry[$name];
            static::$_pools[$name] = $resolver();
        }
        return static::$_pools[$name];
    }
}
