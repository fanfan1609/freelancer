<?php
include 'merge.php';
$result = array();
if(isset($_POST['submit'])){
	@set_time_limit(0);;
	$list_1 = explode("\n", trim($_POST['list_1']));
	$list_2 = explode("\n", trim($_POST['list_2']));
	$list_3 = explode("\n", trim($_POST['list_3']));

	$list_1 = array_map('removeNewLine',array_filter($list_1,'removeEmptyLine'));
	$list_2 = array_map('removeNewLine',array_filter($list_2,'removeEmptyLine'));
	$list_3 = array_map('removeNewLine',array_filter($list_3,'removeEmptyLine'));

	$result = combine_array($list_1, combine_array($list_2, $list_3));
	echo trim(implode("\n", $result));
	flush();
	// $Domain = new DomainAvailability();
	// foreach( $result as $r){
	// 	if( $Domain->is_available($r) ){
	// 		$result_avaiable[] = $r;
	// 	}
	// }
	
	// $result_avaiable = array_filter($result,'domain_check');
}
