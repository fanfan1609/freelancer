<?php
ob_start();
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
//include "$root/survey/test/header.php";
include_once "database.php";
include_once "header.php";
include_once "template.php";

$survey 		= new DB();
if( empty($_POST['question_id']) )
{
	$question_id = 1; // first question
	$_SESSION['count'] = 0;
	unset($_SESSION['result']);
} else {
	// Store data
	if( !isset($_SESSION['result']) )
	{
		$_SESSION['result'] = array();
	}
	$_SESSION['result'][$_POST['question_id']] = array(
		'question' => $_POST['question'],
		'answer' => !empty($_POST['answer']) ? $_POST['answer'] : '' ,
		'point' => $_POST['point']);
	
	$question_id = $_POST['question_id'] + 1; // next question
	if( $question_id == 17 )
	{
		$numof_new_clients = !empty($_SESSION['result']['15']['answer']) ? $_SESSION['result']['15']['answer'] : 1;
	}
}

$question = $survey->getQuestion($question_id);

if( $question ) // Still has question
{
	$answers  = $survey->getAnswers($question_id);
} else {
	// Has finished all
	// ob_clean();
	header("Location: result.php");
}
?>

<div id="testbox">
<?php if(!empty($question)):?>
	<form method='post' id="form00" name="form00" action='' accept-charset='utf-8'>
	<?php if($question_id == 1):?>
		<h1>Do the 2-minute test</h1>
		<p>...to see if you can automate some of your client acquisition, and what you'll gain by it.</p>
	<?php endif?>
		<h3><?php echo $question['content'] ?></h3>
		<input type="hidden" name="numof_new_clients" id='numof_new_clients' value='<?php echo !empty($numof_new_clients) ? $numof_new_clients : 1 ?>'>
		<input type="hidden" name="question_id" id="question_id" value="<?php echo $question_id?>" >
		<input type="hidden" name="question" value="<?php echo $question['content'] ?>" >
		<input type="hidden" name="type" id="type" value="<?php echo $question['type'] ?>" >
		<input type="hidden" name="is_skippable" id="is_skippable" value="<?php echo $question['is_skippable'] ?>" >
		<input type="hidden" name="point" value="0" id="question_point">
		<?php
			if( $question_id != 17)
			{
				switch ($question['type']) {
					case 'text':
						showText($answers);
						break;
					case 'checkbox':
						showCheckbox($answers);
						break;
					case 'select':
						showSelect($answers);
						break;
					default: // Default is radio
						showRadio($answers);
						break;
				}
			} else {
				question17();
			}
		?>
		<input  id='btnValidate'  type='submit' value='Nästa&raquo;'/>
	</form>
<?php endif;?>
</div>

<?php
// Should not include this on the FIRST iframe in order to not tell Otto and Google Analytics that this page is visited twice!
// include "$root/survey/test/footer.php";
include "footer.php";
?>
<script type="text/javascript">
	var question_id 		= $("#question_id").val();
	var numof_new_clients 	= $("#numof_new_clients").val();
	var img_name = parseInt(question_id) % 7 ;
	function loadBG(){
		img_url = "url(images/0"+img_name+".jpg)";
		document.getElementById("testbox").style.backgroundImage= img_url;
	}
	window.onload=loadBG();
	$(document).ready(function(){
		var type 	= $("#type").val();
		var is_skip = $("#is_skippable").val(); 
		var answer  = '';
		var point   = 0;
		$("#form00").submit(function(){
			switch(type){
				case 'text':
					$(".answer").attr('disabled',false);
					answer = $('.answer').val();
					break;
				case 'select':
					answer = $('.answer').val();
					point  = $('.answer').find('option:selected') ? $('.answer').find('option:selected').attr('data-point') : 0;
					break;
				case 'radio':
					answer = $('.answer:checked').length == 1 ? $('.answer:checked').val() : '';
					
					if( answer.indexOf('blank_text') > -1 ){
						answer = answer.replace('blank_text',$('input[name="answer_value"]').val());
						$("input[name='answer']").val(answer);
					}

					point  = $('.answer:checked') ? $('.answer:checked').attr('data-point') : 0;
					
					break;
				case 'checkbox':
					answer = [];
					
					if( $('.answer:checked').length > 0){
						$('.answer:checked').each(function(){
							// answer += $(this).val() +",";
							answer.push($(this).val());
							point = point + parseInt($(this).attr('data-point'));
						});
					}
					
					$("input[name='answer']").val(answer);
					break;
			}
			
			$("input[name='point']").val(point);
			if( is_skip == 0 && answer.length < 1 )
			{
				msg = type != 'text' ? "Please choose one option" : "Please input value";
				alert(msg);
            	return false;
			}
			//return true;
		});
	
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
