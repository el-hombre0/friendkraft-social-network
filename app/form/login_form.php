<?
$db_connect = pg_connect("host=localhost dbname=postgres port=5432 user=postgres password=password");
if (isset($_GET['act']) and isset($_GET['email'])) {
    $act = $_GET['act'];
    $act = htmlspecialchars($act);
    $act = stripslashes($act);

    $email = $_GET['email'];
    $email = htmlspecialchars($email);
    $email = stripslashes($email);

    $activ = pg_query($db_connect, "SELECT id FROM users WHERE email='$email'");
    $id_activ = pg_fetch_array($activ);
    $activation = md5($id_activ['id']);

    if ($activation = $act) {
        pg_query($db_connect, "UPDATE users SET activation='1' WHERE email='$email'");
        echo "<b>Вы успешно активировали свой аккаунт, можете войти вводя свой E-mail и пароль</b>";
    }
}
?>


<div id="login">
    <div id="inform_2"></div>
    <form action="action_login" method="post">
        <b>E-mail</b>
        <input type="text" name="email_2" id="email_2"><br>
        <b>Пароль</b>
        <input type="password" name="password_3" id="password_3"><br>
        <input type="submit" class="submit_2" value="Войти">
    </form>
    <button id="button">Зарегистрироваться</button>
</div>