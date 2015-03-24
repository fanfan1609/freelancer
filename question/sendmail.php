<?php
include 'config.php';
include 'database.php';

$survey = new DB();
$result = array('success' => false,'message' => '');
if(!empty($_POST['is_send_mail']))
{
	$data = array($_POST['email_sent'],$_POST['result']);
	$email_exist = $survey->countResultByEmail($_POST['email_sent']);
	if($email_exist == 0)
	{
		$lastInsertId = $survey->insertResult($data);
		if( $lastInsertId ){
			$url = URL . "/view_result.php?result_id=" . $lastInsertId;	
			$result['success'] = true;
			$result['message'] = "Save result success";
			$result['url']	   = $url;
		} else {
			$result['message'] = 'Saving error';
		}
	} else {
		$result['message'] = 'Email has existed';
	}
	
	// Send mail to user
	// $subject = "Your result";
	// $body = "Dear user \n\n";
	// $body .= "You can see your result via url below \n";
	// $body .= $url . "\n";
	// $body .= "Thanks so much";
	// $sent = smtpmailer($_POST['email_sent'], FROM_EMAIL, FROM_NAME, $subject, $body);
}

echo json_encode($result);
