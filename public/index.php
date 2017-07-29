<?php

define('BASE_PATH', dirname(__DIR__));
define('DS', DIRECTORY_SEPARATOR);

$prototype = 'http' . ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') ? 's' : '') . '://';
$server = isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : $_SERVER['SERVER_NAME'];
define('BASE_URL', $prototype . $server);

require_once BASE_PATH . DS . 'init.php';
