<?php

class User {

	public $id;
	public $username;
	public $email;
	public $password;

	public function __construct($username, $password)
	{
		$this->username = $username;
		$this->password = $password;
	}

	public function register()
	{
		echo 'User Registered!';
	}

	public function login()
	{
		$this->authUser();
	}

	public function authUser()
	{
		if ($this->username == 'jhon' && $this->password == 'secret') {
			echo $this->username. ' is now login';
		}
		else {
			echo 'Wrong email or password!';
		}
		
	}
	public function __destruct()
	{
		// Good for disabling database connection after called
		//echo 'Destructor called';
	}
}


$user = new User('jhon', 'secret');

$user->login();