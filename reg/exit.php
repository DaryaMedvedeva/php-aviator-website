<?php session_start();
session_destroy();
header ('Location: ../index.php');  // перенаправление на нужную страницу
exit();    // прерываем работу скрипта, чтобы забыл о прошлом
?>
