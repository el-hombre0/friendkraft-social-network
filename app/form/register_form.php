<!--Форма регистрации-->

<!--Всплывающее окно-->
<div id="popur">
    <div class="popur_top">
        <span>Регистрация</span>
        <a href="">&times;</a>
    </div>
<!--    Регистрация-->
    <div id="register">
        <p>
            Укажите ваш E-mail и пароль.
        </p>
        <br>
        <div id="inform"></div>
        <form action="/action_register" method="post">

            <label for="email"><b>Ваш E-mail</b></label><input type="text" name="email" id="email">
            <br><br>

            <label for="password"><b>Придумайте пароль</b></label><input type="password" name="password" id="password">
            <br><br>

            <label for="password_2"><b>Повторите Ваш пароль</b></label><input type="password" name="password_2" id="password_2">
            <br><br>

            <input type="submit" name="enter" class="submit" value="Зарегистрироваться">
        </form>
    </div>
</div>

<!--Затемнение всплывающего окна-->
<div id="hover">
</div>