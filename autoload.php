<?php

require_once __DIR__ . '/config.php';
require_once __DIR__ . '/common/ioc.php';

function autoloading($class)
{
    $importDirs = get_config()['import'];
    foreach ($importDirs as $key => $dir) {
        if (strpos($class, '\\') !== -1) {
            $class = explode('\\', $class);
            $class = end($class);
        }
        $fileName = __DIR__ . DIRECTORY_SEPARATOR . $dir . DIRECTORY_SEPARATOR . $class . '.php';
        $fileName = str_replace('\\', DIRECTORY_SEPARATOR, $fileName);
        if (is_file($fileName)) {
            require_once $fileName;
        }
    }
}

spl_autoload_register('autoloading');
