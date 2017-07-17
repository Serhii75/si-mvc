<?php

namespace core;

class Config
{
	private $data = [];

	private static $instance = null;

	private function __construct() {}

	private function __clone() {}

	public static function getInstance()
	{
		if ( null === self::$instance ) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	public function set(array $data)
	{
		$this->data = $data;
	}

	public function get($key, $default = null)
	{
		$keyParts = explode('.', $key);

        $result = $this->data;
        foreach ($keyParts as $part) {
            if (!is_array($result)) {
                return $default;
            }

            $result = array_key_exists($part, $result) ? $result[$part] : $default;
        }

        return $result;
	}
}
