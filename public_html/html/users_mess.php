<?
if(!$_SESSION['email'] AND !$_SESSION['password']){
}else{
echo"<div class=menu_profile><a href=mail?act=vxod>Входящие сообщение</a><br>
<a href=mail?act=isxod>Исходящие сообщение</a>
<a href=mail?act=read_1>Прочитанные сообщение</a><br>
<a href=mail?act=read_0>Не прочитанные сообщение</a><br>";

}
?>