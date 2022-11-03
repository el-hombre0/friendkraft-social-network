<?php
session_start();
$connect_data = "host=127.0.0.1 port=5432 dbname=network_db user=user1 password=pass";
$db_connect = pg_connect($connect_data);
if (!$db_connect) {
    die("Ошибка подключения: " . pg_result_error());
}
echo "Подключение к БД прошло успешно.";
?>
