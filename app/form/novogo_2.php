<?php
$db_connect = pg_connect("host=localhost dbname=postgres port=5432 user=postgres password=password");
if (!$_SESSION['email'] and !$_SESSION['password']) {
} else {
    $id = $_GET['id'];
    $q = pg_query($db_connect, "SELECT * FROM users WHERE id='{$_GET['id']}'");
    $r = pg_fetch_array($q);
}
echo "
<div id=time_2></div>
<form action=/action_novogo method=post>
    <input type=hidden name=poluchatel id=poluchatel value=" . $r['id'] . ">
    <input type=text name=input_2 class=input_2 placeholder='Разместить запись'>
    <input type=submit name=name class=enter_2 value=опубликовать>
</form>
";