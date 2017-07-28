<?php

namespace core;

class Router
{
	private static $language;

	private static $app;

	private static $controller;

	private static $action;

	private static $params = [];

	public static function dispatch()
	{
		$parts = explode('?', $_SERVER['REQUEST_URI']);
		$params = explode('/', trim($parts[0], '/'));

		$languages = Registry::get('config')->get('languages');
		if ( count($params) > 0 && array_key_exists($params[0], $languages) ) {
			self::$language = array_shift($params);
		} else {
			self::$language = Registry::get('config')->get('defaults.defaultLanguage');
		}

		$apps = Registry::get('config')->get('apps');
		if ( count($params) > 0 && array_key_exists($params[0], $apps) ) {
			self::$app = array_shift($params);
		} else {
			self::$app = Registry::get('config')->get('defaults.defaultApp');
		}

		$controller = array_shift($params);
		self::$controller = self::prepareClassName($controller ?: Registry::get('config')->get('defaults.defaultController'));

		$action = array_shift($params);
		self::$action = self::prepareActionName($action ?: Registry::get('config')->get('defaults.defaultAction'));

		$keys = [];
		$values = [];
		foreach ( $params as $index => $value ) {
			if ( $index % 2 === 0 ) {
				$keys[] = $value;
			} else {
				$values[] = $value;
			}
		}

		//var_dump(self::$controller, self::$action);

		self::$params = array_combine(array_slice($keys, 0, count($values)), $values);

		return self::executeAction();
	}

	public static function prepareClassName($class)
	{
		return 'apps\\' . self::$app . '\\controllers\\' . self::camelize($class) . 'Controller';
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
