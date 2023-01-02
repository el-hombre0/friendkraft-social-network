<?php
//Меню авторизованного пользователя со всеми доступными разделами
include_once '/var/www/html/bd.php';
if (!$_SESSION['email'] and !$_SESSION['password']) {

} else {
    $id = $_GET['id'];
    // Количество непрочитанных сообщений
    $informer = pg_query($db_connect, "SELECT count(id) FROM message 
                 WHERE poluchatel='{$_SESSION['id']}' AND ready='0'");
//    $row = pg_fetch_array($informer, PGSQL_NUM);
    $row = pg_fetch_array($informer);

//    Количество друзей
    $informer_2 = pg_query($db_connect, "SELECT count(id) FROM friends 
                 WHERE id_user_2='{$_SESSION['id']}' AND status='1'");
//    $row_2 = pg_fetch_array($informer_2, PGSQL_NUM);
    $row_2 = pg_fetch_array($informer_2);

    echo "
        <nav class='navbar navbar-expand-md navbar-light bg-light'>
            <div class='container'>
                <a href='' class='navbar-brand'>FriendKraft</a>
                <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarContent' 
                aria-controls='navbarContent' aria-expanded='false'>
                    <span class='navbar-toggler-icon'></span>
                </button>
                <div class='collapse navbar-collapse' id='navbarContent'>
                    <ul class='navbar-nav mr-auto mb-2'>
                        <li class='nav-item'>
                            <a class='nav-link' href=index?id=" . $_SESSION['id'] . ">Моя страница</a>
                        </li>
                        <li class='nav-item'>
                            <a class='nav-link' href=novosti>Новости</a>
                        </li>
                        <li class='nav-item'>
                            <a class='nav-link' href=profile?=ocnovnoe>Профиль</a>
                        </li>
                        <li class='nav-item'>
                            <a class='nav-link' href=/mail>Мои сообщения</a>". $row[0] ."
                        </li>
                        <li class='nav-item'>
                            <a class='nav-link' href=/friends>Мои друзья</a>" . $row_2[0] . "
                        </li>
                        <li class='nav-item'>
                            <a class='nav-link' href=lyoudi>Люди</a>
                        </li>
                    </ul>
                    <form action='' class='d-flex'>
                    <input type='search' placeholder='Найти...' class='form-control mr-2'>
                    <button class='btn btn-outline-success'>Поиск</button>
</form>                    
                </div>
            </div>
        </nav>
       ";
}