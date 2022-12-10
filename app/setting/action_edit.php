<?
$db_connect = pg_connect("host=localhost dbname=postgres port=5432 user=postgres password=password");
if (!$_SESSION['email'] and !$_SESSION['password']) {

} else {
    $q = pg_query($db_connect, "SELECT * FROM users WHERE id='{$_SESSION['id']}'");
    $r = pg_fetch_array($q);
    $query = pg_query($db_connect, "SELECT * FROM profile WHERE id_user='{$_SESSION['id']}'");
    $result = pg_fetch_array($query);
}
if (isset($_POST['enter'])) {
    if (empty($_POST['country']) &
        empty($_POST['city']) &
        empty($_POST['polojenie']) &
        empty($_POST['sex']) &
        empty($_POST['day']) &
        empty($_POST['monday']) &
        empty($_POST['year'])
    ) {
        echo "<meta http-equiv='refresh' content='0 url=/profile?p=osnovnoe'>";
    } else {
        $country = htmlspecialchars($_POST['country']);
        $city = htmlspecialchars($_POST['city']);
        $polojenie = htmlspecialchars($_POST['polojenie']);
        $sex = htmlspecialchars($_POST['sex']);
        $day = htmlspecialchars($_POST['day']);
        $monday = htmlspecialchars($_POST['monday']);
        $year = htmlspecialchars($_POST['year']);
        pg_query($db_connect, "UPDATE users SET country='$country', city='$city' WHERE id='{$_SESSION['id']}'");
        if (empty($result['id'])) {
            $q_2 = "INSERT INTO profile(id_user, polojenie, sex, day, monday, year)
            VALUES('{$_SESSION['id']}','$polojenie', '$sex', '$day', '$monday', '$year')";
            $resultat = pg_query($db_connect, $q_2) or die(pg_result_error());
            $_SESSION['profile'] = "Данные сохранены";
            echo "<meta http-equiv='refresh' content='0 url=/profile?p=osnovnoe'>";
        } else {
            pg_query($db_connect, "UPDATE profile 
            SET polojenie='$polojenie', sex='$sex', day='$day', monday='$monday', year='$year' 
            WHERE id_user='{$_SESSION['id']}'");
            $_SESSION['profile'] = "Данные сохранены";
            echo "<meta http-equiv='refresh' content='0 url=/profile?p=osnovnoe'>";
        }
    }
}
if (isset($_POST['enter_2'])) {
    if (empty($_POST['film']) &
        empty($_POST['music']) &
        empty($_POST['tele']) &
        empty($_POST['book']) &
        empty($_POST['game']) &
        empty($_POST['hobbi']) &
        empty($_POST['osebe'])
    ) {
        echo "<meta http-equiv='refresh' content='0 url=/profile?p=interes'>";
    } else {
        $film = htmlspecialchars($_POST['film']);
        $music = htmlspecialchars($_POST['music']);
        $tele = htmlspecialchars($_POST['tele']);
        $book = htmlspecialchars($_POST['book']);
        $game = htmlspecialchars($_POST['game']);
        $osebe = htmlspecialchars($_POST['osebe']);
        $hobbi = htmlspecialchars($_POST['hobbi']);
        if (empty($result['id'])) {
            $q_3 = "INSERT INTO profile(film, music, tele, book, game, hobbi, osebe)
            VALUES('{$_SESSION['id']}','$film', '$music', '$tele', '$book', '$game', '$hobbi', '$osebe')";
            $resultat_2 = pg_query($db_connect, $q_3) or die(pg_result_error());
            $_SESSION['profile'] = "Данные сохранены";
            echo "<meta http-equiv='refresh' content='0 url=/profile?p=interes'>";
        } else {
            pg_query($db_connect, "UPDATE profile 
            SET film='$film', music='$music', tele='$tele', book='$book', game='$game', hobbi='$hobbi', osebe='$osebe' 
            WHERE id_user='{$_SESSION['id']}'");
            $_SESSION['profile'] = "Данные сохранены";
            echo "<meta http-equiv='refresh' content='0 url=/profile?p=interes'>";
        }
    }
}
if (isset($_POST['enter_3'])) {
    if (empty($_POST['phone']) & empty($_POST['phone_2']) & empty($_POST['skape']) & empty($_POST['sate'])) {
        echo "<meta http-equiv='refresh' content='0 url=/profile?p=kontakt'>";
    } else {
        $phone = htmlspecialchars($_POST['phone']);
        $phone_2 = htmlspecialchars($_POST['phone_2']);
        $skape = htmlspecialchars($_POST['skape']);
        $sate = htmlspecialchars($_POST['sate']);
        if (empty($result['id'])) {
            $q_4 = "INSERT INTO profile(phone, phone_2, skape, sate)
            VALUES('{$_SESSION['id']}','$phone', '$phone_2', '$skape', '$sate')";
            $resultat_2 = pg_query($db_connect, $q_3) or die(pg_result_error());
            $_SESSION['profile'] = "Данные сохранены";
            echo "<meta http-equiv='refresh' content='0 url=/profile?p=kontakt'>";
        } else {
            pg_query($db_connect, "UPDATE profile 
            SET phone='$phone', phone_2='$phone_2', skape='$skape', sate='$sate' 
            WHERE id_user='{$_SESSION['id']}'");
            $_SESSION['profile'] = "Данные сохранены";
            echo "<meta http-equiv='refresh' content='0 url=/profile?p=kontakt'>";
        }
    }
}
?>