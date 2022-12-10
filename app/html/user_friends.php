<?php
if (!$_SESSION['email'] and !$_SESSION['password']) {
} else {
    echo "
        <div class=menu_profile>
            <a href=/friends>Мои друзья</a><br>
            <a href=/friends?drug=podpischiki>Мои подписчики</a>
        </div>
    ";

}
