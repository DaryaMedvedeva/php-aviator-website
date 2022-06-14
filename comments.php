<html>
    <head>
        <link rel='shortcut icon' href='materials/icon.png' type='image/x-icon'/>
        <title>AVIATOR - Отзывы</title>
        <link href="style/common.css" rel="stylesheet">
        <link href="style/reg.css" rel="stylesheet">
		<link href="style/comments.css" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.5.0.js"></script> <!--jquery-->
      
    </head>
    <body>
      <?php


    include_once("header.php");

include_once("db/connect.php");

 $sql = 'SELECT userid, name, publicdate, text FROM comment';
 $result = mysqli_query($db_link, $sql) or die(mysqli_error($db_link));;
for ($arr = []; $row = mysqli_fetch_assoc($result); $arr[] = $row);   

$bt='';
if(isset($_SESSION['userid'])) 
{
    $bt.='<input type="submit" class="oksub" value="Отправить" style="width: 150px; margin-left: 70%;" onclick="comments/publish.php">';
}
else
{
    $bt.='<input type="submit" value="Отправить" class="nosub" disabled="disabled" style="width: 150px; margin-left: 70%;">
    <div class="exp" style="font-size: 12px; font-weight:500; margin-left: 60%; color:#888888; text-align: right; margin-right:15%;">Неавторизованные пользователи</br>не могут оставлять комментарии.</div>';
}

?>

 <link href="style/comments.css" rel="stylesheet">

<div class='comments'>
<p class='zag'>Оставьте отзыв</p>
    <form method='post' id='commentform' action='comments/publish.php'>
        <textarea name='text' placeholder="Отзыв..." style='margin-bottom: 2%;' ></textarea>
        <?php echo $bt; ?>
        <script> 
            
        </script>
    </form>

</script>
<p class='zag'>Все отзывы</p>
<div class="commentsarea">
    
    <?php

    for($i=count($arr)-1; $i>=0; $i--)
    {
        echo "<div class='commentcard'>
        <div>
    <p class='name'>".$arr[$i]['name']."</p>
    <p class='publicdate'>".$arr[$i]['publicdate']."</p>
    <p class='text'>".$arr[$i]['text']."</p>
    </div>
    </div> ";
   }
echo '</div></div>';

    include_once("db/disconnect.php");


    include_once("footer.php");


?>
</body>
      </html>

