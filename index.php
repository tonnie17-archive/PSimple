<?php
require_once __DIR__ . '/common/ioc.php';
require_once __DIR__ . '/autoload.php';

use Pineapple\app\Application;
use Pineapple\common\IOC;

$config  = get_config();
$db_path = $config['db']['path'];

IOC::N('CustomJsonDataSource', [$db_path]);
IOC::N('UserDataProvider', ['CustomJsonDataSource']);
IOC::N('UserDataMapper', ['CustomJsonDataSource']);
IOC::N('UserLogic', ['UserDataProvider', 'UserDataMapper']);
IOC::N('UserController', ['UserLogic']);

$app = new Application($config);
$app->dispatch();
