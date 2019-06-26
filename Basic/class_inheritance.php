<?php

class First {
	public $id =23;
	protected $name = 'Jhon Doe';

	public function saySomething($word)
	{
		echo $word;
	}
}

class Second extends First {
	public function getName()
	{
		echo $this->name;
	}
}

$second = new Second;

echo $second->getName();