<?php

$em=$_POST['email'];
$passw=$_POST['pass'];

include '../db/connect.php';

 $query = "SELECT userid, surname, name FROM user WHERE mail='$em' AND password='$passw'";
 $result = mysqli_query($db_link, $query) or die("Ошибка " .mysqli_error($db_link));

if($result)
 {
    $row = mysqli_fetch_assoc($result);
}

 $errors='';
 if (1 != preg_match(
    '/^((([0-9A-Za-z]{1}[-0-9A-z\.]{1,}[0-9A-Za-z]{1})|([0-9А-Яа-я]{1}[-0-9А-я\.]{1,}[0-9А-Яа-я]{1}))@([-0-9A-Za-z]{1,}\.){1,2}[-A-Za-z]{2,})$/u', $em))
    {
        $errors.='$(".email-error").show();';  
    }
    else if (1!=preg_match('/[a-z]/', $passw) ||  1!=preg_match('/[0-9]/', $passw) || strlen($passw)<4)
    { 
        $errors.='$(" .password-error").show();';  
    } 
    else if(!$row && $errors=="")
    {
        $errors.='$(" .no-user").show();';  
    }
else {
   $errors.='	
   let em=$(".email1").val();
		let pass=$(".password1").val();
        	$.ajax({
    url: "reg/ent.php",
    /* метод отправки данных */
          method: "POST",
          /* данные, которые мы передаем в файл-обработчик */
          data: {"email" : em,
                  "pass": pass },
          dataType: "json",
        success: function(jsondata){
       $.post("session/newsess.php", jsondata, function (returnedData)    {
      console.log(returnedData);  //запись в сесиию
      if(returnedData)
      {
      $(".autorise").html(returnedData);
          changes();
      }

      });
      },

          error: function(xhr, status, error) {
          alert(xhr.responseText + "|\n" + status + "|\n" +error);
          }
  });';    
}


include '../db/disconnect.php';
 echo json_encode($errors);
?>