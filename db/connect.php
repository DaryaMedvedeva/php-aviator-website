<?
    $host = "localhost"; // адрес сервера
    $database = "aviator"; // имя базы данных
    $user = "root"; // имя пользователя
    $password = ""; // пароль
    $db_link = mysqli_connect($host, $user, $password, $database) or die("Ошибка " . mysqli_error($db_link));
?>