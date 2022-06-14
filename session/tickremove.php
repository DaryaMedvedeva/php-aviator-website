<?php
session_start();
include '../db/connect.php';

$id=$_POST['id'];
$idfl=$_POST['fl'];

 //запись в бд
 $query = "DELETE FROM ticket WHERE ticketid =  '$id' ";
 $result = mysqli_query($db_link, $query) or die("Ошибка " .
mysqli_error($db_link));

$query = "UPDATE flight SET `freecount`=`freecount`+1 WHERE `idfly`='$idfl'";
$result = mysqli_query($db_link, $query) or die("Ошибка " .
mysqli_error($db_link));

include '../db/disconnect.php';



?>