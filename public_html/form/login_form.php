<?
if(isset($_GET['act'])AND isset($_GET['email'])){
 $act=$_GET['act']; 
 $act=htmlspecialchars($act);
 $act=stripslashes($act);
  $email=$_GET['email'];
   $email=htmlspecialchars($email);
    $email=stripslashes($email);
    $activ=mysql_query("SELECT id FROM users WHERE email='$email'");
    $id_activ=mysql_fetch_array($activ);
    $activation=md5($id_activ['id']);
     if($activation=$act){
         mysql_query("UPDATE users SET activation='1' WHERE email='$email'");
         echo"<b><center><font size=4 color=green>Вы успешно активировали свой аккаунт, можете войти вводя свой E-mail и пароль<font></center></b>";
     }
}
?>




<div id="login">
    <div id="inform_2"></div>
    <form action="action_login" method="post">
        <b>E-mail</b>
      <input type="text" name="email_2" id="email_2"><br> 
      <b>Пароль</b>
        <input type="password" name="password_3" id="password_3"><br>
             <input type="submit" class="submit_2" value="Войти">
    </form>
    <button id="button">Зарегистрироваться</button>
</div>