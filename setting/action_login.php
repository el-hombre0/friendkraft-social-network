<?php
if(isset($_POST)){
    if(empty($_POST['email_2'])){
        $email_2 = $_POST['email_2'];
        if($email_2 == ''){
            unset($email_2);
            exit("<b>Введите email!</b>");
        }
    }

    elseif(empty($_POST['password_3'])){
        $password_3 = $_POST['password_3'];
        if($password_3 == ''){
            unset($password_3);
            exit ("<b>Введите пароль!</b>");
        }
    }
    $email_2 = stripslashes($email_2); // обработка вредоносных кодов
    $email_2 = htmlspecialchars($email_2);
    $email_2 = trim($email_2);

    $password_3 = stripslashes($password_3);
    $password_3 = htmlspecialchars($password_3);
    $password_3 = trim($password_3);

    $email = $_POST['email_2'];
    $password = $_POST['password_3'];
    $password = md5($password);

    $connect_data = "host=localhost port=5432 dbname=postgres user=postgres password=password";
    $db_connect = pg_connect($connect_data);

    $user = pg_query($db_connect, "select id from users where email='$email' and activation='0'");
    $id_user = pg_fetch_assoc($user);
    if(empty($id_user['id'])){
        exit('<b>Введённый email или пароль не верны (или ваш аккаунт не активирован)</b>');
    }
    else{
        $_SESSION['email'] = $email;
        $_SESSION['password'] = $password;
        $_SESSION['id'] = $id_user['id'];
        exit('<b>Ok</b>');
    }
}