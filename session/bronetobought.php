<?php
session_start();
include '../db/connect.php';

$id=$_POST['id'];

 $query = "UPDATE ticket SET status='bought' WHERE ticketid='$id' ";
 $result = mysqli_query($db_link, $query) or die("Ошибка " .
mysqli_error($db_link));


include '../db/disconnect.php';



?>