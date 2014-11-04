<?php
$a = array('Alpha', 'Beta', 'Gamma');
$b = array('One','Two','Three');
$c = array('Blue','Red','Green');

var_dump(combine_array($a,$b));


function combine_array($a,$b){
	$result = array();
	foreach($a as $k_a){
		$tmp = array_fill(0,count($b), $k_a);
		var_dump($tmp);

		$result = array_merge($result,array_combine(array_values($tmp),array_values($b)));
	}
	return $result;
}

function combine_string($a){
	
}