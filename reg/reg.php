<?php

include '../db/connect.php';

$name=$_POST['name'];
$fam=$_POST['fam'];
 $em=$_POST['email'];
 $ph=$_POST['phone'];
 $passw=$_POST['pass'];

 //запись в бд
 $query = "INSERT INTO user SET surname =  '$fam' , name = '$name', mail = '$em', phone = '$ph', password = '$passw'";
 $result = mysqli_query($db_link, $query) or die("Ошибка " .
mysqli_error($db_link));


include '../db/disconnect.php';

include 'ent.php';

?>