<?php
session_start();
$connect_data = "host=localhost port=5432 dbname=postgres user=postgres password=password";
$db_connect = pg_connect($connect_data);
if (!$db_connect) {
    die("Ошибка подключения: " . pg_result_error());
}
//echo "Подключение к БД прошло успешно.";
?>
