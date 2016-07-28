<?php

class ApcCache implements Cachable
{
    public static function get($name)
    {
        return apc_fetch($name);
    }

    public static function set($name, $value)
    {
        apc_store($name, $value);
    }

    public static function drop($name)
    {
        apc_delete($name);
    }

    public static function clear()
    {
        apc_clear_cache();
    }

    public static function exists($name)
    {
        return apc_exists($name);
    }

    public static function inc($name, $step=1)
    {
        return apc_inc($name, $step);
    }

    public static function dec($name, $step=1)
    {
        return apc_dec($name, $step);
    }
}
