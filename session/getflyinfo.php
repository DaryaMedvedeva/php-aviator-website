<?php

include '../db/connect.php';

 $flyid=$_POST['flyid'];
 $query = "SELECT * FROM flight WHERE idfly='$flyid'";
 $result = mysqli_query($db_link, $query) or die("Ошибка " .mysqli_error($db_link));


 if($result)
 {
    $row = mysqli_fetch_assoc($result);
}

include '../db/disconnect.php';

 echo json_encode($row);
?>