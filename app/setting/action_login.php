<?php
//Обработчик авторизации
include_once '/var/www/html/bd.php';
if (isset($_POST)) {
    if (empty($_POST['email_2'])) {
        $email_2 = $_POST['email_2'];
        if ($email_2 == '') {
            unset($email_2);
            exit("<b>Введите E-mail</b>");
        }
    } elseif (empty($_POST['password_3'])) {
        $password_3 = $_POST['password_3'];
        if ($password_3 == '') {
            unset($password_3);
            exit("<b>Введите пароль</b>");
        }
    }
    $email_2 = stripslashes($email_2);
    $email_2 = htmlspecialchars($email_2);
    $email_2 = trim($email_2);
    $password_3 = stripslashes($password_3);
    $password_3 = htmlspecialchars($password_3);
    $password_3 = trim($password_3);
    $email = $_POST['email_2'];
    $password = $_POST['password_3'];
    $password = md5($password);
    $user = pg_query($db_connect, "SELECT id FROM users 
    WHERE email='$email' AND password='$password' AND activation='1'");
    $id_user = pg_fetch_array($user);
    if (empty($id_user['id'])) {
        exit("
        <b>Введенный вами E-mail или пароль не верный, либо ваш аккаунт не активированн,
        <br> 
        или воспользуйтесь <a href=/password>востановлением пароля</a></b>"
        );
    } else {
        $_SESSION['email'] = $email;
        $_SESSION['password'] = $password;
        $_SESSION['id'] = $id_user['id'];
        echo "<meta http-equiv='refresh' content='0 URL=novosti'>";
    }
    if (setcookie('email', $_POST['password'], strtotime("+30 days"), '/')) {
        setcookie('email', $_POST['email'], time() + 99999999);
        setcookie('password', $_POST['password'], time() + 99999999);
    }
}