<?php
include '../db/connect.php';


$flyid=$_POST['flyid'];
 $str="SELECT * FROM ticket where idfly='$flyid'";
 
 $result = mysqli_query($db_link, $str) or die(mysqli_error($db_link));;
 for ($arr = []; $row = mysqli_fetch_assoc($result); $arr[] = $row);   

include '../db/disconnect.php';

echo json_encode($arr);
 ?>
 