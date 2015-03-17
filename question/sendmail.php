<?php
include 'config.php';
include 'database.php';

$survey = new DB();
$result = array('success' => false,'message' => '');
if(!empty($_POST['is_send_mail']))
{
	$data = array($_POST['email_sent'],$_POST['result']);
	$lastInsertId = $survey->insertResult($data);
	$url = URL . "/view_result.php?result_id=" . $lastInsertId;

	// Send mail to user
	$subject = "Your result";
	$body = "Dear user \n\n";
	$body .= "You can see your result via url below \n";
	$body .= $url . "\n";
	$body .= "Thanks so much";
	$sent = smtpmailer($_POST['email_sent'], FROM_EMAIL, FROM_NAME, $subject, $body);

	$result['success'] = $sent;
	$result['message'] = $error;
}

echo json_encode($result);
