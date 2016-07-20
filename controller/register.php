<?php
require_once("db_connect.php");
if(isset($_POST['register'])){
	$username = $_POST['username'];
	$login = $_POST['login'];
	$password = md5($_POST['password']);
	$r_password = md5($_POST['r_password']);

	if($password == $r_password){

		$query = "INSERT INTO users VALUES('','$username','$login','$password')";
		$result = mysqli_query($connect,$query) or die("Ошибка: " . mysqli_error($connect));
		$var = 'Вы успешно зарегестрировались';
		print '<script language="javascript">alert("'.$var.'");window.location = "../index.php";</script>';
	}
	else{
		die("Пароли не совпадают");
	}
}

?>
<div id="loginform">
<form action="controller/register.php" method="post">
	<p><div>
		<label for="username_id">Имя <strong>*</strong></label>
		<input type="text" name="username" id="username_id" required>
	</div></p>
	
	<p><div>
		<label for="login_id">Логин <strong>*</strong></label>
		<input type="text" name="login" id="login_id" required>
	</div></p>
	
	<p><div>
		<label for="password_id">Пароль <strong>*</strong></label>
		<input type="password" name="password" id="password_id" required="required">
	</div></p>
	
	<p><div>
		<label for="r_password_id">Повторите пароль <strong>*</strong></label>
		<input type="password" name="r_password" id="r_password_id" required="required">
	</div></p>
		
		
	<p><div>
	<input type="submit" name="register" value="Зарегистрироваться">
	</div></p>				
</form>

</div>







