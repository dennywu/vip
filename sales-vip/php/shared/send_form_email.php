<?php
 class ContactReponse {
       public $emailMessage = "";
       public $subjectMessage  = "";
       public $messageMessage = "";
   }
if(isset($_POST['email'])) {
    $email_to = "bobby@vip-indonesia.com";
 
    $emailMessage = $_POST['email'];
	$subjectMessage = $_POST['subject'];
	$messageMessage = $_POST['message'];
	$email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
	$response = new ContactReponse();
	
	
	if($emailMessage == "")
	{
		$response->emailMessage = "Email must be fill";
	}
	if($subjectMessage == "")
	{
		$response->subjectMessage = "Subject must be fill";
	}
	if($messageMessage == "")
	{
		$response->messageMessage = "Message must be fill";
	}
	if(!preg_match($email_exp,$emailMessage)) {
		$response->emailMessage = 'The Email Address you entered does not appear to be valid.<br />';
	}
	
	$headers = 'From: '.$emailMessage."\r\n".
				'Reply-To: '.$emailMessage."\r\n" .
				'X-Mailer: PHP/' . phpversion();
 
	@mail($email_to, $subjectMessage, $messageMessage, $headers);
	echo json_encode($response);
}
?>