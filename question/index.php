<?php

$root = realpath($_SERVER["DOCUMENT_ROOT"]);
//include "$root/survey/test/header.php";
include_once "database.php";
include_once "header.php";
$survey 		= new DB();

$question_id 	= !empty($_POST['question_id']) ? $_POST['question_id'] : 1;
$next_question_id = !empty($_POST['next_question_id']) ? $_POST['next_question_id'] : 1;
if( empty($_SESSION['count']) )
{
	$_SESSION['count'] = 1;
} 
else {
	$_SESSION['count']++;
}

$total    = $survey->countQuestion();
if( $total > $_SESSION['count']) // Still has question
{
	$question = $survey->getQuestion($question_id);
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
		<input type="hidden" name="question_id" value="<?php echo $question_id?>" >
		<input type="hidden" name="next_question_id" value="<?php echo $question_id + 1?>" >
		<input type="hidden" name="is_skippable" id="is_skippable" value="<?php echo $question['is_skippable'] ?>" >
	<?php
	switch ($i):
	    case 0:
	        echo "i equals 0";
	        break;
	    case 1:
	        echo "i equals 1";
	        break;
	    case 2:
	        echo "i equals 2";
	        break;
	    default:
	        echo "i is not equal to 0, 1 or 2";
	endswitch;
	?>
	<?php foreach($answers as $answer):?>
		<input type="hidden" name="point[]" value="<?php echo $answer['point'] ?>" >
		<input type="<?php echo $question['type'] ?>" name="answer[]" value="<?php echo $answer['content'] ?>" > <?php echo $answer['content'] ?> <br>
	<?php endforeach;?>
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
	function loadBG(){
		document.getElementById("testbox").style.backgroundImage="url(images/00.jpg)";
	}
	window.onload=loadBG();
	$(document).ready(function(){
		$("#form00").submit(function(){
			if( !$("input[name='question']:checked").val() && $("#is_skippable").val() === 0 ){
				alert("Please choose one option");
				return false;
			}
		});
	});
</script>

