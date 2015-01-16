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
		if (strpos('blank_text', $answer['content']) != -1 )
		{
			echo "<input type='radio' class='answer' name='answer' data-point='".$answer['point']."' value='".$answer['content']."' >".
				str_replace('blank_text', "<input name='answer_value' type='text' >", $answer['content'] )." <br>";
		} else 
		{
			echo "<input type='radio' class='answer' name='answer' data-point='".$answer['point']."' value='".$answer['content']."' >".$answer['content']." <br>";
		}
		

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

/**
 * Define specific template for question 17
 * @return [type] [description]
 */
function question17()
{
	echo "<input type='text' name='answer' class='answer' id='answer'><br>" ;
	echo "<label><input type='checkbox' id='calculate'>…or calculate it with:</label>";
	echo "<ul id='calculate-items'>";
	echo "<li>How many worked with Marketing & Sales last year? [<input type='number' class='calculate' id='sales' name='sales'>]e.g 10</li>";
	echo "<li>Their average salary per month? [<input type='number' id='salary' class='calculate' name='salary'>] eg. 3000 </li>";
	echo "<li>How much percentage of their time did they spend on NEW clients vs old ones (or other tasks) on average?  [<input type='number' class='calculate' name='percent' id='percent'>] eg. 75</li>";
	echo "<li>How much money was spent on marketing to NEW clients last year? [<input type='number' class='calculate' id='spent' name='spent'>] e.g. 25 000 </li>";
	echo "</ul>";
}