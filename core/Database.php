<?php

namespace core;

use PDO;

class Database
{
	private $connection;

	public function __construct($host, $user, $password, $db)
	{
		$this->connection = new PDO("mysql:host={$host};dbname={$db}", $user, $password);
	}

	public function getConnection()
	{
		return $this->connection;
	}
}
