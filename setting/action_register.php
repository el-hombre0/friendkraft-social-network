<?php
if(isset($_POST)){
    if(empty($_POST['email'])){
        echo "Введите Ваш email";
    }
    elseif(!preg_match("/^[a-zA-Z0-9_\.\-]+@([a-zA-Z0-9\-]+\.)+[a-zA-Z]{2,6}$/",$_POST['email'])){
        echo "Email введён некорректно. Пример: name@email.ru";
    }
    elseif(empty($_POST['password'])){
        echo "Придумайте пароль.";
    }
    elseif(!preg_match("/\A(\w){6,20}\Z/", $_POST['password'])){
        echo "Пароль должен иметь длину от 6 до 20 символов.";
    }
    elseif(empty($_POST['password_2'])){
        echo "Повторите пароль.";
    }
    elseif($_POST['password'] != $_POST['password_2']){
        echo "password = ".$_POST['password']." password_2 = ".$_POST['password_2'];
        echo "Введённые пароли не совпадают.";
    }
    else{
        $email = $_POST['email'];
        $password = $_POST['password'];
        $password_2 = $_POST['password_2'];
        $mdPassword = md5($password);
        $date = date("Y-m-d");
        $ip = $_SERVER['REMOTE_ADDR']; // ip зарегистрированного пользователя
        $db_connect = pg_connect("host=localhost dbname=postgres port=5432 user=postgres password=password");
        $sql = pg_query($db_connect, "SELECT id FROM users WHERE email='$email'") or die(pg_result_error());
        if(pg_num_rows($sql) > 0){
            echo "Такой email уже зарегистрирован.";
        }
        else{
            $result = pg_query($db_connect, "INSERT INTO users (email, password, date, ip) VALUES ('$email', '$mdPassword', '$date', '$ip')");
            echo "Регистрация прошла успешно";
        }
    }
}