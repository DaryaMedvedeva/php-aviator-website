<html>
    <head>
        <link rel='shortcut icon' href='materials/icon.png' type='image/x-icon'/>
        <title>AVIATOR - онлайн-касса авиабилетов</title>
        <link href="style/common.css" rel="stylesheet">
        <link href="style/reg.css" rel="stylesheet">
		<link href="style/main.css" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.5.0.js"></script> <!--jquery-->
      
    </head>
    <body>
      <?php

    include_once("header.php");

    ?>
	 <div class='search-block'><label id="zag" >ПОИСК БИЛЕТОВ</label> <br>
		<form action="search.php" method="POST" class='ser'>
    
  <script src="https://code.jquery.com/jquery-3.5.0.js"></script> <!--jquery-->

		        <div>
              <input type="text" placeholder="Откуда" id="from" name="from" />
            </div>
            <div >
             <input type="text" placeholder="Куда" id="to" name="to" />
            </div>
            <div>
              <label for="date">Когда</label>
              <input type="date" placeholder="Когда" id="date" name="date" />
            </div>

            <script>
              let date = new Date();
              let min = String( date.getFullYear()+ '-' + String(date.getMonth() + 1).padStart(2, '0') + '-' + date.getDate()).padStart(2, '0');
              $('#date').attr('min',min);
              let max = String( String(date.getFullYear()+1) + '-' + String(date.getMonth() + 1).padStart(2, '0') + '-' + date.getDate()).padStart(2, '0');
              $('#date').attr('max',max);
              </script>

            <div >
              <div class="forsubmit">
              <input type="submit" value="Найти" id='subbt'>
              </div>
            </div>
		</form>
	</div>
   <div class='popular-block'>
     <div class='text'>
   <label id="popzag">Популярные</br>маршруты</label></br></br>
	   <a href="#" onclick='MM()' >Минск-Москва</a></br>
     <a href="#" onclick='MT()'>Минск-Тбилиси</a></br>
     <a href="#" onclick='MA()'>Минск-Амстердам</a>
  </div>

  <script>
    function MM()
    {
      $('#from').val('Минск');
      $('#to').val('Москва');
      $('#subbt').click();
    }
    function MT()
    {
      $('#from').val('Минск');
      $('#to').val('Тбилиси');
      $('#subbt').click();
    }
    function MA()
    {
      $('#from').val('Минск');
      $('#to').val('Амстердам');
      $('#subbt').click();
    }
  </script>

  <img src='materials/fly.png'>
	</div>

  </div>
   <div class='questions'>
   <label id="popzag">Часто задаваемые вопросы</label></br></br>
    <div class='q1'>
      <div class='txt'><label>Нужна ли мне медицинская страховка?</label></div>
      <div class='pl'><label></label></div>
    </div>
    <div class="a1">
      <p>Мы рекомендуем приобретать соответствующие туристические страховки для путешествий за границу. При путешествии в определенные пункты назначения или для некоторых транзитных остановок вам может быть рекомендовано приобритение медицинской страховки.</p>
    </div>
    <div class='q2'>
      <div class='txt'><label>Какое время указывается при покупке билета?</label></div>
      <div class='pl'><label></label></div>
    </div>
    <div class="a2">
      <p>На сайте всегда указывается местное время пункта отправления и города прибытия.</p>
    </div>
    <div class='q3'>
      <div class='txt'><label>Нужен ли билет младенцу до 2-х лет?</label></div>
      <div class='pl'><label></label></div>
    </div>
    <div class="a3">
      <p>Младенцу до 2-х лет для осуществления перелета необходимо приобретать авиабилет одновременно с приобретением авиабилета сопровождающему лицу. </p>
    </div>
	</div>
  
  <script type="text/javascript">
  $('.q1').click(function(){
    if($('.a1').css('display')=='none')
    {
      $('.a1').css('display','block');
    }
    else $('.a1').css('display','none');

    $('.a2').css('display','none');
    $('.a3').css('display','none');

  });

  $('.q2').click(function(){
    if($('.a2').css('display')=='none')
    {
      $('.a2').css('display','block');
    }
    else $('.a2').css('display','none');

    $('.a1').css('display','none');
    $('.a3').css('display','none');
  });

  $('.q3').click(function(){
    if($('.a3').css('display')=='none')
    {
      $('.a3').css('display','block');
    }
    else $('.a3').css('display','none');

    $('.a1').css('display','none');
    $('.a2').css('display','none');
  });

  </script>
	</div>
    <?php

    include_once("footer.php");
?>
</body>
      </html>