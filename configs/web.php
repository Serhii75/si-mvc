<?php

return [
	'db' => [
		'host' => 'localhost',
		'name' => 'mvc_blog',
		'user' => 'root',
		'password' => ''
	],
	'modules' => [
		'site' => 'site',
		'admin' => 'admin'
	],
	'template' => [
		'templatesDir' => ROOT . '/views',
		'layoutDir' => ROOT . '/views/layout'
	]
];