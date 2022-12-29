<?php
//Подключение к базе данных
session_start();
$connect_data = "host=localhost port=5432 dbname=postgres user=postgres password=password";
$db_connect = pg_connect($connect_data);