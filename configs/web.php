<?php

return [
	'db' => [
		'host' => 'localhost',
		'name' => 'mvc_blog',
		'user' => 'root',
		'password' => ''
	],
	'apps' => [
		'site' => 'site',
		'admin' => 'admin'
	],
	'template' => [
		'templatesDir' => ROOT . '/views',
		'layoutDir' => ROOT . '/views/layout'
	],
	'defaults' => [
		'defaultApp' => 'site',
		'defaultController' => 'index',
		'defaultAction' => 'index',
		'defaultLanguage' => 'uk'
	]
];