<?php
ob_start();
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
//include "$root/survey/test/header.php";
include_once "database.php";
include_once "header.php";
include_once "template.php";

// $delete_id = array(3,18,19);
// $finish_id = 17;
$survey 		= new DB();
$back_answer 	= '';
$is_back 		= 0;
if( !empty($_POST['is_back']) )
{
	$question_id = $_POST['question_id'];
	$back_answer = $_SESSION['result'][$question_id]['answer'];
	$is_back 	 = 1;
} else {
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

		if( $_POST['question_id'] == 14 && strpos($_POST['answer'],"know our numbers"))
		{
			// Skip to question 20 if question 14 select answer 2
			$question_id = 18 ;
		} else {
			$question_id = $_POST['question_id'] == 2 ? $_POST['question_id'] + 2 : $_POST['question_id'] + 1; // next question		
		}
		
		if( $question_id == 17 )
		{
			$numof_new_clients = !empty($_SESSION['result']['15']['answer']) ? $_SESSION['result']['15']['answer'] : 1;
		}
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
		<input type="hidden" name="is_back" id="is_back" value="0" >
		<input type="hidden" name="question_id" id="question_id" value="<?php echo $question_id?>" >
		<input type="hidden" name="question" value="<?php echo $question['content'] ?>" >
		<input type="hidden" name="type" id="type" value="<?php echo $question['type'] ?>" >
		<input type="hidden" name="is_skippable" id="is_skippable" value="0" >
		<input type="hidden" name="point" value="0" id="question_point">
		<?php
			if( $question_id != 17)
			{
				switch ($question['type']) {
					case 'text':
						showText($answers,$is_back,$back_answer);
						break;
					case 'checkbox':
						showCheckbox($answers,$is_back,$back_answer);
						break;
					case 'select':
						showSelect($answers,$is_back,$back_answer);
						break;
					default: // Default is radio
						showRadio($answers,$is_back,$back_answer);
						break;
				}
			} else {
				question17();
			}
		?>

		<input  id='btnValidate'  type='submit' value='NEXT'/>
		<?php if(!empty($_POST['question_id']) && $question_id != 1):
		$back_id = $question_id == 4  ? 2 : $question_id - 1;
		?>
			<input type='button' id='back' value='Back' data-id="<?php echo $back_id?>" />
		<?php endif?>
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

		// if( $("[type='radio']:checked").length == 0 ){
		// 	$("[type='radio']").first().attr('checked','checked');
		// }
		// if( $("[type='checkbox']:checked").length == 0 ){
		// 	$("[type='checkbox']").first().attr('checked','checked');
		// }

		$("#calculate").attr("checked",false);
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
			
			if( is_skip == 0 && answer.length < 1 && $("#is_back").val() == 0)
			{
				msg = type != 'text' ? "Please choose one option" : "Please input value";
				alert(msg);
            	return false;
			}
			if( answer == 'NaN' && $("#question_id").val() == 17)
			{
				alert('Please fill in EITHER the Client Acquisition Cost (CAC) or to fill in the other fields to calculate a CAC');
				return false;
			}
			//return true;
		});
	
		displayCalculate();
		$("#calculate").change(function(){
			displayCalculate();
		});
		$(".calculate").blur(function(event) {
			doMath();
		});

		$("#back").click(function(){
			id = $(this).attr('data-id');
			$("#is_back").val(1);
			$("#question_id").val(id);
			$("#form00").submit();
		});
	});

	function displayCalculate(){
		if($("#calculate").is(':checked')){
			// $("#answer").attr('disabled',true);
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
