<?php
//Меню сообщений авторизованного пользователя
if (!$_SESSION['email'] and !$_SESSION['password']) {
} else {
    echo "
        <div class=menu_profile><a href=mail?act=vxod>Входящие сообщение</a><br>
        <a href=mail?act=isxod>Отправленные сообщение</a>
        <a href=mail?act=read_1>Прочитанные сообщение</a><br>
        <a href=mail?act=read_0>Непрочитанные сообщение</a><br>
    ";
}