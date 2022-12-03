<?
if(!$_SESSION['email'] AND !$_SESSION['password']){
    
}else{
    $id=$_GET['id'];
    $q=mysql_query("SELECT * FROM users WHERE id='{$_GET['id']}'");
    $r=mysql_fetch_array($q);
}
echo"<div id=time_2></div>
<form action=/action_novogo method=post>
<input type=hidden name=poluchatel id=poluchatel value=".$r['id'].">
<input type=text name=input_2 class=input_2 placeholder='Разместить запись'>

<input type=submit name=name class=enter_2 value=опубликовать>
</form>";
?>