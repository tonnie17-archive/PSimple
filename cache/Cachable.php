<?php

namespace Pineapple\cache\Cachable;

interface Cachable
{
    public static function get($name);
    public static function set($name, $value);
    public static function drop($name);
    public static function clear();
    public static function exists($name);
    public static function inc($name);
    public static function dec($name);
}
