<?php

use core\Config;
use core\Registry;
use core\Router;

require_once BASE_PATH . '/helpers/CmsHelper.php';
require_once BASE_PATH . '/core/MapAutoloader.php';

$autoloader = new core\MapAutoloader();
spl_autoload_register([$autoloader, 'autoload']);

$config = require_once BASE_PATH . '/configs/web.php';
Config::getInstance()->set($config);

Registry::set('config', Config::getInstance());

Router::dispatch();
