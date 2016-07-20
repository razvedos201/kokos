<?php
require_once("db_connect.php");
if(isset($_POST['enter'])) {
    $e_login = $_POST['e_login'];
    $e_password = md5($_POST['e_password']);
    $query = "SELECT * FROM users WHERE login = '$e_login'";
    //echo $query;
    //exit();
    $result = mysqli_query($connect, $query) or die("Ошибка: " . mysqli_error($connect));
    $user_data = mysqli_fetch_array($result,MYSQLI_ASSOC);
    //var_dump($user_data);
//echo $user_data['password'];
    if ($user_data['password'] == $e_password) {
       
        session_start();
        $_SESSION['name'] = $e_login;

        $var = 'Приветствую Вас,';
        print '<script language="javascript">alert("'.$var.''.$e_login.'");window.location = "../index.php";</script>';
    } 
	else {
     
		$var = 'Пароль или логин не совпадают!!!';
        print '<script language="javascript">alert("'.$var.'");window.location = "../index.php";</script>';
	}
}
else{
    echo '
<div id="logform">
<form action="controller/login.php" method="post">
	<input type="text" name="e_login" id="e_login_id" placeholder="login" required><br>
	<input type="password" name="e_password" id="e_password_id" placeholder="password" required="required"><br>
	<input type="submit" name="enter" value="Войти">
</form></div>';
}
