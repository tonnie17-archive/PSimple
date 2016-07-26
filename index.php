<?php

require_once __DIR__ . '/autoload.php';

$config = get_config();

$_data_source = new JsonDataSource($config['db']['path']);

$user_provider = new UserDataProvider($_data_source);
$user_mapper   = new UserDataMapper($_data_source);

$user_logic = new UserLogic($user_provider, $user_mapper);
// var_dump($user_logic->getUser(1));

$_GET['name'] = 'name';
$register_controller = new RegisterController($user_logic);
$register_controller->actionRegister();
