<?php

/** Sets up the WordPress Environment. */
$absolute_path = __FILE__;
$path_to_file = explode( 'wp-content', $absolute_path );
$path_to_wp = $path_to_file[0];
require( $path_to_wp . '/wp-load.php' );


define("WEBMASTER_EMAIL", $_POST['sendto']);
if (WEBMASTER_EMAIL == '' || WEBMASTER_EMAIL == 'Testemail') {
	die('<span class="error_message">The recipient email is not correct</span>');	
} 

define("EMAIL_SUBJECT", $_POST['subject']);
if (EMAIL_SUBJECT == '' || EMAIL_SUBJECT == 'Subject') {
	define("EMAIL_SUBJECT",'Contact');	
}

$name = stripslashes($_POST['name']);
$email = trim($_POST['email']);
$message = stripslashes($_POST['message']);

$custom = $_POST['fields'];
$custom = substr($custom, 0, -1);
$custom = explode(',', $custom);

$message_addition = '';
foreach ($custom as $c) {
	if ($c !== 'name' && $c !== 'email' && $c !== 'message') {
		$message_addition .= '<b>'.$c.'</b>: '.$_POST[$c].'<br />';
	}
}

if ($message_addition !== '') {
	$message = $message.'<br /><br />'.$message_addition;
}


$message = '<html><body>'.nl2br($message)."</body></html>";
$mail = mail(WEBMASTER_EMAIL, EMAIL_SUBJECT, $message,
     "From: ".$name." <".$email.">\r\n"
    ."Reply-To: ".$email."\r\n"
    ."X-Mailer: PHP/" . phpversion()
	."MIME-Version: 1.0\r\n"
	."Content-Type: text/html; charset=utf-8");


if($mail)
{
echo '			<div class="alert alert-confirm">
					<strong>'.__("Your message has been sent. Thank You.", 'sr_pond_theme').'
				</div>
			';
}
else
{
echo '			<div class="alert alert-error">
					<strong>'.__("Your message has not been sent", 'sr_pond_theme').'
				</div>
			';
}

?>