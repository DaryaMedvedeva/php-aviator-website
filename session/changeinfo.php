<?php

session_start();

include '../db/connect.php';

 $em=$_POST['email'];
 $phone=$_POST['phone'];
 $passw=$_POST['pass'];
$id=$_SESSION["userid"];

 $query = "UPDATE user SET mail='$em', phone='$phone' WHERE userid='$id' AND password='$passw'";
 $result = mysqli_query($db_link, $query) or die("Ошибка " .mysqli_error($db_link));

include '../db/disconnect.php';


?>

