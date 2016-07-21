<?php
require_once('db_connect.php');
if(isset($_GET['view'])) {
    $view = $_GET['view'];
    $query = "SELECT * FROM content WHERE view = '$view'";
    $final_result = mysqli_query($connect, $query) or die("Ошибка: " . mysqli_error($connect));
    mysqli_close($connect);

}
