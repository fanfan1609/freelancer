<?php

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
	if( empty($_SESSION['result']) )
	{
		$_SESSION['result'] = array();
	}
	$_SESSION['result'][$_POST['question_id']] = array('question' => $_POST['question'],'answer' => $_POST['answer'],'point' => $_POST['point']);
	
	$question_id = $_POST['question_id'] + 1; // next question
}

$question = $survey->getQuestion($question_id);

if( $question ) // Still has question
{
	$answers  = $survey->getAnswers($question_id);
} else {
	// Has finished all
	header("Location: result.php");
}
?>

<div id="testbox">
<?php if(isset($question)):?>
	<form method='post' id="form00" name="form00" action='' accept-charset='utf-8'>
		<h1>Gör 2-minuterstestet</h1>
		<p>...för att se om Marketing Automation är något för dig, och om du skulle tjäna på det.</p>
		<h3><?php echo $question['content'] ?></h3>
		<input type="hidden" name="question_id" id="question_id" value="<?php echo $question_id?>" >
		<input type="hidden" name="question" value="<?php echo $question['content'] ?>" >
		<input type="hidden" name="type" id="type" value="<?php echo $question['type'] ?>" >
		<input type="hidden" name="is_skippable" id="is_skippable" value="<?php echo $question['is_skippable'] ?>" >
		<input type="hidden" name="point" value="0" id="question_point">
		<?php
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
	var question_id = document.getElementById('question_id').value;
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
					answer = $('.answer').val();
				case 'select':
					answer = $('.answer').val();
					point  = $('.answer').find('option:selected') ? $('.answer').find('option:selected').attr('data-point') : 0;
					break;
				case 'radio':
					answer = $('.answer:checked') ? $('.answer:checked').val() : '';
					if( answer.indexOf('blank_text') > -1 ){
						answer = answer.replace('blank_text',$('input[name="answer_value"]').val());
						$("input[name='answer']").val(answer);
					}
					point  = $('.answer:checked') ? $('.answer:checked').attr('data-point') : 0;
					break;
				case 'checkbox':
					answer = [];
					$('.answer:checked').each(function(){
						// answer += $(this).val() +",";
						answer.push($(this).val());
						point = point + parseInt($(this).attr('data-point'));
					})
					$("input[name='answer']").val(answer);
					break;
			}
			
			$("input[name='point']").val(point);
			if( is_skip == 0 && !answer )
			{
				alert("Please choose one option");
            	return false;
			}
			return true;
		});
	});
</script>

