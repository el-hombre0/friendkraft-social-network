<?
$db_connect = pg_connect("host=localhost dbname=postgres port=5432 user=postgres password=password");
if (!$_SESSION['email'] and !$_SESSION['password']) {

} else {
    $query = pg_query($db_connect, "SELECT * FROM users WHERE id='{$_SESSION['id']}'");
    $result = pg_fetch_array($query);
    $q_2 = pg_query($db_connect, "SELECT * FROM novogo WHERE id_user='{$_SESSION['id']}'");
    $r_2 = pg_fetch_array($q_2);

}
$id = $_GET['id'];
if (isset($_GET['id'])) {

    pg_query($db_connect, "DELETE FROM novogo WHERE id='$id' AND poluchatel='{$_SESSION['id']}'");


    header('location:' . $_SERVER['HTTP_REFERER']);
}
?>