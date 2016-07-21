<?php
require_once("db_connect.php");
if(isset($_POST['register'])){
	$username = $_POST['username'];
	$login = $_POST['login'];
	$password = md5($_POST['password']);
	$r_password = md5($_POST['r_password']);
	$query = "SELECT * FROM users WHERE login = '$login'";
	$result = mysqli_query($connect, $query) or die("Ошибка: " . mysqli_error($connect));
	$user_data = mysqli_fetch_array($result,MYSQLI_ASSOC);

	if ($user_data['login'] == $login) {
		$var = 'Пользователь с таким логином уже существует';
		print '<script language="javascript">alert("' . $var . '");window.location = "../index.php?view=register";</script>';
		exit();
	}

	if ($_POST['password'] == $login) {
		$var = 'Логин и пароль не должны совпадать';
		print '<script language="javascript">alert("' . $var . '");window.location = "../index.php?view=register";</script>';
		exit();
	}
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
mysqli_close($connect);
?>
<div id="loginform">
	<form action="controller/register.php" method="post">
		<table>
			<tr>
				<td><label for="username_id">Имя <strong>*</strong></label></td>
				<td><input type="text" name="username" id="username_id" required></td>
			</tr>

			<tr>
				<td><label for="login_id">Логин <strong>*</strong></label></td>
				<td><input type="text" name="login" id="login_id" required></td>
			</tr>

			<tr>
				<td><label for="password_id">Пароль <strong>*</strong></label></td>
				<td><input type="password" name="password" id="password_id" required="required"></td>
			</tr>

			<tr>
				<td><label for="r_password_id">Повторите пароль <strong>*</strong></label></td>
				<td><input type="password" name="r_password" id="r_password_id" required="required"></td>
			</tr>


			<tr>
			<td><input type="submit" name="register" value="Зарегистрироваться"></td>
			</tr>
		</table>
	</form>
</div><!--end form for login-->







