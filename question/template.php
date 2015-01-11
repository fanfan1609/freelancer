<?php
function showCheckBox($answers)
{
	foreach($answers as $answer )
	{
		echo "<input type='checkbox' name='answer[]' data-point='".$answer['point']."' value='".$answer['content']."' >";
	}
}

function showRadio($answers)
{
	foreach($answers as $answer )
	{
		sprintf("<input type='radio' name='answer[]' data-point='%s' value='%s' >",$answer['point'],$answer['content']);
		//echo "<input type='radio' name='answer[]' data-point='".$answer['point']."' value='".$answer['content']."' >";
	}
}

function showSelect($answers)
{
	echo "<select name='answer' >";
	foreach($answers as $answer )
	{
		echo "<option data-point='".$answer['point']."' value='".$answer['content']."' >";
	}
	echo "</select>";
}