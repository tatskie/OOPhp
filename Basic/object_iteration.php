<?php

class People {
	public $person1 = 'Mike';
	public $person2 = 'Shelly';
	public $person3 = 'Jeff';

	//  = [
	// 	'Mike', 'Shelly', 'Jeff'
	// ];

	public $vip = 'John';
	private $midleMan = 'Jen';

	// function iterateObject(){
	// 	foreach ($this as $key => $value) {
	// 		print "$key => $value\n";
	// 	}
	// }
}

$people = new People;
foreach ($people as $key => $value) {
	print "$key => $value". '<br>';
}
// $people->iterateObject();