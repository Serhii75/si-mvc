<?php

namespace core;

class Registry
{
	private static $elements = [];

	public static function set($key, $value)
	{
		self::$elements[$key] = $value;
	}

	public static function get($key)
	{
		if ( array_key_exists($key, self::$elements) ) {
			return self::$elements[$key];
		}
		throw new \Exception("Element '{$key}' is not registered");
	}
}
