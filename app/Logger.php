<?php

namespace Pineapple\app;

class Logger
{
    const INFO  = 0;
    const DEBUG = 1;
    const ERROR = 2;

    protected static $_logger;
    protected static $_level = self::DEBUG;

    private static $_levels  = [
        self::INFO,
        self::DEBUG,
        self::ERROR
    ];
    
    public function getLogger()
    {
        if (!isset(self::$instance))
        {
            self::$_logger = new self;
        }
        return self::$_logger;
    }

    public function log($msg, $level, $dir)
    {
        self::setLevel($level);
        $log_name = 'debug';
        $log_type = 3;
        if ($level === self::INFO) {
            $log_type = 0;
        }
        elseif ($level === self::ERROR) {
            $log_name = 'error';
        }
        $file         = $dir . $log_name . '.log';
        error_log($msg, $log_type, $file);
    }

    public function setLevel($level)
    {
        if (!in_array($level, self::$_levels)) {
            throw new \InvalidArgumentException("Invalid level type.");
        }
        self::$_level = $level;
        return $this;
    }
}
