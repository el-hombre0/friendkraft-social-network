<?php
top("новости");
?>

<?php
$db_connect = pg_connect("host=localhost dbname=postgres port=5432 user=postgres password=password");

if (!$_SESSION['email'] and !$_SESSION['password']) {
    echo "<meta http-equiv='refresh' content='0, url=/index'>";
} else {
    $q = pg_query($db_connect, "SELECT * FROM users  WHERE id='{$_SESSION['id']}'");
    $r = pg_fetch_array($q);
    if ($r['name'] == '' or $r['lastname'] == '' or $r['country'] == '') {
        include("form/inform_form.php");
    }

    echo "
        <div id=header>Шапка</div>
        <div id=leftcol>
    ";

    include("html/user_menu.php");

    echo "
    </div>
    <div id=novosti>
        новости
    </div>
    <div id=rightcol>
    </div>
    ";
}

bottom();
?>