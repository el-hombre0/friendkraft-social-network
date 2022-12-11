<?php
$db_connect = pg_connect("host=localhost dbname=postgres port=5432 user=postgres password=password");
if (!$_SESSION['email'] and !$_SESSION['password']) {

} else {
    $q = pg_query($db_connect, "SELECT * FROM users WHERE id='{$_SESSION['id']}'");
    $r = pg_fetch_array($q);
}

if (isset($_POST)) {
    if (empty($_POST['mess'])) {

    } else {
        $author = $_POST['author'];
        $poluchatel = $_POST['poluchatel'];
        $mess = $_POST['mess'];
        $data = date("Y-m-d");
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
        if ($r_2['id'] == '') {
            $query = "INSERT INTO message(author, poluchatel, mess, data, ready)
            VALUES('{$_SESSION['id']}', '$poluchatel', '$mess', '$data', '0')";
            $result = pg_query($db_connect, $query) or die (pg_result_error());
        } else {
            pg_query($db_connect, "UPDATE message SET mess='$mess', ready='0', data='$data' 
            WHERE poluchatel='$poluchatel'");
        }
        echo "Сообщение успешно отправленно";
        echo "<meta http-equiv='refresh' content='1; url=/index?id=" . $poluchatel . "'>";
    }
}
