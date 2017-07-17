<?php

namespace core;

class Router
{
	private static $module;

	private static $controller;

	private static $action;

	private static $params = [];

	public static function dispatch()
	{
		$parts = explode('?', $_SERVER['REQUEST_URI']);
		$params = explode('/', trim($parts[0], '/'));

		$modules = Registry::get('config')->get('modules');
		if ( array_key_exists($params[0], $modules) ) {
			self::$module = array_shift($params);
		} else {
			self::$module = 'site';
		}

		$controller = array_shift($params);
		self::$controller = self::prepareClassName($controller ?: 'index');

		$action = array_shift($params);
		self::$action = self::prepareActionName($action ?: 'index');

		$keys = [];
		$values = [];
		foreach ( $params as $index => $value ) {
			if ( $index % 2 === 0 ) {
				$keys[] = $value;
			} else {
				$values[] = $value;
			}
		}

		self::$params = array_combine(array_slice($keys, 0, count($values)), $values);

		return self::executeAction();
	}

	public static function prepareClassName($class)
	{
		return 'modules\\' . self::$module . '\\controllers\\' . self::camelize($class) . 'Controller';
	}

	private static function prepareActionName($action)
	{
		return 'action' . self::camelize($action);
	}

	private static function camelize($name)
	{
		$nameParts = explode('-', $name);
		array_walk($nameParts, function(&$part) {
			$part = ucfirst($part);
		});

		return implode($nameParts);
	}

	private static function executeAction()
	{
		if ( !class_exists(self::$controller) || !method_exists(self::$controller, self::$action) ) {
			return (new Controller())->action404();
		}

		$controller = new self::$controller();

		return call_user_func_array([$controller, self::$action], self::$params);
	}
}
