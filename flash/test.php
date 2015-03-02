<?php
	session_start();
	print_r($_SESSION);
die();
	$_SESSION['test'] = true;

require('config.php');
require_once('include/functions.php');
require_once('include/user_functions.php');
require_once('include/islogged.php');
// require_once('include/recaptchalib.php');

?>