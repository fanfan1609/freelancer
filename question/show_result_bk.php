<?php
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
//include "$root/survey/test/header.php";
include "header.php";
$total_point = 0;
if( !empty( $_SESSION['result']) )
{
	foreach($_SESSION['result'] as $r){
		$total_point += $r['point'];
	}
}

// Now we have total point, then we can display view depend on point.
// Implement later when you send me template file or something.

?>
<style>
#resultbox{
    padding : 10px 5px;
}

.question {
	font-weight: bold;
    line-height: 19px;
    padding-left: 10px;
}

.answer {
	background-color: #f9f9f9;
    border: 1px solid #f0f0f0;
    margin-bottom: 20px;
    padding: 10px;
}

</style>
<div id="resultbox">
    <h1>Your result</h1>
    <?php foreach($_SESSION['result'] as $result):?>
    	<div class="result">
	    	<div class="question"><img src='images/question.gif'><?php echo $result['question'] ?></div>
	    	<div class="answer"><img src='images/answer.gif'><?php echo $result['answer'] ?></div>
    	</div>

    <?php endforeach?>
    <span>Total point: <strong> <?php echo $total_point?></strong> </span>
</div>

<?php
// Should not include this on the FIRST iframe in order to not tell Otto and Google Analytics that this page is visited twice!
// include "$root/survey/test/footer.php";
include "footer.php";
?>
