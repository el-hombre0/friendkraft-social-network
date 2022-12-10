<?
session_start();
$db_connect = pg_connect("host=localhost dbname=postgres port=5432 user=postgres password=password");
if (!$_SESSION['email'] and !$_SESSION['password']) {

} else {
    $q = pg_query($db_connect, "SELECT * FROM users WHERE email='$email' AND password='$password'");
    $r = pg_fetch_array($q);
}
if (isset($_POST)) {
    if (empty($_POST['name'])) {
        echo "<b><center><font size=4 color=red>Введите ваше имя</font></center></b>";
    } elseif (empty($_POST['lastname'])) {
        echo "<b><center><font size=4 color=red>Введите вашу фамилию</font></center></b>";
    } elseif (empty($_POST['country'])) {
        echo "<b><center><font size=4 color=red>Введите вашу страну</font></center></b>";
    } else {
        $name = htmlspecialchars($_POST["name"]);
        $lastname = htmlspecialchars($_POST["lastname"]);
        $country = htmlspecialchars($_POST["country"]);
        $city = htmlspecialchars($_POST["city"]);

        pg_query($db_connect, "UPDATE users SET name='$name', lastname='$lastname', country='$country', city='$city' WHERE id='{$_SESSION['id']}'");
        exit("<meta http-equiv='Refresh' content='0; URL=/novosti'>");
    }
}
?>