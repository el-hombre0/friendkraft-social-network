<?php
if (!$_SESSION['email'] and !$_SESSION['password']) {
} else {
    echo "
    <div class=menu_profile>
        <a href=profile?p=osnovnoe>Основное</a>
        <br>
        <a href=profile?p=interes>Интересы</a><br>
        <a href=profile?p=kontakt>Контакты</a><br>
        <a href=profile?p=password>Изменить пароль</a>
        <br>
    </div>
    ";
}
