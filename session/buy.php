<?php
session_start();
include '../db/connect.php';

$idfl=$_POST['flyid'];
$sit=$_POST['sit'];
$cost=$_POST['cost'];
 $uid=$_SESSION['userid'];

 //запись в бд
 $query = "INSERT INTO ticket SET idfly =  '$idfl' , sit = '$sit', fullcost = '$cost', userid = '$uid', status = 'bought'";
 $result = mysqli_query($db_link, $query) or die("Ошибка " .
mysqli_error($db_link));

$query = "UPDATE flight SET `freecount`=`freecount`-1 WHERE `idfly`='$idfl'";
$result = mysqli_query($db_link, $query) or die("Ошибка " .
mysqli_error($db_link));

include '../db/disconnect.php';



?>