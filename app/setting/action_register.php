<?php
//Обработчик регистрации
$db_connect = pg_connect("host=localhost dbname=postgres port=5432 user=postgres password=password");
if (isset($_POST)) {
    if (empty($_POST['email'])) {
        echo "<b>Введите ваш E-mail</b>";
    } elseif (!preg_match("/^[a-zA-Z0-9_\.\-]+@([a-zA-Z0-9\-]+\.)+[a-zA-Z]{2,6}$/", $_POST['email'])) {
        echo "<b>некоректный E-mail, например domain@domain.ru</b>";
    } elseif (empty($_POST['password'])) {
        echo "<b>Придумайте пароль</b>";
    } elseif (!preg_match("/\A(\w){6,20}\Z/", $_POST['password'])) {
        echo "<b>Пароль должен быь от 6 до 20 символов</b>";
    } elseif (empty($_POST['password_2'])) {
        echo "<b>Повторите ваш пароль</b>";
    } elseif ($_POST['password'] != $_POST['password_2']) {
        echo "<b>Введеные пароли не совпадают</b>";
    } else {
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);
        $password_2 = htmlspecialchars($_POST['password_2']);
        $data = date("Y-m-d");
        $password = (md5($_POST['password']));
        $ip = $_SERVER['REMOTE_ADDR'];
        $sql = pg_query($db_connect, "SELECT id FROM users WHERE email='$email'") or die(pg_result_error());
        if (pg_num_rows($sql) > 0) {
            echo "<b>пользователь с таким E-mail уже зарегистрированн</b>";
        } else {
            $q = "INSERT INTO users(email, password, data, ip, activation)
            VALUES('$email','$password', '$data', '$ip', '1')";
            $result = pg_query($q) or die (pg_result_error());
            $id_active = pg_fetch_array($result);
            $activation = md5($id_active['id']);
            $subject = "Подтверждение регистрации";
            $message = "
            Здравствуйте, спасибо за регистрацию на сайте friendkraft.ru \n 
            Ваш E-mail " . $email . "\n
            Для того чтобы ввойти в свой аккаунт, его нужно активировать. \n 
            Чтобы активировать ваш аккаунт, перейдите по ссылке: \n http://www.friendkraft.ru/index?email=" . $email .
                "&act=" . $activation . "\n\n
            С уважением администрация сайта friendkraft.ru ";
            mail($email, $subject, $message, "Content-type:text/plane Charset=utf-8\n\n");
            exit("
            <b>Вы успешно зарегистрировались, на ваш E-mail отправленна ссылка для активации вашего аккаунта!</b>");
        }
    }
}