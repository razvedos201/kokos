<div id="form">
<form action="controller/set_content.php" method="post">
	<p><div class="field">
		<input type="hidden" name="time" value="<?php echo time();?>">
		<label for="name_id">Имя <strong>*</strong></label>
		<input type="text" name="name" id="name_id" required>
	</div></p>
	
	<p><div class="field">
		<label for="email_id">Email</label>
		<input type="email" name="email" id="email_id" required="required">
		</div></p>
		
	<p><div class="field">		
		<label for="msg_id">Cодержание <strong>*</strong></label>
		<textarea name="msg" id="msg_id"></textarea>
	</div></p>
	
	<p><div class="field">
		<label for="captcha_id">Подтверждение изображения <strong>*</strong></label>

		
	</div></p>
	
	<p><div class="field">
	<input type="submit" value="Оставить отзыв">
	</div></p>				
</form>

</div>