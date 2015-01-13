<?php
/**
 * Display answers as checkbox
 * @param  mixed $answers Answer list
 * @return void
 */
function showCheckBox($answers)
{
	foreach($answers as $answer )
	{
		echo "<input type='checkbox' class='answer' name='answer[]' data-point='".$answer['point']."' value='".$answer['content']."' >".$answer['content']."<br>";
	}
	echo "<input type='hidden' name='answer' value=''>";
}


/**
 * Display answers as radio
 * @param  mixed $answers Answer list
 * @return void
 */
function showRadio($answers)
{
	foreach($answers as $answer )
	{
		//sprintf("<input type='radio' name='answer[]' data-point='%s' value='%s' >",$answer['point'],$answer['content']);
		echo "<input type='radio' class='answer' name='answer' data-point='".$answer['point']."' value='".$answer['content']."' >".$answer['content']." <br>";
	}
}

/**
 * Display answers as select
 * @param  mixed $answers Answer list
 * @return void
 */
function showSelect($answers)
{
	echo "<select name='answer' class='answer' >";
	foreach($answers as $answer )
	{
		echo "<option data-point='".$answer['point']."' value='".$answer['content']."' >".$answer['content']."</option>";
	}
	echo "</select>";
}

/**
 * Display answers as select
 * @param  mixed $answers Answer list
 * @return void
 */
function showText($answers)
{
	foreach($answers as $answer)
	{
		$output = str_replace("blank_text", "<input type='text' class='answer' name='answer' value=''>", $answer['content']);
		echo $output;
	}
}