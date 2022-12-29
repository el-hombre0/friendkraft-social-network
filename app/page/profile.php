<?php
//Страница "Профиль"
top("Профиль");
?>

<?php
$db_connect = pg_connect("host=localhost dbname=postgres port=5432 user=postgres password=password");
if (!$_SESSION['email'] and !$_SESSION['password']) {
    echo "<meta http-equiv='refresh' content='0, url=/index'>";
} else {
    $q = pg_query($db_connect, "SELECT * FROM users  WHERE id='{$_SESSION['id']}'");
    $r = pg_fetch_array($q);
    echo "
    <div id=header>FriendKraft</div>
    <div id=leftcol>
    ";
    include("html/user_menu.php");
    echo "
    </div>
    <div id=novosti>
    ";
    include("form/profile.php");
    echo "
    </div>
    <div id=rightcol>";
    include("html/profile_user.php");
    echo "</div>";
}

bottom();
?>