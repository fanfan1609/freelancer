<?php
/**
 * Display answers as checkbox
 * @param  mixed $answers Answer list
 * @param  boolean $is_back TRUE/FALSE
 * @param  string $back_answer Old Answer
 * @return void
 */
function showCheckBox($answers,$is_back,$back_answer)
{
	$arr = array();
	if( $is_back )
	{
		$arr = explode(",", $back_answer);
	}
	
	foreach($answers as $answer )
	{
		$checked = in_array($answer['content'],$arr) ? 'checked' : '';
		echo "<input type='checkbox' class='answer' name='answer[]' data-id='".$answer['id']."' data-point='".$answer['point']."' value='".$answer['content']."' ".$checked." >".$answer['content']."<br>";
	}
	echo "<input type='hidden' name='answer' value=''>";
}


/**
 * Display answers as radio
 * @param  mixed $answers Answer list
 * @param  boolean $is_back TRUE/FALSE
 * @param  string $back_answer Old Answer
 * @return void
 */
function showRadio($answers,$is_back,$back_answer)
{
	foreach($answers as $answer )
	{
		//sprintf("<input type='radio' name='answer[]' data-point='%s' value='%s' >",$answer['point'],$answer['content']);
		$pos = strpos($answer['content'],'blank_text');
		
		if ( $pos !== false )
		{
			$text_answer = '';
			if($is_back)
			{
				$text_answer = substr($back_answer, $pos);
			}

			$value = $text_answer;

			if( $answer['question_id'] == 12 )
			{
				$pos1 = strpos($text_answer,' to do it.');
				$text_answer = substr($text_answer,0,$pos1);
			}
			
			// var_dump()
			$checked = (str_replace('blank_text', $text_answer, trim($answer['content']) ) == trim($back_answer)) ? 'checked' : '';
			if($checked)
			{
				$html = "<input name='answer_value' type='text' value='".$text_answer."'>";	
			} else {
				$html = "<input name='answer_value' type='text' value=''>";	
			}
			echo "<input type='radio' class='answer' name='answer' data-point='".$answer['point']."' value='".$answer['content']."' ".$checked." >".
				str_replace('blank_text', $html, $answer['content'] )." <br>";
		} else 
		{
			$checked = ($answer['content'] == $back_answer) ? 'checked' : '';
			echo "<input type='radio' class='answer' name='answer' data-point='".$answer['point']."' value='".$answer['content']."' ".$checked." >".$answer['content']." <br>";
		}
	}
}

/**
 * Display answers as select
 * @param  mixed $answers Answer list
 * @param  boolean $is_back TRUE/FALSE
 * @param  string $back_answer Old Answer
 * @return void
 */
function showSelect($answers,$is_back,$back_answer)
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
 * @param  boolean $is_back TRUE/FALSE
 * @param  string $back_answer Old Answer
 * @return void
 */
function showText($answers,$is_back,$back_answer)
{
	foreach($answers as $answer)
	{
		$html = "<input type='text' class='answer' name='answer' value=''>";
		if($is_back)
		{
			$html = "<input type='text' class='answer' name='answer' value='".$back_answer."'>";
		}
		$output = str_replace("blank_text", $html, $answer['content']);
		echo $output;
	}
}

/**
 * Define specific template for question 17
 * @return [type] [description]
 */
function question17()
{
	echo "<input type='text' name='answer' class='answer' id='answer'> e.g. 5000<br>" ;
	echo "<label style='font-size:0.75em;'><input type='checkbox' id='calculate'>Click here if you prefer to calculate your cost</label>";
	echo "<ul id='calculate-items' style='font-size:0.75em;'>";
	echo "<li>How many worked with Marketing & Sales last year? <input type='number' class='calculate' id='sales' name='sales'>e.g 10</li>";
	echo "<li>Average salary/month? <input type='number' id='salary' class='calculate' name='salary'> eg. 3000 </li>";
	echo "<li>How much time did they spend on NEW clients vs old or other tasks on average?  <input type='number' class='calculate' name='percent' id='percent'> eg. 75 (in %)</li>";
	echo "<li>How much money was spent on marketing to NEW clients last year? <input type='number' class='calculate' id='spent' name='spent'> e.g. 25 000 </li>";
	echo "</ul>";
}