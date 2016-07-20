<?php
$host = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'forms';

$connect = mysqli_connect($host, $db_user, $db_pass) or die("Ошибка: " . mysqli_error());
mysqli_select_db($connect,$db_name) or die("Ошибка");
mysqli_set_charset($connect,'utf8');