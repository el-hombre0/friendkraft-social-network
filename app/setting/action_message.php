<?php
$db_connect = pg_connect("host=localhost dbname=postgres port=5432 user=postgres password=password");
if (!$_SESSION['email'] and !$_SESSION['password']) { // Если пользователь не авторизован

} else {
//    Получение id пользователя
    $q = pg_query($db_connect, "SELECT * FROM users WHERE id='{$_SESSION['id']}'");
    $r = pg_fetch_array($q);
}

if (isset($_POST)) {
    if (empty($_POST['mess'])) { // Если ничего не введено

    } else { // Вытаскиваем полученные через форму данные из _POST
        $author = $_POST['author'];
        $poluchatel = $_POST['poluchatel'];
        $mess = $_POST['mess'];
        $data = date("Y-m-d");
        // Защита данных от SQL-инъекции
        $author = pg_escape_string($db_connect, $author);
        $poluchatel = pg_escape_string($db_connect, $poluchatel);
        $mess = pg_escape_string($db_connect, $mess);
        $mess = htmlspecialchars($mess);
        $query_2 = "INSERT INTO dialog(author, poluchatel, mess, data)
        VALUES('{$_SESSION['id']}', '$poluchatel', '$mess', '$data')";
        $result_2 = pg_query($db_connect, $query_2) or die (pg_result_error());
        $q_2 = pg_query($db_connect, "SELECT * FROM message 
         WHERE author='{$_SESSION['id']}' AND poluchatel='$poluchatel'");
        $r_2 = pg_fetch_array($q_2);
        if ($r_2['id'] == '') { // Если сообщения еще нет
//            Занесение нового сообщения в бд
            $query = "INSERT INTO message(author, poluchatel, mess, data, ready)
            VALUES('{$_SESSION['id']}', '$poluchatel', '$mess', '$data', '0')";
            $result = pg_query($db_connect, $query) or die (pg_result_error()); // Ошибки после занесения
        } else { // Если сообщение между пользователями существует, то не добавляем новое сообщение, а обновляем уже
            // имеющееся
            pg_query($db_connect, "UPDATE message SET mess='$mess', ready='0', data='$data' 
            WHERE poluchatel='$poluchatel'");
        }
        echo "Сообщение успешно отправленно";
        echo "<meta http-equiv='refresh' content='1; url=/index?id=" . $poluchatel . "'>"; // Перенаправление на
        // страницу получателя через 1 секунду
    }
}
