<?php
//Форма добавления в друзья
include_once '/var/www/html/bd.php';

$q = pg_query($db_connect, "SELECT * FROM users WHERE id='{$_GET['id']}'");
$r = pg_fetch_array($q);
$id = $_GET['id'];
$q_2 = pg_query($db_connect, "SELECT * FROM friends 
         WHERE id_user='{$_SESSION['id']}' AND id_user_2='{$_GET['id']}' OR id_user_2='{$_SESSION['id']}' 
                                                            AND id_user='{$_GET['id']}'");
$r_2 = pg_fetch_array($q_2);
$status = $r_2['status'];
$id_user_2 = $r_2['id_user_2'];

// Отображение состояния друга или не друга на его странице
if ($r_2['status'] == 1) {
    echo "<br>Заявка отправлена";
} else if ($r_2['status'] == 2) {
    echo "<br>У вас в друзьях";
} else {
    echo "
    <form action=/action_friends method=get>
        <input type=hidden name=id_user_2 id=id_user_2 value=" . $_GET['id'] . ">
        <button id=button_2>Добавить в друзья</button>
    </form>
    ";
}