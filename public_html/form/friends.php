<?
$q=mysql_query("SELECT * FROM users WHERE id='{$_GET['id']}'");
$r=mysql_fetch_array($q);
$id=$_GET['id'];
$q_2=mysql_query("SELECT * FROM friends WHERE id_user='{$_SESSION['id']}' AND id_user_2='{$_GET['id']}' OR id_user_2='{$_SESSION['id']}' AND id_user='{$_GET['id']}'");
$r_2=mysql_fetch_array($q_2);
$status=$r_2['status'];
$id_user_2=$r_2['id_user_2'];
if($r_2['status']==1){
    echo"<br><center><font color=green>Заявка отправленна</font></center>";
}
else if($r_2['status']==2){
    echo"<br><center><font color=green>У вас в друзьях</font></center>";
}

else{
echo"<form action=/action_friends method=get>
<input type=hidden name=id_user_2 id=id_user_2 value=".$_GET['id'].">
<button id=button_2>Добавить в друзья</button>
</form>";
}
?>