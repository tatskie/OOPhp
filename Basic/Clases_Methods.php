<?php

namespace App;

class User {
	public function __construct()
	{
		// Good for initiating middleware
		//echo 'Constructor called';
	}

	public function register()
	{
		echo 'User Registered!';
	}

	public function login($username, $password)
	{
		$this->authUser($username, $password);
	}

	public function authUser($username, $password)
	{
		if ($username == 'jhon' && $password == 'secret') {
			echo $username. ' is now login';
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

