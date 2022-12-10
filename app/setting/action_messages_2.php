<?php
$db_connect = pg_connect("host=localhost dbname=postgres port=5432 user=postgres password=password");
if (!$_SESSION['email'] and !$_SESSION['password']) {

} else {
    $q = pg_query($db_connect, "SELECT * FROM users WHERE id='{$_SESSION['id']}'");
    $r = pg_fetch_array($q);
}
if (isset($_POST)) {
    if (empty($_POST['textarea'])) {

    } else {
        $author = $_POST['author'];
        $poluchatel = $_POST['poluchatel'];
        $textarea = $_POST['textarea'];
        $data = date("Y-m-d");
        $author = pg_escape_string($db_connect, $author);
        $poluchatel = pg_escape_string($db_connect, $poluchatel);
        $textarea = pg_escape_string($db_connect, $textarea);
        $textarea = htmlspecialchars($textarea);
        $mess = $_POST['textarea'];
        $t = pg_query($db_connect, "SELECT * FROM message WHERE author='{$_SESSION['id']}'");
        $w = pg_fetch_array($t);
        if ($w['id'] == "") {
            $query_3 = "INSERT INTO message(author, poluchatel, mess, data, ready)
            VALUES('{$_SESSION['id']}', '$poluchatel', '$mess', '$data', '0')";
            $result_3 = pg_query($db_connect, $query_3) or die (pg_result_error());
        } else {
            pg_query($db_connect, "UPDATE message SET mess='$mess', data='$data', ready='0' 
            WHERE author='{$_SESSION['id']}'");
        }
        $query_2 = "INSERT INTO dialog(author, poluchatel, mess, data)
        VALUES('{$_SESSION['id']}', '$poluchatel', '$mess', '$data')";
        $result_2 = pg_query($db_connect, $query_2) or die (pg_result_error());
        echo "<meta http-equiv='refresh' content='0; url=/mail?act=inbox&id=" . $w['id'] . "'>";
    }
}