<?php
//Меню друзей и подписчиков авторизованного пользователя
if (!$_SESSION['email'] and !$_SESSION['password']) {

} else {
    echo "
        <div class=menu_profile>
            <a href=/friends>Друзья</a><br>
            <a href=/friends?drug=podpischiki>Подписчики</a>
        </div>
    ";

}
