<?php

/* GÖNDEREN OUTLOOK MAİL */

$email = 'metenetadim@hotmail.com';
$sifre = 'C:8E72z*Hm/kx/2';




/*
Name: 			Contact Form
Written by: 	Okler Themes - (http://www.okler.net)
Theme Version:	5.6.0
*/

//session_cache_limiter('nocache');
header('Expires: ' . gmdate('r', 0));

//header('Content-type: application/json');

require_once('php-mailer/class.phpmailer.php');
require_once('php-mailer/class.smtp.php');
// Step 1 - Enter your email address below.

// If the e-mail is not working, change the debug option to 2 | $debug = 2;
$debug = 0;
$mail = new PHPMailer(true);

try {
	$mail->SMTPOptions = array(
		'ssl' => array(
		    'verify_peer' => false,
		    'verify_peer_name' => false,
		    'allow_self_signed' => true
		)
	);

	$mail->SMTPDebug = $debug;                                 // Debug Mode

	// Step 2 (Optional) - If you don't receive the email, try to configure the parameters below:

	$mail->IsSMTP();                                         // Set mailer to use SMTP
	$mail->Host = 'SMTP.office365.com';				       // Specify main and backup server
	$mail->SMTPAuth = true;                                  // Enable SMTP authentication
	$mail->Username = $email;                    // SMTP username
	$mail->Password = $sifre;                              // SMTP password
	$mail->SMTPSecure = 'tls';                               // Enable encryption, 'ssl' also accepted
	$mail->Port = 587;   								       // TCP port to connect to

	$mail->AddAddress($alici);	 						       // Add another recipient

	//$mail->AddAddress('person2@domain.com', 'Person 2');     // Add a secondary recipient
	//$mail->AddCC('person3@domain.com', 'Person 3');          // Add a "Cc" address. 
	//$mail->AddBCC('person4@domain.com', 'Person 4');         // Add a "Bcc" address. 

	$mail->SetFrom($email, $pName);
	$mail->AddReplyTo($rplyEmail, $pName);
	if(!empty($rplyFile)){
		$mail->addAttachment($rplyFile,'application/octet-stream');
	}


	$mail->IsHTML(true);                                  // Set email format to HTML

	$mail->CharSet = 'UTF-8';

	$mail->Subject = $subject;
	$mail->Body    = $message;
	$mail->Send();
	$arrResult = array ('response'=>'success');
	$mailSonuc=1;

	/*/
	if(!empty($_SERVER['HTTP_REFERER'])){
		header('location: '.str_replace(array('mail_gonderimi=basarili','mail_gonderimi=basarisiz'),'',$_SERVER['HTTP_REFERER']).(strpos($_SERVER['HTTP_REFERER'],'?')?'&':'?').'mail_gonderimi=basarili'); die;
	}
	/*/

} catch (phpmailerException $e) {
	$arrResult = array ('response'=>'error','errorMessage'=>$e->errorMessage());
	$mailSonuc=0;
} catch (Exception $e) {
	$mailSonuc=0;
	$arrResult = array ('response'=>'error','errorMessage'=>$e->getMessage());
}

if ($debug == 0) {
	$snc= json_encode($arrResult);
}

if(empty($mailSonuc))print_r($arrResult);
/*/
// başarısız geri dön
if(!empty($_SERVER['HTTP_REFERER'])){
	header('location: '.str_replace(array('mail_gonderimi=basarili','mail_gonderimi=basarisiz'),'',$_SERVER['HTTP_REFERER']).(strpos($_SERVER['HTTP_REFERER'],'?')?'&':'?').'mail_gonderimi=basarisiz'); die;
}
/*/

