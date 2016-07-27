<?php
require_once __DIR__ . '/autoload.php';

$config = get_config();

$db_path = $config['db']['path'];
JsonDataSource::initSource($db_path);

$_data_source  = new JsonDataSource($db_path);
$user_provider = new UserDataProvider($_data_source);
$user_mapper   = new UserDataMapper($_data_source);

var_dump($user_mapper->find(1));

$user_logic = new UserLogic($user_provider, $user_mapper);

$_GET['name'] = 'name';
$user_controller = new UserController($user_logic);
$user_controller->actionRegister();

