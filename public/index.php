<?php

use core\Config;
use core\Registry;
use core\Router;

define('ROOT', dirname(__DIR__));

require_once ROOT . '/core/MapAutoloader.php';

$autoloader = new core\MapAutoloader();
spl_autoload_register([$autoloader, 'autoload']);

$config = require_once ROOT . '/configs/web.php';
Config::getInstance()->set($config);

Registry::set('config', Config::getInstance());

Router::dispatch();
