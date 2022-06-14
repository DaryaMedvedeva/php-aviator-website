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
  
  <div class='lk-block'><label id="zag" >Мои билеты</label>  <a id="ss" href="index.php">Найти билеты</a> <br>
        <?php
         //КАБИНЕТ
         if (!empty($_SESSION["name"])) 
         {
         include_once('db/connect.php');

         $str="SELECT * FROM ticket where userid=".$_SESSION["userid"]." ORDER BY status";
         $result = mysqli_query($db_link, $str) or die(mysqli_error($db_link));;
         for ($arr = []; $row = mysqli_fetch_assoc($result); $arr[] = $row); 
         
   echo "
  <div class='resultarea'>
  <h1>Забронированные</h1>
  <div class='brarea'></div>
  <h1>Купленные</h1>
  <div class='buyarea'></div>
  </div>  ";                   
for($i=count($arr)-1; $i>=0; $i--)
{
  if($arr[$i]["status"]=="broned")
        echo " 
    <script>
    $('.brarea').append(`<div class='ticketcard'>
    <div class='inl'>
    <nobr class='route$i route'>".$arr[$i]['fromthe']." - ".$arr[$i]['tothe']."</nobr> <nobr class='sit'>".$arr[$i]['sit']."</nobr>
    </div></br>
    <div class='inl'>
    <nobr class='date$i date'>".$arr[$i]['date']."  &nbsp&nbsp ".$arr[$i]['time']."</nobr>
    </div>
    <div class='btarea'> 
    <button class='brone$i brone'  onclick='remove(".$arr[$i]["ticketid"].", $i)'>Отменить бронь</button><button class='buy$i buy'  onclick='bronetobought(".$arr[$i]["ticketid"].")'>Купить</button>
    </div>`);

    $.ajax({
      url: 'session/getflyinfo.php',
            method: 'POST',
            data: {'flyid' : ".$arr[$i]["idfly"]." },
            dataType: 'json',
      success: function(jsondata){
              $('.route$i').html(jsondata.idfly+' &nbsp &nbsp  '+jsondata.fromthe+' - '+jsondata.tothe);
              $('.date$i').html(jsondata.date+' &nbsp &nbsp '+jsondata.time);
              $('.brone$i').val(jsondata.idfly);
          },

      error: function(xhr, status, error) {
        alert(xhr.responseText + '|' + status + '|' +error);
      }
    });</script>

    </div>   ";
  
  if($arr[$i]["status"]=="bought")
          echo " 
      <script>
      $('.buyarea').append(`<div class='ticketcard'>
      <div class='inl'>
      <nobr class='route$i route'>".$arr[$i]['fromthe']." - ".$arr[$i]['tothe']."</nobr> <nobr class='sit sit$i'>".$arr[$i]['sit']."</nobr>
      </div></br>
      <div class='inl'>
      <nobr class='date$i date'>".$arr[$i]['date']."      ".$arr[$i]['time']."</nobr>
      </div>
      <div class='btarea'> 
      <button class='print$i print' onclick='print($i)'>Открыть</button>
      </div>`);
      
      $.ajax({
        url: 'session/getflyinfo.php',
              method: 'POST',
              data: {'flyid' : ".$arr[$i]["idfly"]." },
              dataType: 'json',
        success: function(jsondata){
                $('.route$i').html(jsondata.idfly+'    '+jsondata.fromthe+' - '+jsondata.tothe);
                $('.date$i').html(jsondata.date+'  '+jsondata.time);
                $('.brone$i').val(jsondata.ticketid);
                $('.print$i').val(jsondata.ticketid);
            },
      
        error: function(xhr, status, error) {
          alert(xhr.responseText + '|' + status + '|' +error);
        }
      });</script>
      
      </div>   ";
};
                include_once('db/disconnect.php');
            }
            else echo'<div id="nouser"><h1>АВТОРИЗУЙТЕСЬ</h1></div>
            <script>$(".autorise").click();</script>';
        
           
        ?>
        
        <script>
          function exitfunc()
          {
            let sure = confirm("Вы уверены, что хотите выйти?");
            if(sure)
            {
              window.location.href = 'reg/exit.php';   
            };
          };

          function remove(id, i)
          {
            let fl= $('.brone'+i).val();
            $.post("session/tickremove.php", { id: id, fl: fl}, 
            function ()    {
             alert('Бронь отменена!');
             window.location.href = 'tickets.php';
          });
          };

          function bronetobought(id)
          {
            $.post("session/bronetobought.php", { id: id}, 
            function ()    {
             alert('Билет куплен!');
             window.location.href = 'tickets.php';
          });
          };

          function print(i)
          {
            let route= $('.route'+i).html();
            let sit= $('.sit'+i).html();
            let dat= $('.date'+i).html();
            
            let p = document.createElement("p");
          
          let form = document.createElement('form');
          form.style.visibility = 'hidden'; // no user interaction is necessary
          form.method = 'POST'; // forms by default use GET query strings
          form.action = 'session/pdf.php';
          
          
            let input = document.createElement('input');
            input.name = "route";
            input.value = route;
            form.appendChild(input); // add key/value pair to form

            let input2 = document.createElement('input');
            input2.name = "sit";
            input2.value = sit;
            form.appendChild(input2); // add key/value pair to form

            let input3 = document.createElement('input');
            input3.name = "date";
            input3.value = dat;
            form.appendChild(input3); // add key/value pair to form

            document.body.appendChild(form); 
          
          form.submit(); // send the payload and navigate
          }

        
        </script>
    </div>
  
  <?php

  include_once("footer.php");
  ?>
  
</body>
</html>