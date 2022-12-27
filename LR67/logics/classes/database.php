<?php

class Database
{
	// единственный экземпляр данного класса
	private static $instance = null;

	private $connection = null;

	// запрет на создание новых экземпляров вне класса
	protected function __construct()
	{
		$this->connection = new \PDO(
			'mysql:host=localhost; dbname=rostrubostal', 'root',
			'',
			[
				// выбрасывает исключение в случае каких-то проблем
				PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,

				// использование имён столбцов по умолчанию
				PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,

				// использование подготовки запроса на уровне БД
				PDO::ATTR_EMULATE_PREPARES => false
			]
		);
	}

	// подготовленное выражение
	public static function prepare($statement): \PDOStatement
	{
		return static::connection()->prepare($statement);
	}

	// создание экмземпляра класса, который хранит подключение к БД
	public static function connection(): \PDO
	{
		return static::getInstance()->connection;
	}

	// сам экземпляр подключения к БД
	public static function getInstance(): Database
	{
		if (null == self::$instance) {
			self::$instance = new static();
		}

		return self::$instance;
	}

	// запрет клонирования
	protected function __clone()
	{

	}
}