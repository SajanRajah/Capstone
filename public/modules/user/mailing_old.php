<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
//use PHPMailer\PHPMailer\PHPMailer;
//use PHPMailer\PHPMailer\Exception;
session_start();
//require_once '../../includes/autoload.php';
use classes\business\UserManager;
use classes\entity\User;

include '../../includes/security.php';
include '../../includes/header.php';

//Load Composer's autoloader
require 'vendor/autoload.php';


function sendmail(){
	$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
	
		//Server settings
		$mail->SMTPDebug = 2;                                 // Enable verbose debug output
		$mail->isSMTP();                                      // Set mailer to use SMTP
		$mail->Host = 'smtp.gmail.com';  						// Specify main and backup SMTP servers
		$mail->SMTPAuth = true;                               // Enable SMTP authentication
		$mail->Username = 'acwdcapstone@gmail.com';                 // SMTP username
		$mail->Password = 'capstone13579';                           // SMTP password
		$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
		$mail->Port = 587;                                    // TCP port to connect to
		//$addr = explode(',',$user,-1);
		
		//Recipients
		$mail->setFrom('acwdcapstone@gmail.com', 'M6_test_SR');
		$mail->addAddress("sajanrajah@gmail.com", "jctw.sr@gmail.com");     // Add a recipient
		
		/* Message body */
			$mail->message = 'ABC';

			/* Plain text alternative */
			$mail->AltBody = 'There is a great disturbance in the Force.';
		
		/* Send the message */
			if (!$mail->send())
			{
				echo "Error: " . $mail->ErrorInfo;
			}
			else
			{
				echo "Message sent.";
			}
		

		// codes from hereafter to ( if ($_SERVER['REQUEST_METHOD']) are in new 2
	

}
   
   sendmail();
	
	

?>

<!DOCTYPE html>
<html>
	<head>
	<link rel="stylesheet" href="..\..\bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="..\..\ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="..\..\bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<title>Sending a Newsletter</title>
	</head>
	<body>
		<h1>Send a Newsletter</h1>
		<form method="POST" action="">
        	
			<!--<p><label for="email">Email:</label><br/>
			<input type="text" name="email">
			   </p>-->
			
			
        	<p><label for="subject">Subject:</label><br/>
        	<input type="text" id="subject" name="subject" size="50" /></p>
        	
        	<p><label for="message">Message Body:</label>
        	<textarea rows="5" cols="50" maxlength="256" name="message"></textarea>
			
        	<button type="submit" name="submit" value="submit">Submit</button>
        	</form>
	</body>
</html>
