<?php


require_once('db_connect.php');


// $query = 'SELECT name, msg, date FROM messages ORDER BY `date` DESC limit 3,3';
$query =  "select * from messages ORDER BY id DESC";
$result = mysqli_query($connect,$query) or die("Ошибка: " . mysqli_error());
$rows_max = mysqli_num_rows($result);
$show_pages = 4;
$this_page = filter_var($_GET['p'], FILTER_SANITIZE_NUMBER_INT);
if ($this_page)
{
        $offset = (($show_pages * $this_page) - $show_pages);
}
else
{
        $this_page = 1; // Ставим в единицу (первая страница) если не передан параметр $_GET['page']
        $offset = 0;
}


$query_limited = "SELECT name, msg, date FROM messages ORDER BY `date` DESC limit $offset,$show_pages";
$final_result = mysqli_query($connect,$query_limited) or die("Ошибка: " . mysqli_error());

