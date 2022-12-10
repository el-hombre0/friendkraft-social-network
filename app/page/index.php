<?
$db_connect = pg_connect("host=localhost dbname=postgres port=5432 user=postgres password=password");

if (!$_SESSION['email'] and !$_SESSION['password']) {
    top("Социальная сеть");
    echo "<div id=header>FriendKraft</div>
         <div id=leftcol>";
    include("form/login_form.php");
    include("form/register_form.php");
    echo "</div>
          <div id=content>";
    include("html/content.php");
    echo "</div>";
} else {

    $q = pg_query($db_connect, "SELECT id, name, lastname FROM users WHERE id='{$_GET['id']}'");
    $result = pg_fetch_array($q);

    $id = $_GET['id'];
    top($result['name'] . "&nbsp;&nbsp;" . $result['lastname']);
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    } else {
        $q = pg_query($db_connect, "SELECT * FROM users");
        $r = pg_fetch_array($q);
        $id = $_GET['id'];
    }
    $email = $_SESSION['email'];
    $password = $_SESSION['password'];
    $q_2 = pg_query($db_connect, "SELECT id, name, lastname, country, city, avatar FROM users WHERE id='{$_SESSION['id']}'");
    $r_2 = pg_fetch_array($q_2);
    if ($id == $r_2['id']) {
        $qu = pg_query($db_connect, "SELECT * FROM profile WHERE id_user='{$_SESSION['id']}'");
        $res = pg_fetch_array($qu);
        echo "<div id=header><div class=exit><a href=/exit>Выйти</a></div></div>
             <div id=leftcol>";
        include("html/user_menu.php");
        echo "</div>";
        if (!$r_2['avatar']) {
            $r_2['avatar'] = "/file/1.jpg width=200 height=260";
        }
        echo "<div id=popur_photo>";
        include("form/photo.php");
        echo "</div>
             <div id=hover></div>";
        echo "<div id=left_container><div id=photo><img src=" . $r_2['avatar'] . " width=200 height=260><button id=button>Загрузить фото</button></div>";
        echo "<div id=friends>";

        $informer = pg_query($db_connect, "SELECT count(id) FROM friends WHERE id_user='{$_SESSION['id']}' OR id_user_2='$id' AND status='2'");
        $row = pg_fetch_array($informer, PGSQL_NUM);
        echo "<b>Мои друзья&nbsp;&nbsp;&nbsp;" . $row[0] . "</b><br><br>";

        $qu_2 = pg_query($db_connect, "SELECT * FROM friends WHERE id_user_2='{$_SESSION['id']}' AND status='2'");
        while ($ru_2 = pg_fetch_array($qu_2)) {
            $id = $r_2['id'];
            $id_user = $ru_2['id_user'];
            $id_user_2 = $ru_2['id_user_2'];
            $status = $ru_2['status'];


            $qu_3 = pg_query($db_connect, "SELECT * FROM users WHERE id='$id_user'");
            while ($ru_3 = pg_fetch_array($qu_3)) {
                $id = $ru_3['id'];
                $name = $ru_3['name'];

                $avatar = $ru_3['avatar'];
                if (!$ru_3['avatar']) {
                    $ru_3['avatar'] = "/file/1.jpg width=50 height=50";
                }
                echo "<div id=friends_drug><div class=drug_drug><img src=" . $ru_3['avatar'] . ">&nbsp;<center><small><a href=/index?id=" . $ru_3['id'] . ">" . $ru_3['name'] . "</a></small></center><br></div></div>";


            }
        }
        $qu_6 = pg_query($db_connect, "SELECT * FROM friends WHERE id_user='{$_SESSION['id']}' AND status='2'");
        while ($ru_6 = pg_fetch_array($qu_6)) {
            $id = $ru_6['id'];
            $id_user = $ru_6['id_user'];
            $id_user_2 = $ru_6['id_user_2'];
            $status = $ru_6['status'];


            $qu_7 = pg_query($db_connect, "SELECT * FROM users WHERE id='$id_user_2'");
            while ($ru_7 = pg_fetch_array($qu_7)) {
                $id = $ru_7['id'];
                $name = $ru_7['name'];

                $avatar = $ru_7['avatar'];
                if (!$ru_7['avatar']) {
                    $ru_7['avatar'] = "/file/1.jpg";
                }
                echo "<div id=friends_drug><div class=drug_drug><img src=" . $ru_7['avatar'] . ">&nbsp;<center><small><a href=/index?id=" . $ru_7['id'] . ">" . $ru_7['name'] . "</a></small></center><br></div></div>";


            }
        }


        echo "</div></div>";
        if ($r_2['city'] != '') $a = "<br>Город:";
        if ($res['day'] != '' or $res['monday'] != '' or $res['year'] != '') $b = "<br>Дата рождения:";
        if ($res['polojenie'] != '') $c = "<br>Семейное положение:";
        if ($res['sex'] != '') $d = "<br>Пол:";
        if ($res['film'] != '') $e = "<br>Любимый фильм:";
        if ($res['music'] != '') $f = "<br>Любимая музыка:";
        if ($res['tele'] != '') $g = "<br>Любимое телешоу:";
        if ($res['book'] != '') $h = "<br>Любимые книги:";

        if ($res['game'] != '') $k = "<br>Любимые игры:";
        if ($res['hobbi'] != '') $l = "<br>Хобби:";
        if ($res['phone'] != '') $m = "<br>Телефон:";
        if ($res['phone_2'] != '') $n = "<br>дополнительный телефон:";
        if ($res['skape'] != '') $o = "<br>Скайп:";
        if ($res['sate'] != '') $p = "<br>Личный сайт:";
        if ($res['osebe'] != '') $q = "<br>О себе:";

        echo "<div id=user_container><div id=inform><h3>" . $r_2['name'] . "&nbsp;&nbsp;" . $r_2['lastname'] . "</h3><hr><b>Страна:</b>&nbsp;&nbsp;" . $r_2['country'] . "<b>" . $a . "</b>&nbsp;&nbsp;
              " . $r_2['city'] . "<b>" . $b . "</b>&nbsp;&nbsp;" . $res['day'] . "&nbsp;&nbsp" . $res['monday'] . "&nbsp;&nbsp" . $res['year'] . "<b>" . $c . "</b>&nbsp;&nbsp;" . $res['polojenie'] . "
              <b>" . $d . "</b>&nbsp;&nbsp;" . $res['sex'] . " 
              
              <h4 class=spoller_title><font color=green><center>Показать еще информацию</center></font></h4>
              <div class=spoller-body><b>" . $e . "</b>&nbsp;&nbsp;" . $res['film'] . "<b>" . $f . "</b>&nbsp;&nbsp;" . $res['music'] . "<b>" . $g . "</b>&nbsp;&nbsp;" . $res['tele'] . "
              <b>" . $h . "</b>&nbsp;&nbsp;" . $res['book'] . "<b>" . $k . "</b>&nbsp;&nbsp;" . $res['game'] . "<b>" . $l . "</b>&nbsp;&nbsp;" . $res['hobbi'] . "
              <b>" . $m . "</b>&nbsp;&nbsp;" . $res['phone'] . "<b>" . $n . "</b>&nbsp;&nbsp;" . $res['phone_2'] . "<b>" . $o . "</b>&nbsp;&nbsp;" . $res['skape'] . "
              <b>" . $p . "</b>&nbsp;&nbsp;" . $res['sate'] . "<b>" . $q . "</b>&nbsp;&nbsp;" . $res['osebe'] . "</div><hr></div>";
        echo "<div class=container>";
        echo "<div id=gallereya></div>";
        include("form/novogo.php");
        echo "<div id=novogo>";
        $n = pg_query($db_connect, "SELECT id, id_user, poluchatel, text, data, status FROM novogo WHERE poluchatel='{$_SESSION['id']}' ORDER BY id DESC");
        while ($novogo = pg_fetch_array($n)) {
            $id_user = $novogo['id_user'];
            $poluchatel = $novogo['poluchatel'];
            $n_2 = pg_query($db_connect, "SELECT id, name, lastname, avatar FROM users WHERE id='{$novogo['id_user']}'");
            while ($novogo_2 = pg_fetch_array($n_2)) {
                if (!$novogo_2['avatar']) {
                    $novogo_2['avatar'] = "/file/1.jpg width=60 height=60";
                }

                if ($novogo['status'] == 1) {
                    $lm = "Разместил у вас запись";
                }
                echo "<div id=zapisi><div id=lyoudi><p><img src=" . $novogo_2['avatar'] . " align=top>&nbsp;&nbsp;&nbsp;&nbsp;<a href=/index?id=" . $novogo['id_user'] . ">" . $novogo_2['name'] . "&nbsp;&nbsp;" . $novogo_2['lastname'] . "</a>
                 <a class=del_novogo href=/del_novogo?id=" . $novogo['id'] . ">X</a><br>
  <b>&nbsp;&nbsp;&nbsp;&nbsp;" . $novogo['data'] . "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" . $lm . "</b><br><br><br><br><small>" . $novogo['text'] . "</small></p></div></div>";

            }
        }


        echo "</div>";


        echo "</div></div>";

    } else {
        $profile_user = pg_query($db_connect, "SELECT id, name, lastname, country, city, avatar FROM users WHERE id='$id'");
        $r_profile_user = pg_fetch_array($profile_user);
        $query_2 = pg_query($db_connect, "SELECT * FROM profile WHERE id_user='{$r_profile_user['id']}'");
        $result_2 = pg_fetch_array($query_2);

        echo "<div id=popur_messages>";
        include("form/messages.php");
        echo "</div>";
        echo "<div id=hover></div>";
        echo "<div id=header><div class=exit><a href=/exit>Выйти</a></div></div>
             <div id=leftcol>";
        include("html/user_menu.php");
        echo "</div>";
        if (!$r_profile_user['avatar']) {
            $r_profile_user['avatar'] = "/file/1.jpg width=200 height=260";
        }
        echo "";
        echo "<div id=left_container><div id=photo><img src=" . $r_profile_user['avatar'] . "><button id=button>Написать сообщение</button><br>";
        include("form/friends.php");
        echo "</div>";
        echo "<div id=friends_2>";

        $informer_2 = pg_query($db_connect, "SELECT count(id) FROM friends WHERE id_user='{$r_profile_user['id']}' OR id_user_2='$id' AND status='2'");
        $row_2 = pg_fetch_array($informer_2, PGSQL_NUM);
        echo "<b>Друзья&nbsp;&nbsp;&nbsp;" . $row_2[0] . "</b><br><br>";

        $qu_4 = pg_query($db_connect, "SELECT * FROM friends WHERE id_user_2='{$r_profile_user['id']}' AND status='2'");
        while ($ru_4 = pg_fetch_array($qu_4)) {
            $id = $ru_4['id'];
            $id_user = $ru_4['id_user'];
            $id_user_2 = $ru_4['id_user_2'];
            $status = $ru_4['status'];


            $qu_5 = pg_query($db_connect, "SELECT * FROM users WHERE id='$id_user'");
            while ($ru_5 = pg_fetch_array($qu_5)) {
                $id = $ru_5['id'];
                $name = $ru_5['name'];

                $avatar = $ru_5['avatar'];
                if (!$ru_5['avatar']) {
                    $ru_5['avatar'] = "/file/1.jpg width=50 height=50";
                }
                echo "<div id=friends_drug><div class=drug_drug><img src=" . $ru_5['avatar'] . ">&nbsp;<center><small><a href=/index?id=" . $ru_5['id'] . ">" . $ru_5['name'] . "</a></small></center><br></div></div>";


            }
        }

        $qu_8 = pg_query($db_connect, "SELECT * FROM friends WHERE id_user='{$r_profile_user['id']}' AND status='2'");
        while ($ru_8 = pg_fetch_array($qu_8)) {
            $id = $ru_8['id'];
            $id_user = $ru_8['id_user'];
            $id_user_2 = $ru_8['id_user_2'];
            $status = $ru_8['status'];


            $qu_9 = pg_query($db_connect, "SELECT * FROM users WHERE id='$id_user_2'");
            while ($ru_9 = pg_fetch_array($qu_9)) {
                $id = $ru_9['id'];
                $name = $ru_9['name'];

                $avatar = $ru_9['avatar'];
                if (!$ru_9['avatar']) {
                    $ru_9['avatar'] = "/file/1.jpg width=50 height=50";
                }
                echo "<div id=friends_drug><div class=drug_drug><img src=" . $ru_9['avatar'] . ">&nbsp;<center><small><a href=/index?id=" . $ru_9['id'] . ">" . $ru_9['name'] . "</a></small></center><br></div></div>";


            }
        }
        echo "</div></div>";
        echo "<div id=time></div>";
        if ($r_profile_user['city'] != '') $r = "<br>Город:";
        if ($r_profile_user['day'] != '' or $r_profile_user['monday'] != '' or $r_profile_user['year'] != '') $c = "<br>Дата рождения:";
        if ($result_2['polojenie'] != '') $t = "<br>Семейное положение:";
        if ($result_2['sex'] != '') $u = "<br>Пол:";
        if ($result_2['film'] != '') $v = "<br>Любимый фильм:";
        if ($result_2['music'] != '') $w = "<br>Любимая музыка:";
        if ($result_2['tele'] != '') $x = "<br>Любимое телешоу:";
        if ($result_2['book'] != '') $z = "<br>Любимые книги:";

        if ($result_2['game'] != '') $kl = "<br>Любимые игры:";
        if ($result_2['hobbi'] != '') $ln = "<br>Хобби:";
        //if($result_2['phone']!='')$mo="<br>Телефон:";
        if ($result_2['phone_2'] != '') $nu = "<br>дополнительный телефон:";
        if ($result_2['skape'] != '') $op = "<br>Скайп:";
        if ($result_2['sate'] != '') $ps = "<br>Личный сайт:";
        if ($result_2['osebe'] != '') $qr = "<br>О себе:";

        echo "<div id=user_container><div id=inform><h3>" . $r_profile_user['name'] . "&nbsp;&nbsp;" . $r_profile_user['lastname'] . "</h3><hr><b>Страна:</b>&nbsp;&nbsp;" . $r_profile_user['country'] . "<b>" . $r . "</b>&nbsp;&nbsp;
              " . $r_profile_user['city'] . "<b>" . $c . "</b>&nbsp;&nbsp;" . $r_profile_user['day'] . "&nbsp;&nbsp" . $r_profile_user['monday'] . "&nbsp;&nbsp" . $r_profile_user['year'] . "<b>" . $t . "</b>&nbsp;&nbsp;" . $result_2['polojenie'] . "
              <b>" . $u . "</b>&nbsp;&nbsp;" . $result_2['sex'] . "
              
              <h4 class=spoller_title><font color=green><center>Показать еще информацию</center></font></h4>
              <div class=spoller-body><b>" . $v . "</b>&nbsp;&nbsp;" . $result_2['film'] . "<b>" . $w . "</b>&nbsp;&nbsp;" . $result_2['music'] . "<b>" . $x . "</b>&nbsp;&nbsp;" . $result_2['tele'] . "
              <b>" . $z . "</b>&nbsp;&nbsp;" . $result_2['book'] . "<b>" . $kl . "</b>&nbsp;&nbsp;" . $result_2['game'] . "<b>" . $ln . "</b>&nbsp;&nbsp;" . $result_2['hobbi'] . "
              <b>" . $mo . "</b>&nbsp;&nbsp;" . $result_2['phone'] . "<b>" . $nu . "</b>&nbsp;&nbsp;" . $result_2['phone_2'] . "<b>" . $op . "</b>&nbsp;&nbsp;" . $result_2['skape'] . "
              <b>" . $ps . "</b>&nbsp;&nbsp;" . $result_2['sate'] . "<b>" . $qr . "</b>&nbsp;&nbsp;" . $result_2['osebe'] . "</div><hr></div>";
        echo "<div class=container>";
        echo "<div id=gallereya></div>";
        include("form/novogo_2.php");
        echo "<div id=novogo>";

        $n_3 = pg_query($db_connect, "SELECT id, id_user, poluchatel, text, data, status FROM novogo WHERE poluchatel='{$_GET['id']}' ORDER BY id DESC");
        while ($novogo_3 = pg_fetch_array($n_3)) {
            $id = $novogo_3['id'];
            $poluchatel = $novogo_3['poluchatel'];
            $id_user = $novogo_3['id_user'];
            $text = $novogo_3['text'];
            $data = $novogo_3['data'];
            $n_4 = pg_query($db_connect, "SELECT id, name, lastname, avatar FROM users WHERE id='{$novogo_3['id_user']}'");
            while ($novogo_4 = pg_fetch_array($n_4)) {
                if (!$novogo_4['avatar']) {
                    $novogo_4['avatar'] = "/file/1.jpg width=60 height=60";
                }
                if ($novogo_3['status'] == 1) {
                    $lm = "Вы разместили у него запись";
                }
                echo "<div id=zapisi><div id=lyoudi><p><img src=" . $novogo_4['avatar'] . " align=top>&nbsp;&nbsp;&nbsp;&nbsp;<a href=/index?id=" . $novogo_3['id_user'] . ">" . $novogo_4['name'] . "&nbsp;&nbsp;" . $novogo_4['lastname'] . "</a>
                 <br>
  <b>&nbsp;&nbsp;&nbsp;&nbsp;" . $novogo_3['data'] . "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" . $lm . "</b><br><br><br><br><small>" . $novogo_3['text'] . "</small></p></div></div>";

            }
        }
        echo "</div>";
        echo "</div></div>";

    }
}
bottom();
?>