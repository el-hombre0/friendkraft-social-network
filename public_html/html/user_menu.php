<?
if(!$_SESSION['email'] AND !$_SESSION['password']){
}else{
    $id=$_GET['id'];
    $informer=mysql_query("SELECT count(id) FROM message WHERE poluchatel='{$_SESSION['id']}' AND ready='0'");
    $row=mysql_fetch_array($informer, MYSQL_NUM);
     $informer_2=mysql_query("SELECT count(id) FROM friends WHERE id_user_2='{$_SESSION['id']}' AND status='1'");
    $row_2=mysql_fetch_array($informer_2, MYSQL_NUM);
    echo"<div class=menu_user>
    <a href=index?id=".$_SESSION['id'].">Моя страница</a><br>
        <a href=novosti>Новости</a><br>
          <a href=profile?=ocnovnoe>Профиль</a><br>
          <a href=/mail>Мои сообщения</a><b>".$row[0]."</b><br>
          <a href=/friends>Мои друзья</a><b>".$row_2[0]."</b><br>
              <a href=lyoudi>Люди</a><br>
                 
    </div>";
}
?>