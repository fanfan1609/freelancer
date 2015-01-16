<?php include_once 'template.php';?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
</head>
<body>
	<?php question17();?>
	<script src="js/jquery.min.js" type="text/javascript"></script>
	<script type="text/javascript">
	
		$(function(){
			displayCalculate();
			$("#calculate").change(function(){
				displayCalculate();
			});
			$(".calculate").blur(function(event) {
				console.log('calculate');
				doMath();
			});
		});

		function displayCalculate(){
			if($("#calculate").is(':checked')){
				$("#answer").attr('disabled',true);
				$("#calculate-items").show();
			} else {
				$("#answer").attr('disabled',false);
				$("#calculate-items").hide();
			}
		}
		function doMath(){
			var value_num_emp = parseInt($("#sales").val());
			var salary = parseInt($("#salary").val());
			var value_timeonnew = parseInt($("#percent").val());
			var value_mktg_budg = parseInt($("#spent").val());
			
			var calccac = Math.round(((value_num_emp * salary * 1.5 * 12 * value_timeonnew / 100) + value_mktg_budg) / numof_new_clients);
			$("#answer").val(calccac);
		}
	</script>
</body>
</html>