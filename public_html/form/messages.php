<?
if(!$_SESSION['email'] AND !$_SESSION['password']){
    
}else{
    $q=mysql_query("SELECT * FROM users WHERE id='{$_SESSION['id']}'");
    $r=mysql_fetch_array($q);
}

echo"<div class=popur_top_messages><div class=text>Новое сообщение</div>

<a href='' class=times>&times;</a></div>
<div class=inform_mess></div>
<form action=/action_message method=post>
    <textarea id=mess name=mess placeholder='Введите текст сообщение'></textarea>
    <input type=hidden name=poluchatel id=poluchatel value=".$_GET['id'].">
    <input type=submit id=submit_mess value=Отправить>
    
</form>";
?>