<?php

session_start();
include_once("../db/connect.php");

if ( isset($_POST['text']) && $_POST['text'] && strlen($_POST['text'])>4) {
  
    $sql = 'SELECT name FROM comment';
    $result = mysqli_query($db_link, $sql) or die(mysqli_error($db_link));;
    for ($arr = []; $row = mysqli_fetch_assoc($result); $arr[] = $row);   
    $id=$_SESSION['userid'];
    $name=$_SESSION['name'].' '.$_SESSION['surname'];

    $today="".getdate()['year']."-".getdate()['mon']."-".getdate()['mday'];

    $q="INSERT INTO comment (userid, name, publicdate, text) VALUES ( ".$id.", '".$name."', '".$today."' ,'".$_POST['text']."')";
    var_dump($q);
    $result = mysqli_query($db_link, $q) or die(mysqli_error($db_link));;

} 
else var_dump('error');

    include_once("../db/disconnect.php");
    header ('Location: ../comments.php');  // перенаправление на нужную страницу
    exit();    // прерываем работу скрипта
    

?>