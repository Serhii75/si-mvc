<?php

namespace core;

class MapAutoloader
{
	protected $classesMap = [];

	public function registerClass($className, $absolutePath)
	{
		if ( file_exists($absolutePath) ) {
			$this->classesMap[$className] = $absolutePath;
			return true;
		}
		return false;
	}

	public function autoload($class)
	{
		$path = BASE_PATH . DS . str_replace('\\', DS, $class) . '.php';

		if ( array_key_exists($class, $this->classesMap) || $this->registerClass($class, $path) ) {
			return require_once($this->classesMap[$class]);
		}
		return false;
	}
}
