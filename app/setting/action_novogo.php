<?php
//Обработчик "Что нового"
$db_connect = pg_connect("host=localhost dbname=postgres port=5432 user=postgres password=password");
if (isset($_POST)) {
    if (empty($_POST['input'])) {

    } else {
        $input = htmlspecialchars($_POST['input']);
        $data = date("Y-m-d");
        $q = "INSERT INTO novogo(id_user, poluchatel, text, data)VALUES('{$_SESSION['id']}', '{$_SESSION['id']}', '$input', '$data')";
        $result = pg_query($db_connect, $q) or die(pg_result_error());
    }
}

if (isset($_POST)) {
    if (empty($_POST['input_2'])) {

    } else {
        $input_2 = htmlspecialchars($_POST['input_2']);
        $data = date("Y-m-d");
        $id_user_2 = $_POST['id_user_2'];
        $poluchatel = $_POST['poluchatel'];
        $q = "INSERT INTO novogo(id_user, poluchatel, text, data, status)VALUES('{$_SESSION['id']}', '{$_POST['poluchatel']}', '$input_2', '$data', '1')";
        $result = pg_query($db_connect, $q) or die (pg_result_error());
        echo $result['id'];
    }
}