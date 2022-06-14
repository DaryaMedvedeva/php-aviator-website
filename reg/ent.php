<?php

include '../db/connect.php';

 $em=$_POST['email'];
 $passw=$_POST['pass'];
 $query = "SELECT userid, surname, name FROM user WHERE mail='$em' AND password='$passw'";
 $result = mysqli_query($db_link, $query) or die("Ошибка " .mysqli_error($db_link));


 if($result)
 {
    $row = mysqli_fetch_assoc($result);
}

include '../db/disconnect.php';

 echo json_encode($row);
?>