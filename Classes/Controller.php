<?php

abstract class Controller {
	protected $request;
	protected $action;

	public function __construct($action, $request)
	{
		$this->action = $action;
		$this->request = $request;
	}

   /**
	* Execute an Action
	*/
	public function executeAction()
	{
		return $this->{$this->action}();
	}

   /**
	* Return function view
	* @param $viewModel, $fullView
	*/
	protected function returnView($viewModel, $fullView)
	{
		$view = 'Views/' .get_class($this). '/' .$this->action. '.php';

		if ($fullView) {
			
		}
	}
}