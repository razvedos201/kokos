<?php
session_start();
if(!$_SESSION['name']) {
	
	$var = 'Для того, чтобы отправить сообщение войдите в систему!!!';
	print '<script language="javascript">alert("'.$var.'");window.location = "../index.php";</script>';
	exit();
}
if($_POST['captcha'] != $_SESSION['rand_code']) {
	
	$var = 'Некорректно введен код с картики!!!';
	print '<script language="javascript">alert("'.$var.'");window.location = "../index.php";</script>';
	exit();
}
 else{
	require_once('db_connect.php');
	$name = $_POST['name'];
	$msg = $_POST['msg'];
	$date = $_POST['time'];

	$query = 'INSERT INTO messages (name, msg, date) VALUES ("' . $name . '", "' . $msg . '", "' . $date . '")';
	mysqli_query($connect,$query) or die("Ошибка:" . mysqli_error());
	header("Location: ../index.php");
 } 
 

?>