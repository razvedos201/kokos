<?php
require_once(__DIR__."/../controller/static_content.php");
while ($row = mysqli_fetch_array($final_result, MYSQLI_ASSOC)){
	$title = $row["title"];
	$description = $row["description"];
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?= $title ?></title>
	<style>
		p {
			color: #fff;
		}
	</style>
</head>
<body>
<p><?= $description ?></p>
</body>
</html>