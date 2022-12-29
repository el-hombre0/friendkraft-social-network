<?php
//Страница с друзьями
top("Мои друзья");
?>

<?php
$db_connect = pg_connect("host=localhost dbname=postgres port=5432 user=postgres password=password");

if (!$_SESSION['email'] and !$_SESSION['password']) {
    echo "<meta http-equiv='refresh' content='0, url=/index'>";
} else {
    $query = pg_query($db_connect, "SELECT * FROM users WHERE id='{$_SESSION['id']}'");
    $result = pg_fetch_array($query);

    echo "
    <div id=header>Friendkraft</div>
        <div id=leftcol>
    ";

    include("html/user_menu.php");

    echo "
        </div>
        <div id=novosti>
          ";
    $drug = $_GET['drug'];
    switch ($drug) {
        default: // Еще не в друзьях - отправить заявку на добавление в друзья
            $q = pg_query($db_connect, "SELECT * FROM friends 
            WHERE id_user_2='{$_SESSION['id']}' AND status='1'"); // Отправлена заявка (статус 1)
            while ($r = pg_fetch_array($q)) {
                $id = $r['id'];
                $id_user = $r['id_user'];
                $id_user_2 = $r['id_user_2'];
                $status = $r['status'];

                $q_1 = pg_query($db_connect, "SELECT * FROM users WHERE id='$id_user'");
                while ($r_1 = pg_fetch_array($q_1)) {
                    $id = $r_1['id'];
                    $name = $r_1['name'];
                    $lastname = $r_1['lastname'];
                    $avatar = $r_1['avatar'];

                    if (!$r_1['avatar']) {
                        $r_1['avatar'] = "/file/1.jpg width=60 height=60";
                    }

                    echo "
                    <div id=zayavka>
                        <div id=act>
                        <p>
                            <img src=" . $r_1['avatar'] . "  alt=\"Аватар\">
                            <b><a href=/index?id=" . $r_1['id'] . ">" . $r_1['name'] . "&nbsp;&nbsp;" .
                            $r_1['lastname'] . "</a>
                            <br>
                            Отправить заявку на добавление в друзья</b>
                        </p>
                        <br><br><br>
                        <code>
                            <a href=friends?drug=prin&id=" . $r['id'] . ">Принять</a>
                            &nbsp;&nbsp;
                            <a href=friends?drug=show&id=" . $r['id'] . ">Отклонить</a>
                        </code>
                        </div>
                    </div>
                    ";
                }
            }
            echo "<br>";
            echo "<div id=zayavka><b>Мои друзья</b><hr>";
            $q_2 = pg_query($db_connect, "SELECT * FROM friends 
            WHERE id_user_2='{$_SESSION['id']}' AND status='2'"); // Заявка одобрена (статус 2)
            while ($r_2 = pg_fetch_array($q_2)) {
                $id = $r_2['id'];
                $id_user = $r_2['id_user'];
                $id_user_2 = $r_2['id_user_2'];
                $status = $r_2['status'];


                $q_3 = pg_query($db_connect, "SELECT * FROM users WHERE id='$id_user'");
                while ($r_3 = pg_fetch_array($q_3)) {
                    $id = $r_3['id'];
                    $name = $r_3['name'];
                    $lastname = $r_3['lastname'];
                    $avatar = $r_3['avatar'];

                    if (!$r_3['avatar']) {
                        $r_3['avatar'] = "/file/1.jpg width=60 height=60";
                    }

                    echo "
                    <div id=act>
                        <p>
                            <img src=" . $r_3['avatar'] . " alt=\"Аватар\">
                            <b><a href=/index?id=" . $r_3['id'] . ">" . $r_3['name'] . "&nbsp;&nbsp;" .
                            $r_3['lastname'] . "</a>
                            <br>
                            <a href=mail?act=inbox&id=" . $r_3['id'] . ">Написать сообщение</a>
                            </p>
                        <br><br><br>
                    </div>
                    <br><br><br>
                    ";
                }
            }


            $qu_2 = pg_query($db_connect, "SELECT * FROM friends 
            WHERE id_user='{$_SESSION['id']}' AND status='2'");
            while ($ru_2 = pg_fetch_array($qu_2)) {
                $id = $r_2['id'];
                $id_user = $ru_2['id_user'];
                $id_user_2 = $ru_2['id_user_2'];
                $status = $ru_2['status'];

                $qu_3 = pg_query($db_connect, "SELECT * FROM users WHERE id='$id_user_2'");
                while ($ru_3 = pg_fetch_array($qu_3)) {
                    $id = $ru_3['id'];
                    $name = $ru_3['name'];
                    $lastname = $ru_3['lastname'];
                    $avatar = $ru_3['avatar'];

                    if (!$ru_3['avatar']) {
                        $ru_3['avatar'] = "/file/1.jpg width=60 height=60";
                    }

                    echo "
                    <div id=act>
                        <p>
                            <img src=" . $ru_3['avatar'] . " alt=\"Аватар\">
                            <b><a href=/index?id=" . $ru_3['id'] . ">" . $ru_3['name'] . "&nbsp;&nbsp;" .
                            $ru_3['lastname'] . "</a>
                            <br>
                            <a href=mail?act=inbox&id=" . $ru_3['id'] . ">Написать сообщение</a>
                        </p>
                        <br><br><br>
                    </div>
                    <br><br><br>
                    ";
                }
            }
            echo "</div>";
            break;


        case "show": // Кнопка отправить в подписчики (статус 3)
            $show = $_GET['show'];
            if (isset($_GET['id'])) {
                $q_4 = pg_query($db_connect, "SELECT * FROM friends WHERE id='$id'");
                $r_4 = pg_fetch_array($q_4);
                pg_query($db_connect, "UPDATE friends SET status='3' WHERE id='{$_GET['id']}'");
                echo "<meta http-equiv='refresh' content='0 url=/friends'>";
            }
            break;


        case "prin": // Кнопка принять в друзья
            $prin = $_GET['prin'];
            if (isset($_GET['id'])) {
                $q_4 = pg_query($db_connect, "SELECT * FROM friends WHERE id='$id'");
                $r_4 = pg_fetch_array($q_4);
                pg_query($db_connect, "UPDATE friends SET status='2' WHERE id='{$_GET['id']}'");
                echo "<meta http-equiv='refresh' content='0 url=/friends'>";
            }
            break;


        case"podpischiki": // Вывод подписчиков
            $podpischiki = $_GET['podpischiki'];

            echo "<div id=zayavka><b>Мои подписчики</b><hr>";
            $q_5 = pg_query($db_connect, "SELECT * FROM friends 
            WHERE id_user_2='{$_SESSION['id']}' AND status='3'");
            while ($r_5 = pg_fetch_array($q_5)) {
                $id = $r_5['id'];
                $id_user = $r_5['id_user'];
                $id_user_2 = $r_5['id_user_2'];
                $status = $r_5['status'];

                $q_6 = pg_query($db_connect, "SELECT * FROM users WHERE id='$id_user'");
                while ($r_6 = pg_fetch_array($q_6)) {
                    $id = $r_6['id'];
                    $name = $r_6['name'];
                    $lastname = $r_6['lastname'];
                    $avatar = $r_6['avatar'];

                    if (!$r_6['avatar']) {
                        $r_6['avatar'] = "/file/1.jpg width=60 height=60";
                    }

                    echo "
                    <div id=act>
                        <p>
                            <img src=" . $r_6['avatar'] . " alt=\"Аватар\">
                            <b><a href=/index?id=" . $r_6['id'] . ">" . $r_6['name'] . "&nbsp;&nbsp;" .
                            $r_6['lastname'] . "</a>
                            <br>
                            <a href=friends?drug=prin&id=" . $r_5['id'] . ">Добавить в друзья</a>
                            &nbsp;&nbsp;&nbsp;&nbsp;
                            <a href=/del_friends?id=" . $r_5['id'] . ">Удалить</a>
                        </p>
                        <br><br><br>
                    </div>
                    <br><br><br>
                    ";
                }
            }
            echo "</div>";
            break;
    }

    echo "
        </div>
    <div id=rightcol>
    ";
    include("html/user_friends.php");
    echo "</div>";
}
bottom();
?>