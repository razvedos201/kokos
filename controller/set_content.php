<?php
session_start();
require_once('captcha.php');
$url = "https://www.google.com/recaptcha/api/siteverify";
$data = array(
	'secret' => '6LfchCUTAAAAAFvGs01f5jX2iZRpkWf7sNPPFxhj',
	'response' => $_POST['g-recaptcha-response'],
	'remoteip' => $_SERVER['REMOTE_ADDR']
);

$success = getCurlData($url, $data);


if(!$_SESSION['name']) {
	
	$var = 'Для того, чтобы отправить сообщение войдите в систему!!!';
	print '<script language="javascript">alert("'.$var.'");window.location = "../index.php";</script>';
	exit();
}

if($success['success'] == false) {
	$var = 'Некорректно введен код с картики!!!';
	print '<script language="javascript">alert("'.$var.'");window.location = "../index.php";</script>';
	exit();
}
 else{
	require_once('db_connect.php');
	$name = $_POST['name'];
	$msg = $_POST['msg'];
	$date = time();

	$query = 'INSERT INTO messages (name, msg, date) VALUES ("' . $name . '", "' . $msg . '", "' . $date . '")';
	mysqli_query($connect,$query) or die("Ошибка:" . mysqli_error());
	 mysqli_close($connect);
	header("Location: ../index.php");
 }

