<?php

	session_start();

?>
<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>ILUO Biznes - kontakt</title>
</head>

<body class="stopka">
	
<?php
    extract($_POST);
		$header = 'From: admin@'."ILUO_Biznes".'' . "\r\n" .
	'Reply-To: admin@'.$adres.'' . "\r\n".
	'MIME-Version: 1.0' . "\r\n".
	'Content-type: text/html; charset=UTF-8' . "\r\n";

	$nazwa=$_POST['nazwa'];
	$email=$_POST['email'];
	$temat=$_POST['temat'];
	$tresc=$_POST['tresc'];
	$wiadomosc=$nazwa ."<br>".$email."<br>".$temat."<br><br>".$tresc;

		// formuła prawidłowego adresu e-mail 
	$sprawdz = '/^[a-zA-Z0-9.\-_]+@[a-zA-Z0-9\-.]+\.[a-zA-Z]{2,14}$/';

	/*if(preg_match($sprawdz, $email))
	  echo 'Podano prawidłowy adres e-mail';
		$_SESSION['email_ok']=true;
	else
	 /* echo 'Adres e-mail nieprawidłowy';
		$_SESSION['email_ok']=false;
	echo "<p color='white'>Dziękujemy za wysłąnie wiadomości :)</p>";*/
	ini_set('sendmail_from', 'kj@softcenter.eu');
	ini_set('SMTP','localhost');
	ini_set('smtp_port',25);
	mail("kj@softcenter.eu", $temat, $wiadomosc, $header);
	
	
	header("Location: email_info.html");
?>

</body>
</html>