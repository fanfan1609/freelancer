<?php 
// include 'merge.php';
// include 'dns.php';
// include 'DomainAvailability.php';
// Define your array here
// $a = array("Alpha", "Beta", "Gamma");
// $b = array("One", "Two", "Three");
// $c = array( "Blue", "Red");

// $result = combine_array($a, combine_array($b, $c));
// print_r($result);
// $result = null;
// $result_avaiable = array();

// if(isset($_POST['append'])){
// 	@ini_set('max_execution_time', 0);
// 	$list_1 = explode("\n", trim($_POST['list_1']));
// 	$list_2 = explode("\n", trim($_POST['list_2']));
// 	$list_3 = explode("\n", trim($_POST['list_3']));

// 	$list_1 = array_map('removeNewLine',array_filter($list_1,'removeEmptyLine'));
// 	$list_2 = array_map('removeNewLine',array_filter($list_2,'removeEmptyLine'));
// 	$list_3 = array_map('removeNewLine',array_filter($list_3,'removeEmptyLine'));

// 	$result = combine_array($list_1, combine_array($list_2, $list_3));

// 	// $Domain = new DomainAvailability();
// 	// foreach( $result as $r){
// 	// 	if( $Domain->is_available($r) ){
// 	// 		$result_avaiable[] = $r;
// 	// 	}
// 	// }
	
// 	// $result_avaiable = array_filter($result,'domain_check');
// }

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Domain List Tool</title>
		<meta charset="UTF-8">
		<style type="text/css">
			div.item {
			    display: table-cell;
			    vertical-align: middle;
			    height: 50px;
			    padding: 10px;
			    /*border: 1px solid red;*/
			}
			div.result {
				margin: 10px
			}

			label{
				display: block;
			} 
		</style>
	</head>

	<body bgcolor="#ECF1EF">
		<h2>Domain Availability List Tool</h2>
Step 1: Add word lists to the prefix and suffix boxes and add any extensions that you want to search for, then click the Create Domain List button.<br>
Step 2: Click the Check Domain Availability button to see a list of all the available domains.<br>
Step 3: Click the Copy to Clipboard button and paste the available domains into your registrar of choice for purchase.
		<form method="post" id="domainTool">
			<input type="hidden" name="submit" value="1">
			<div class='item'>
				<label> Paste Prefix List Here: </label>
				<textarea name="list_1" id="list_1"><?php echo isset($_POST['list_1']) ? $_POST['list_1'] : ''?></textarea>
			</div>
			<div class='item'>
				<label> Paste Suffix List Here: </label>
				<textarea name="list_2" id="list_2"><?php echo isset($_POST['list_2']) ? $_POST['list_2'] : ''?></textarea>
			</div>
			<div class='item'>
				<label> Input Extension Types Here: </label>
				<textarea name="list_3" id="list_3"><?php echo isset($_POST['list_3']) ? $_POST['list_3'] : '.com'?></textarea>
			</div>

			<div class='result'>
				<input type="submit" name="append" id="createDomain" value="Create Domain List">
				<button type="button" id="resetValue">Reset All</button>
				<label>Created Domain List:<span id="createdDomainText"></span></label>
				<textarea rows="10" cols="50" id="result"><?php echo isset($result) ? trim(implode("\n", $result)) : ''?></textarea>
			</div>
		</form>
		<div class='result'>
			<label>Available Domain List: <span id="availableDomainText"></span></label>
			<textarea rows="10" cols="50" id="availableDomain"></textarea>
			
		</div>
		<button id="d_clip_button" class="my_clip_button" data-clipboard-text="Default clipboard text from attribute" data-clipboard-target="availableDomain" title="Click me to copy to clipboard.">Copy Available Domains To Clipboard...</button>
		
		<script type="text/javascript" src="js/lib/jquery.min.js"></script>
		<script type="text/javascript" src="js/lib/jquery.retryAjax.js"></script>
		<script type="text/javascript" src="js/lib/ZeroClipboard.js"></script>
		<script type="text/javascript" src="js/main.js"></script>
	</body>
</html>