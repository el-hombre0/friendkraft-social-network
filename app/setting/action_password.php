<?php
$db_connect = pg_connect("host=localhost dbname=postgres port=5432 user=postgres password=password");
if (isset($_POST)) {
    if (empty($_POST['email'])) {
        echo "<b>Введите ваш E-mail!</b>";
    } else {
        $email = $_POST['email'];
        $resultat = pg_query($db_connect, "SELECT * FROM users WHERE email='$email'");
        $array = pg_fetch_array($resultat);
        if (empty($array)) {
            exit("<b>Такого пользователя<br> не существует</b>");
        } elseif (pg_num_rows($resultat) > 0) {
            $chars = "qazxswedcvfrtgbnhyujmkiolp1234567890QAZXSWEDCVFRTGBNHYUJMKIOLP";
            $max = 10;
            $size = StrLen($chars) - 1;
            $password = null;
            while ($max--) {
                $password .= $chars[rand(0, $size)];
            }
            $newmdPassword = md5($password);
            $title = "Востановление пароля пользователю" . $email . "для сайта friendktaft.ru";
            $headers = "Content-type: text/plain: charset=utf-8\r\n";
            $headers .= "Администрация сайта friendktaft.ru";
            $letter = "Вы запросили пароль для аккаунта" . $email .
                " на сайте friendktaft.ru\r\n ваш новый пароль " . $password;
            if (mail($email, $title, $letter, $header)) {
                pg_query($db_connect, "UPDATE users SET password='$newmdPassword' WHERE email='$email'");
                echo "<b>Ваш новый пароль<br> отправлен на ваш E-mail</b>";

            }
        }
    }
}