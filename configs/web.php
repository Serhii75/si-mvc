<?php

return [
	'db' => [
		'host' => 'localhost',
		'name' => 'mvc_blog',
		'user' => 'root',
		'password' => ''
	],
	'apps' => [
		'admin' => 'admin',
		'blog' => 'blog',
		'portfolio' => 'portfolio',
		'site' => 'site',
		
	],
	'languages' => [
		'uk' => 'ukrainian',
		'en' => 'english',
		'ru' => 'russian'
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