<?php

$em=$_POST['email'];
$passw=$_POST['pass'];
 $ph=$_POST['phone'];

 include '../db/connect.php';

 session_start();
 $query = "SELECT password from user WHERE userid='".$_SESSION["userid"]."'";
 $result = mysqli_query($db_link, $query) or die("Ошибка " .mysqli_error($db_link));

 if($result)
 {
    $row = mysqli_fetch_assoc($result);
}


 $errors='';
 if (1 != preg_match(
    '/^((([0-9A-Za-z]{1}[-0-9A-z\.]{1,}[0-9A-Za-z]{1})|([0-9А-Яа-я]{1}[-0-9А-я\.]{1,}[0-9А-Яа-я]{1}))@([-0-9A-Za-z]{1,}\.){1,2}[-A-Za-z]{2,})$/u', $em))
    {
        $errors.='$(".email-error_c").show();';  
    }
    else if (1 != preg_match('/^(\+375||375||80)([0-9]{9})$/', $ph) )
    {
            $errors.='$(".phone-error_c").show();';  
    }
    else if ($row["password"]!=$passw)
    { 
        $errors.='$(" .password-error_c").show();';  
    } 
    else {
   $errors.='	let ph=$(".numlk").val();
   let em=$(".emlk").val();
   let pass=$(".passlk").val();

   $.ajax({
     url: "session/changeinfo.php",
     /* метод отправки данных */
           method: "POST",
           /* данные, которые мы передаем в файл-обработчик */
           data: {"email" : em,
             "phone": ph,
         "pass": pass },
     success: function(){
      alert("Изменения сохранены!");
   },

     error: function(xhr, status, error) {
       alert(xhr.responseText + "|\n" + status + "|\n" +error);
     }
   });

	';    
}

 echo json_encode($errors);
?>