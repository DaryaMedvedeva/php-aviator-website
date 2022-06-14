<?php

$em=$_POST['email'];
$passw=$_POST['pass'];
$name=$_POST['name'];
$fam=$_POST['fam'];
 $ph=$_POST['phone'];

 $errors='';

 include '../db/connect.php';

 $query = "SELECT userid FROM user WHERE phone='$ph' ";
 $result = mysqli_query($db_link, $query) or die("Ошибка " .mysqli_error($db_link));

if($result)
 {
    $row = mysqli_fetch_assoc($result);
}



 if (1 != preg_match('/^([А-Яа-я]{1,})$/u', $fam))
    {
        $errors.='$(".fam-error2").show();';  
    }
    else if (1 != preg_match('/^([А-Яа-я]{1,})$/u', $name))
    {
        $errors.='$(".name-error2").show();';  
    }
    else if (1 != preg_match(
    '/^((([0-9A-Za-z]{1}[-0-9A-z\.]{1,}[0-9A-Za-z]{1})|([0-9А-Яа-я]{1}[-0-9А-я\.]{1,}[0-9А-Яа-я]{1}))@([-0-9A-Za-z]{1,}\.){1,2}[-A-Za-z]{2,})$/u', $em))
    {
        $errors.='$(".email-error2").show();';  
    }
    else if (1 != preg_match('/^(\+375||375||80)([0-9]{9})$/', $ph) )
    {
            $errors.='$(".phone-error2").show();';  
    }
    else if (1!=preg_match('/[a-z]/', $passw) ||  1!=preg_match('/[0-9]/', $passw) || strlen($passw)<4)
    { 
        $errors.='$(" .password-error2").show();';  
    } 
	else if (!empty($row))
	{
		$errors.='$(" .isuser2").show();';  
	}
else {
   $errors.='	
   let fam=$(".fam").val();
	let nam=$(".name").val();
	let em=$(".email").val();
	let ph=$(".phone").val();
	let pass=$(".password").val();

	$.ajax({
  url: "reg/reg.php",
  /* метод отправки данных */
		method: "POST",
		/* данные, которые мы передаем в файл-обработчик */
		data: {"fam" : fam,
			"name" : nam,
			"email" : em,
			"phone" : ph,
			"pass": pass },
		dataType: "json",
	  success: function(jsondata){

		alert(jsondata.name+", регистрация успешна!");

		 $.post("../session/newsess.php", jsondata, function (returnedData)    {
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
    });

	';    
}

 echo json_encode($errors);

 
include '../db/disconnect.php';
?>