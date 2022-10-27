<?php
session_start();
header('Content-Type: text/html; charset=utf-8'); // В функции заголовка указывается кодировка страницы
include ("bd.php");
if ($_SERVER['REQUEST_URI'] == '/') { // Если адрес для загрузки страницы пустой, то заносим в переменные главный файл
        $Page = 'index';
        $Module = 'index';

}
else{ // Иначе функция разбивает на части массив
    $URL_Path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $URL_Parts = explode('/', trim($URL_Path, ' /')); // деление строки настроки, trim - удаление
    // пробелов из начала и конца строки
    $Page = array_shift($URL_Parts); // Имя страницы
    $Module = array_shift($URL_Parts); // Имя модуля
}
if (!empty($Module)) {
    $Param = array();
    for ($i = 0; $i < count($URL_Parts); $i++) {
        $Param[$URL_Parts[$i]] = $URL_Parts[++$i];
    }
}


if ($Page == 'index'){
    include('page/index.php');
}
elseif ($Page == 'login') include('page/login.php');
elseif ($Page == 'register') include('page/register.php');

function top($title){
    include("./html/top.php");
}
function content(){
    include("./html/content.php");
}
function bottom(){
    include("./html/bottom.php");
}

