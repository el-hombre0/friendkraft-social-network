<?php
//Форма ввода личных сообщений
$db_connect = pg_connect("host=localhost dbname=postgres port=5432 user=postgres password=password");

if (!$_SESSION['email'] and !$_SESSION['password']) { // Если пользователь авторизован

} else {
    $q = pg_query($db_connect, "SELECT * FROM users WHERE id='{$_SESSION['id']}'"); // Получение всей информации
    // о пользователе с данным id
    $r = pg_fetch_array($q);
}

echo "
<!-- Всплывающее окно сообщений -->
    <div class=popur_top_messages>
        <div class=text>Новое сообщение</div> <!-- Шапка на всплывающем окне-->
        <a href='' class=times>&times;</a>     <!-- Крестик для закрытия на всплывающем окне-->
    </div> 
    <div class=inform_mess></div>
    
    <!-- Форма для вставки сообщения -->
    <form action=/action_message method=post>
        <textarea id=mess name=mess placeholder='Введите сообщение'></textarea>
        <input type=hidden name=poluchatel id=poluchatel value=" . $_GET['id'] . "> <!-- Скрытое поле id получателя-->
        <input type=submit id=submit_mess value=Отправить>
    </form>
";
