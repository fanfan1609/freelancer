<?php
ob_start();
include 'header.php';
include 'database.php';
if($_GET['result_id'] && is_numeric($_GET['result_id']))
{
	$survey = new DB();
	$result = $survey->getResult($_GET['result_id']);
	findSerializeError($result['content']);exit;
	$fixed_serialized_data = preg_replace_callback ( '!s:(\d+):"(.*?)";!',
	    function($match) {
	        return ($match[1] == strlen($match[2])) ? $match[0] : 's:' . strlen($match[2]) . ':"' . $match[2] . '";';
	    },
	$result['content'] );

	var_dump(base64_encode(serialize($fixed_serialized_data)));exit;

	$_SESSION['result'] = unserialize(base64_decode($result['content']));
	// var_dump($_SESSION['result']);exit;
	header("Location: show_result.php");
}

function findSerializeError($data1) {
    echo "<pre>";
    $data2 = preg_replace ( '!s:(\d+):"(.*?)";!e', "'s:'.strlen('$2').':\"$2\";'",$data1 );
    $max = (strlen ( $data1 ) > strlen ( $data2 )) ? strlen ( $data1 ) : strlen ( $data2 );

    echo $data1 . PHP_EOL;
    echo $data2 . PHP_EOL;

    for($i = 0; $i < $max; $i ++) {

        if (@$data1 {$i} !== @$data2 {$i}) {

            echo "Diffrence ", @$data1 {$i}, " != ", @$data2 {$i}, PHP_EOL;
            echo "\t-> ORD number ", ord ( @$data1 {$i} ), " != ", ord ( @$data2 {$i} ), PHP_EOL;
            echo "\t-> Line Number = $i" . PHP_EOL;

            $start = ($i - 20);
            $start = ($start < 0) ? 0 : $start;
            $length = 40;

            $point = $max - $i;
            if ($point < 20) {
                $rlength = 1;
                $rpoint = - $point;
            } else {
                $rpoint = $length - 20;
                $rlength = 1;
            }

            echo "\t-> Section Data1  = ", substr_replace ( substr ( $data1, $start, $length ), "<b style=\"color:green\">{$data1 {$i}}</b>", $rpoint, $rlength ), PHP_EOL;
            echo "\t-> Section Data2  = ", substr_replace ( substr ( $data2, $start, $length ), "<b style=\"color:red\">{$data2 {$i}}</b>", $rpoint, $rlength ), PHP_EOL;
        }

    }

}