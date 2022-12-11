<?php
$db_connect = pg_connect("host=localhost dbname=postgres port=5432 user=postgres password=password");

if (!$_SESSION['email'] and !$_SESSION['password']) {

} else {
    $q = pg_query($db_connect, "SELECT * FROM users WHERE id='{$_SESSION['id']}'");
    $r = pg_fetch_array($q);
}

echo "
    <div class=popur_top_messages>
        <div class=text>Новое сообщение</div>
        <a href='' class=times>&times;</a></div>
        <div class=inform_mess></div>
        
        <form action=/action_message method=post>
            <textarea id=mess name=mess placeholder='Введите сообщение'></textarea>
            <input type=hidden name=poluchatel id=poluchatel value=" . $_GET['id'] . ">
            <input type=submit id=submit_mess value=Отправить>
        </form>
";
