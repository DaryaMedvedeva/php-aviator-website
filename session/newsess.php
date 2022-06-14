<?php

session_start();
if (isset($_POST['userid'])) {
    $_SESSION['userid'] = $_POST['userid'];
    $_SESSION['name'] = $_POST['name'];
    $_SESSION['surname'] = $_POST['surname'];
    
    $name = $_SESSION["surname"].' '.mb_substr($_SESSION["name"], 0, 1).'.';

    echo $name;
}

?>