<?php

namespace core;

class Module
{
	protected static $controller;

	protected static $action;

	public static function _($module) 
	{
		$parts = explode('/', $module);

		if ( count($parts) > 0 ) {
			$controller = 'modules\\'. $parts[0] . '\\controllers\\' 
				. ucfirst($parts[0]) . 'Controller';
			$path = BASE_PATH . DS . str_replace('\\', DS, $controller) . '.php';
			
			if ( file_exists($path) ) {
				require_once $path;

				$controller = new $controller;
				$action = 'action' . (isset($parts[1]) ? ucfirst($parts[1]) : ucfirst('index'));

				return call_user_func([$controller, $action]); 
			}
			
		}
	}
}
