<?php
ob_start();
include 'header.php';
include 'database.php';
if($_GET['result_id'] && is_numeric($_GET['result_id']))
{
	$survey = new DB();
	$result = $survey->getResult($_GET['result_id']);


	$_SESSION['result'] = unserialize($result['content']);

	// var_dump($_SESSION['result']);exit;
	header("Location: show_result.php");
}