<?php
$db_connect = pg_connect("host=localhost dbname=postgres port=5432 user=postgres password=password");
if (!$_SESSION['email'] and !$_SESSION['password']) {

} else {
    $email = $_SESSION['email'];
    $password = $_SESSION['password'];
    $q_user = pg_query($db_connect, "SELECT id FROM users WHERE id='$id'");
    $r_user = pg_fetch_array($q_user);
    $id = $r_user['id'];
}
if (isset($_POST['file'])) {
    $uploadDir = "file/";
    $types = array("image/gif", "image/png", "image/jpeg", "image/pjpeg", "image/p-png");
    $size = 1048576;
    $file = $_FILES['userfile']['name'];
    $res = array();
    if (!isset($file)) {
        $res = array("answer" => "Ошибка! Возможно файл слишком большой");
        exit(json_encode($res));
    }
    if ($_FILES['userfile']['size'] > $size or $_FILES['userfile']['size'] == 0) {
        $res = array("answer" => "Ошибка! максимальный вес 1 мб");
        exit(json_encode($res));
        exit("file");
    }
    if (!in_array($_FILES['userfile']['type'], $types)) {
        $res = array("answer" => "Ошибка! Допустимые расширение- .gif, .png, .jpg");
    }
    if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadDir . $file)) {
        $res = array("answer" => "ok", "file" => $file);
        $q = pg_query($db_connect, "UPDATE users SET avatar='file/$file' WHERE id='{$_SESSION['id']}'");
        exit(json_encode($res));

    } else {
        $res = array("answer" => "Ошибка загрузки /file/", "file" => $file);
        exit(json_encode($res));
    }
}
