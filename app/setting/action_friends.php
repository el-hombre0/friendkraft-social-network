<?
//Обработчик добавления в друзья
include_once '/var/www/html/bd.php';
if (!$_SESSION['email'] and !$_SESSION['password']) {
} else {
    $q = pg_query($db_connect, "SELECT * FROM users WHERE id='{$_SESSION['id']}'");
    $r = pg_fetch_array($q);
}

if (isset($_GET)) {
    $id_user_2 = $_GET['id_user_2'];
    $query_3 = "INSERT INTO friends(id_user, id_user_2, status)VALUES('{$_SESSION['id']}', '$id_user_2', '1')";
    $result_3 = pg_query($db_connect, $query_3) or die (pg_result_error());
    echo "<meta http-equiv='refresh' content='0 url=/index?id=" . $id_user_2 . "'>";
}


