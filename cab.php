<html>
  <head>
  <link rel='shortcut icon' href='materials/icon.png' type='image/x-icon'/>
  <title>Личный кабинет</title>
  <link href="style/common.css" rel="stylesheet">
  <link href="style/reg.css" rel="stylesheet">
      <link href="style/cab.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.5.0.js"></script> <!--jquery-->
  </head>
<body>
  <?php
  include_once("header.php");
  ?>
  
  <div class='lk-block'><label id="zag" >Личный кабинет</label> <a id="ss" href="tickets.php">Мои билеты</a> <br>
        <?php
         //КАБИНЕТ
         if (!empty($_SESSION["name"])) 
            {
         include_once('db/connect.php');

         $str="SELECT * FROM user where userid=".$_SESSION["userid"]."";
         $result = mysqli_query($db_link, $str) or die(mysqli_error($db_link));;
         for ($arr = []; $row = mysqli_fetch_assoc($result); $arr[] = $row); 
        
                echo '<div id="isuser">
                <label>Фамилия</label> <input class="input famlk" type="text" value='.$_SESSION["surname"].' disabled="disabled"  required> <br>
                <label>Имя</label> <input class="input namelk" type="text" value='.$_SESSION["name"].' disabled="disabled" required> <br>
                <label>Номер телефона</label> <input class="input numlk" type="text" value="'.$arr[0]["phone"].'" required> <br>
                <p class="error_c phone-error_c" hidden>Номер телефона введён некорректно</p>
                <label>Почта</label> <input class="input emlk" type="text" value="'.$arr[0]["mail"].'" required> <br>
                <p class="error_c email-error_c" hidden>Email введён некорректно</p>
                <label>Введите пароль<br>для подтверждения изменений</label> <input class="input passlk" type="password"  required> <br>
                <p class="error_c password-error_c" hidden>Пароль неверный</p><br>
                <button class="save" onclick="savechanges()">Сохранить</button>
                <br>
                <button class="exit" onclick="exitfunc()">Выйти</button>
                </div>';
                echo '';

                include_once('db/disconnect.php');
            }
            else echo'<div id="nouser"><h1>АВТОРИЗУЙТЕСЬ</h1></div>
            <script>$(".autorise").click();</script>';
        
            
        ?>
        
        <script>
        function savechanges() {
          $('.error_c').hide();
          let ph=$('.numlk').val();
          let em=$('.emlk').val();
          let pass=$('.passlk').val();

          $.ajax({
            url: 'session/changeval.php',
            /* метод отправки данных */
                  method: 'POST',
                  /* данные, которые мы передаем в файл-обработчик */
                  data: {"email" : em,
                    "phone": ph,
                "pass": pass },
                dataType: 'json',
                success: function(jsondata){
                  eval(jsondata);
                  $('.passlk').val("");
                  },

            error: function(xhr, status, error) {
              alert(xhr.responseText + '|\n' + status + '|\n' +error);
            }
          });

        };

          function exitfunc()
          {
            let sure = confirm("Вы уверены, что хотите выйти?");
            if(sure)
            {
              window.location.href = 'reg/exit.php';   
            };
          };
        </script>
    </div>
  
  <?php

  include_once("footer.php");
  ?>
  
</body>
</html>