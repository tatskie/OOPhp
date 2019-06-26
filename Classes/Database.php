<?php

class Database {
	private $host = 'localhost';
	private $user = 'root';
	private $password = '';
	private $dbname = 'myblog';
	private $handler;
	private $error;
	private $statement;

	public function __construct()
	{
		// Set DSN
		$dsn = 'mysql:host='. $this->host .';dbname='. $this->dbname;

		// Set Options
		$options = array(
			PDO::ATTR_PERSISTENT	=> true,
			PDO::ATTR_ERRMODE	=> PDO::ERRMODE_EXCEPTION
		);

		// Create new PDO
		try {
			$this->handler = new PDO($dsn, $this->user, $this->password, $options);
		} catch(PDOException $e) {
			$this->error = $e->getMessage(); 
		}
	}

   /**
  	* Database query
	* @param $query
	*/
	public function query($query)
	{
		$this->statement = $this->handler->prepare($query);
	}

   /**
  	* Bind Data Function
	* @param $param, $value, $type
	*/
	public function bind($param, $value, $type = null)
	{
		if (is_null($type)) {
			switch (true) {
				case is_int($value):
					$type = PDO::PARAM_INT;
					break;
				case is_bool($value):
					$type = PDO::PARAM_BOOL;
					break;
				case is_null($value):
					$type = PDO::PARAM_NULL;
					break;
					default:
					$type = PDO::PARAM_STR;
			}
		}

		$this->statement->bindValue($param, $value, $type);
	}

   /**
  	* Execute PDO
	*/
	public function execute()
	{
		return $this->statement->execute();
	}

   /**
  	* Result Set
	*/
  	public function resultSet()
  	{
  		$this->execute();

  		return $this->statement->fetchAll(PDO::FETCH_ASSOC);
  	}
}