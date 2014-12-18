<?php
$FTGname = "Stewart";
$FTGemail = "stewart.duffey@jupiterdesign.co.uk";
$FTGmobile = "00000000000";
$FTGaddress = "Ruddington Manor";
$FTGcomments = "Test From Mezzino Server 11";
$FTGhear = "Friend";

//$emailTo = '"Mezzino" <laura.zucchetti@jupiterdesign.co.uk>,"Mezzino" <stewart.duffey@jupiterdesign.co.uk>';
//$emailTo = '"Mezzino" <stewart.duffey@jupiterdesign.co.uk>, "Mezzino" <duffey_s@hotmail.com>';
$emailTo = 'laurazucchetti@hotmail.com,duffey_s@hotmail.com';//"Mezzino" <laurazucchetti@hotmail.com>,"NotMezzino" <duffey_s@hotmail.com>

$recipients = array('laurazucchetti@hotmail.com', 'duffey_s@hotmail.com');

$emailSubject = "Asha House Contact Form Feedback";
$emailSubject = preg_replace('/[\x00-\x1F]/', '', $emailSubject);

$emailFrom = "$FTGemail";
$emailFrom = preg_replace('/[\x00-\x1F]/', '', $emailFrom);

$emailBody = "Name: $FTGname\n"
 . "Email: $FTGemail\n"
 . "Mobile: $FTGmobile\n"
 . "Address: $FTGaddress\n"
 . "Comments: $FTGcomments\n"
 . "Where did you hear about us: $FTGhear\n"
 . "\n"
 . "";

$emailHeader = "From: $emailFrom\n"
 . "Reply-To: $emailFrom\n"
 . "MIME-Version: 1.0\n"
 . "Content-type: text/plain; charset=\"ISO-8859-1\"\n"
 . "Content-transfer-encoding: quoted-printable\n";
 

foreach ($recipients as $recipient)
{
	if (mail($recipient, $emailSubject, $emailBody, $emailHeader)) {
		echo "OK";
	}
	else {
		echo "Error";
	}
}
?>