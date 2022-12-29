<?php
//Обрабочтик получения первичной информации о пользователе
session_start();
$db_connect = pg_connect("host=localhost dbname=postgres port=5432 user=postgres password=password");
if (!$_SESSION['email'] and !$_SESSION['password']) {

} else {
    $q = pg_query($db_connect, "SELECT * FROM users WHERE email='$email' AND password='$password'");
    $r = pg_fetch_array($q);
}
if (isset($_POST)) {
    if (empty($_POST['name'])) {
        echo "<b>Введите ваше имя</b>";
    } elseif (empty($_POST['lastname'])) {
        echo "<b>Введите вашу фамилию</b>";
    } elseif (empty($_POST['country'])) {
        echo "<b>Введите вашу страну</b>";
    } else {
        $name = htmlspecialchars($_POST["name"]);
        $lastname = htmlspecialchars($_POST["lastname"]);
        $country = htmlspecialchars($_POST["country"]);
        $city = htmlspecialchars($_POST["city"]);

        pg_query($db_connect, "UPDATE users 
        SET name='$name', lastname='$lastname', country='$country', city='$city' 
        WHERE id='{$_SESSION['id']}'");
        exit("<meta http-equiv='Refresh' content='0; URL=/novosti'>");
    }
}
