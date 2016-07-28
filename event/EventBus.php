<?php

class EventBus
{
    private static $_listeners = [];

    public static function subscribe(EventListener $listener, $event)
    {
        if (!isset(static::$_listeners[$event])) {
            static::$_listeners[$event] = [];
        }
        static::$_listeners[$event][] = $listener;
    }

    public static function unsubscribe(EventListener $listener, $event)
    {
        $key = array_search($listener, static::$_listeners[$event], true);
        if ($key) {
            unset(static::$_listeners[$key]);
        }
    }

    public static function notifyAll($event, &$context=null)
    {
        if (!isset(static::$_listeners[$event])) return;
        foreach (static::$_listeners[$event] as $key => $listener) {
            $listener->update($event, $context);
        }
    }

}
