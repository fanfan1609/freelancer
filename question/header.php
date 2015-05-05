<?php
session_start();
include_once 'config.php';
header('Content-Type: text/html; charset=utf-8');
?>

<link rel="stylesheet" href="css/style.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script type="text/javascript">

$(document).ready(function(){
	
	(function() {
		
		//Fetch current question id
		var current_question_id = $("input#question_id").val();
		
		//If we're on the first question
		if (current_question_id == 1){	
			$("input[type='radio']").on("click", function (){
				document.form00.setAttribute("target", "_blank");
				document.form00.submit();
			});	
		}
	})();

});

</script>
<body>