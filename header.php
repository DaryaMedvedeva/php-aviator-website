

        <header>
            <a href="index.php"><log >AVIATOR</log></a>
			<div class="dropdown">
			<button onclick="showMenu()" class="dropbtn" ><p id='btlb'></p></button>
			<div id="myDropdown" class="dropdown-content">
				<a href="cab.php">Мой кабинет</a>
				<a href="tickets.php">Мои билеты</a>
				<a href="index.php">Поиск билетов</a>
				<a href="comments.php">Отзывы</a>
			</div>
			</div>
			<label for="chkbox" class="formenu"></label></div>
            <?php
			session_start();
			?>
            <script>
				function showMenu() {
					document.getElementById("myDropdown").classList.toggle("show");
				}

				window.onclick = function(event) {
				if (!event.target.matches('.dropbtn') && !event.target.matches('#btlb')) {

					var dropdowns = document.getElementsByClassName("dropdown-content");
					var i;
					for (i = 0; i < dropdowns.length; i++) {
					var openDropdown = dropdowns[i];
					if (openDropdown.classList.contains('show')) 
					{openDropdown.classList.remove('show');}

					}
				}
				}
			</script>
			<?php

    if(!empty($_SESSION["userid"]) )   $name = $_SESSION["surname"].' '.mb_substr($_SESSION["name"], 0, 1).'.';

    if (!empty($name)) {
        echo "<button class='autorise' onclick=location.href='cab.php'>".$name."</button>";
    } else {
        echo "<button class='autorise' onclick='autorising()'>АВТОРИЗОВАТЬСЯ</button>";
    }
		?>
        </header>
        <div id="reg" onclick="hidd()"> </div>


 <div class="dws-wrapper">
	<div class="dws-form">
		
		<input type="radio" id="tab-1" name="tabs" checked>
		<label class="tab" for="tab-1" title="Вкладка 1">Авторизация</label>

		<input type="radio" name="tabs" id="tab-2">
		<label class="tab" for="tab-2" title="Вкладка 2">Регистрация</label>


		<form id="form-1" class="tab-form" method="get" >
			<div class="box-input">
				<input class="input email1" type="text" placeholder="E-mail" required>
				<p class="error email-error" hidden>Email введён некорректно</p>
			</div>

			<div class="box-input">
				<input class="input password1" placeholder="Пароль" type="password" required>
				<p class="error password-error" hidden>Пароль должен содержать минимум 5 символов</p>
			</div>
			<p class="error no-user" hidden>Проверьте правильность введенных данных</p>
			<a href="#" class="button" id='ent'>Войти</a>
			<script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
<script>

	
	$('#ent').click( function() {
		$('.error').hide();
		let em=$('.email1').val();
		let pass=$('.password1').val();
		$('.error').hide();

		$.ajax({
      url: 'reg/valid.php',
      /* метод отправки данных */
            method: 'POST',
            /* данные, которые мы передаем в файл-обработчик */
            data: {"email" : em,
					"pass": pass },
            dataType: 'json',
     	 success: function(jsondata){
			eval(jsondata);
			сhanges();
    	},

			error: function(xhr, status, error) {
    		alert(xhr.responseText + '|\n' + status + '|\n' +error);
			}
    });

	
	});

</script>
		</form>

		<form id="form-2" class="tab-form">

		<div class="box-input">
				<input class="input fam" type="text" placeholder="Фамилия" required>
				<p class="error2 fam-error2 " hidden>Фамилия введенa некорректно</p>
			</div>

			<div class="box-input">
				<input class="input name" type="text" placeholder="Имя" required>
				<p class="error2 name-error2 " hidden>Имя введено некорректно</p>
			</div>

			<div class="box-input">
				<input class="input email" type="text" placeholder="E-mail" required>
				<p class="error2 email-error2 "hidden>Email введён некорректно</p>
			</div>

			<div class="box-input">
				<input class="input phone" type="text" placeholder="Номер телефона" required>
				<p class="error2 phone-error2" hidden>Номер телефона введён некорректно</p>
			</div>

			<div class="box-input">
				<input class="input password" type="password" placeholder="Пароль" required>
				<p class="error2 password-error2"hidden>Пароль должен содержать минимум 5 символов (как буквы, так и цифры)</p>
			</div>
			<p class="error2 isuser2" hidden>Пользователь с таким номером телефона был зарегистрирован ранее</p>
			<a href="#" id='regbt' class="button">Регистрация</a>
		</form>
		<script>

	
$('#regbt').click( function() {
	$('.error2').hide();
	let fam=$('.fam').val();
	let nam=$('.name').val();
	let em=$('.email').val();
	let ph=$('.phone').val();
	let pass=$('.password').val();

	$.ajax({
  url: 'reg/valid_new.php',
  /* метод отправки данных */
		method: 'POST',
		/* данные, которые мы передаем в файл-обработчик */
		data: {"fam" : fam,
			"name" : nam,
			"email" : em,
			"phone" : ph,
			"pass": pass },
		dataType: 'json',
		success: function(jsondata){
			eval(jsondata);

			
    	},

			error: function(xhr, status, error) {
    		alert(xhr.responseText + '|\n' + status + '|\n' +error);
			}
    });

	
	});
</script>

	</div>
</div>
     
        <script>
           function autorising()
		   {
			   if($('#reg').css('visibility')!='visible')
			   {
			   $('#reg').css('visibility','visible');
			   $('.dws-wrapper').css('visibility','visible');}
			   else hidd();
		   }
            
			function hidd()
			{
				$('#reg').css('visibility','hidden');
				$('.dws-wrapper').css('visibility','hidden');
			}

			function  changes() {
				$('.autorise').attr('onclick','location.href="cab.php"');

				hidd();

				if($('.nosub')) //комментарии
				{
				$('.nosub').attr('disabled', '');
				$('.nosub').attr('class', 'oksub');
				$('.exp').attr('hidden', 'hidden');
				}

				let s=String(window.location.href);
				if(s.indexOf('cab')!=-1)
				{
					window.location.href='cab.php';
				}

				if(s.indexOf('tick')!=-1)
				{
					window.location.href='tickets.php';
				}

				if($('.got')) //покупка билетов
				{
				$('.brone').attr('onclick', 'br()');
				$('.buy').attr('onclick', 'buy()');
				}

			}
        </script>
