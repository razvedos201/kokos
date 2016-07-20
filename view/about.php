
<div id="messages">
	<?php 
		require_once(__DIR__."/../controller/get_content.php");
		
		$id = 1;
		while ($row = mysqli_fetch_array($final_result, MYSQL_ASSOC)) {
			
			if($id == 1)
				$id=0;
			else
				$id=1;
	?>
		<div class="comment<?php echo $id?>">
			<span id="user_name"><?php echo $row["name"]?></span>
			<span id="user_date"><?php echo str_replace(":",".",date("d:m:Y",$row["date"]))?></span>
			<hr>
			<p id="user_msg"><?php echo $row["msg"]?></p>
		</div>
		   
	<?php
		
		}
	?>



</div>

<div id="pagination">
	<?php
		require_once('view_pagination.php');
		echo handle_pagination(100, (int)$_GET['p'], 10, '?p=');

	?>
</div>

<?php require_once('form.php');?>
