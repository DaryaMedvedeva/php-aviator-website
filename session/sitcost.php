<?php

include '../db/connect.php';

$row=[];
 $sit=$_POST['sit'];
 $query = "SELECT cost FROM sit WHERE sit='$sit'";
 $result = mysqli_query($db_link, $query) or die("Ошибка " .mysqli_error($db_link));


 if($result)
 {
    array_push($row, mysqli_fetch_assoc($result)); 
}

$id=$_POST['flyid'];
$query = "SELECT routecost FROM flight WHERE idfly='$id'";
$result = mysqli_query($db_link, $query) or die("Ошибка " .mysqli_error($db_link));


if($result)
{
    array_push($row, mysqli_fetch_assoc($result)); 
}

include '../db/disconnect.php';

 echo json_encode($row);
?>