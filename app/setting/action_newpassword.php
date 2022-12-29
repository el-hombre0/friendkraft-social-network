<?php
//Обработчик смены пароля
$db_connect = pg_connect("host=localhost dbname=postgres port=5432 user=postgres password=password");
if (!$_SESSION['email'] and !$_SESSION['password']) {

} else {
    $q = pg_query($db_connect, "SELECT * FROM users WHERE id='{$_SESSION['id']}'");
    $r = pg_fetch_array($q);
}
if (isset($_POST)) {
    if (empty($_POST['password'])) {
        echo "Введите старый пароль";
    } elseif (empty($_POST['npassword'])) {
        echo "Придумайте новый пароль";
    } elseif (empty($_POST['opassword'])) {
        echo "Повторите новый пароль";
    } elseif ($_POST['npassword'] != $_POST['opassword']) {
        echo "Введенные пароли не совпадают";
    } else {
        $password = $_POST['password'];
        $password = md5($password);
        $query = pg_query($db_connect, "SELECT password FROM users WHERE id='{$_SESSION['id']}'");
        $result = pg_fetch_array($query);
        if ($result['password'] != $password) {
            echo "Старый пароль введен не верно! Выйдите из аккаунта, чтобы востановить пароль";
        } else {
            $npassword = $_POST['npassword'];
            $opassword = $_POST['opassword'];
            $password = $_POST['npassword'];
            $npassword = md5($password);
            pg_query($db_connect, "UPDATE users SET password='$npassword' WHERE id='{$_SESSION['id']}'");
            echo "Пароль успешно изменен";
        }
    }
}
