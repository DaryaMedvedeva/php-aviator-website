<html>
  <head>
  <link rel='shortcut icon' href='materials/icon.png' type='image/x-icon'/>
  <title>AVIATOR - онлайн-касса авиабилетов</title>
  <link href="style/common.css" rel="stylesheet">
  <link href="style/reg.css" rel="stylesheet">
      <link href="style/search.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.5.0.js"></script> <!--jquery-->
  </head>
<body>
  <?php
  include_once("header.php");
  ?>
  <div class='search-block'><label id="zag" >ПОИСК БИЛЕТОВ</label> <br>
    <form action="search.php" method="POST" class="se">
      <div class="gr-1">
        <?php
        echo '<input type="text" placeholder="Откуда" id="from" name="from" value='. $_POST['from'].'>
        </div>
        <div >
        <input type="text" placeholder="Куда" id="to" name="to" value='.$_POST['to'].'>
        </div>
        <div>
        <label for="date">Когда</label>
        <input type="date" placeholder="Когда" id="date" name="date"value='. $_POST['date'] .'>
        </div>';
        ?>
        <script>
        let date = new Date();
        let min = String( date.getFullYear()+ '-' + String(date.getMonth() + 1).padStart(2, '0') + '-' + date.getDate()).padStart(2, '0');
        $('#date').attr('min',min);
        let max = String( String(date.getFullYear()+1) + '-' + String(date.getMonth() + 1).padStart(2, '0') + '-' + date.getDate()).padStart(2, '0');
        $('#date').attr('max',max);
        </script>

        <?php
        echo ' <div>
        <div class="forsubmit">
        <input id="subbt" type="submit" value="Найти">
        </div></div>';
      
        ?>

      </form>
    </div>
  
  <?php

include_once("search/res.php");
  include_once("footer.php");
  ?>
  
</body>
</html>