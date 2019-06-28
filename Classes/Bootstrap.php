<?php

class Bootstrap {
	private $controller;
	private $action;
	private $request;

	public function __construct($request)
	{
		$this->request = $request;

		// Condition for first param in url
		if ($this->request['controller'] == "") {
			$this->controller = 'home';
		} else {
			$this->controller = $this->request['controller'];
		}

		// Condition for second param in url
		if ($this->request['action'] == "") {
			$this->action = 'index';
		} else {
			$this->action = $this->request['action'];
		}
	}

   /**
	* Create Controller from views.
	*/
	public function createController()
	{
		// Check Class if Exists
		if (class_exists($this->controller)) {
			$parents = class_parents($this->controller);

			// Check if the class is extended
			if (in_array("Controller", $parents)) {

				//Check if the method exists
				if (method_exists($this->controller, $this->action)) {
					return new $this->controller($this->action, $this->request);
				} else {
					// Method Doesn't Exists
					echo '<h1>Method does not exists.</h1>';
					return;
				}
			} else {
				// Base Controller Doesn't Exists
				echo '<h1>Base controller does not exists.</h1>';
				return;
			}
		} else {
			// Controller Class Doesn't Exists
			echo '<h1>Controller class does not exist. </h1>';
			return;
		}
	}
}