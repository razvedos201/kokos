
<div id="messages">
	<?php 
		require_once(__DIR__."/../controller/get_content.php");
		while ($row = mysqli_fetch_assoc($final_result)) :
	?>
		<div class="comment">
			<span id="user_name"><?php echo $row["name"]?></span>
			<span id="user_date"><?= date("d.m.Y",$row["date"])?></span>
			<hr>
			<p id="user_msg"><?php echo $row["msg"]?></p>
		</div>
		   
	<?php endwhile ?>



</div>

<div id="pagination">
	<?php
		require_once('view_pagination.php');
		echo handle_pagination($rows_max, (int)$_GET['p'], $show_pages, '?p=');

	?>
</div>

<div id="form">
	<form action="controller/set_content.php" method="post">
		<table>

			<tr>
				<td><label for="name_id">Имя <strong>*</strong></label></td>
				<td><input type="text" name="name" id="name_id" value="<?= $_SESSION['name']?>"required></td>
			</tr>

			<tr>
				<td><label for="email_id">Email</label></td>
				<td><input type="email" name="email" id="email_id" required="required"></td>
			</tr>

			<tr>
				<td><label for="msg_id">Cодержание <strong>*</strong></label></td>
				<td><textarea name="msg" id="msg_id"></textarea></td>
			</tr>

			<tr>
				<td><div class="g-recaptcha" data-sitekey="6LfchCUTAAAAAJ-Z7DEg26ZtKp10PgDlUmIEB0o1" data-size="compact" data-theme="dark"></div></td>

			</tr>

			<tr>
				<td><input type="submit" value="Оставить отзыв"></td>
			</tr>
		</table>
	</form>

</div>
