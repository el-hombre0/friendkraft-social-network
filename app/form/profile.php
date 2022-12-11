<?php
$db_connect = pg_connect("host=localhost dbname=postgres port=5432 user=postgres password=password");
if (!$_SESSION['email'] and !$_SESSION['password']) {
} else {
    $q = pg_query($db_connect, "SELECT * FROM users WHERE id='{$_SESSION['id']}'");
    $r = pg_fetch_array($q);
    $country = $r['country'];
    $q_2 = pg_query($db_connect, "SELECT * FROM profile WHERE id_user='{$_SESSION['id']}'");
    $r_2 = pg_fetch_array($q_2);
}
$p = $_GET['p'];
switch ($p) {
    default:
    case"osnovnoe";
        echo "
        <div id=profile>
            <div class=profile>
                <p>Основное:</p>
                <hr>
                <br>
                <b>" . $_SESSION['profile'] . "</b>
        ";
        unset($_SESSION['profile']);
        echo "
                <br>
                <form action=/action_edit  method=post>
                    <b>Имя:</b>
                    <input type=text name=name id=name value=" . $r['name'] . " disabled>
                    <br><br>
                    
                    <b>Фамилия:</b>
                    <input type=text name=lastname id=lastname value=" . $r['lastname'] . " disabled>
                    <br><br>
                    
                    <b>Страна:</b>
                    <select id=country name=country>
                        <option>" . $r['country'] . "</option>
                        <option value=Россия>Россия</option>
                        <option value=Сша>Сша</option>
                        <option value=Китай>Китай</option>
                        <option value=Украина>Украина</option>
                    </select>
                    <br><br>
                    
                    <b>Город:</b>
                    <input type=text name=city id=city value=" . $r['city'] . " ><br>
                    <br>
                    
                    <b>Семейное положение:</b>
                    <select id=polojenie name=polojenie>
                        <option>" . $r_2['polojenie'] . "</option>
                        <option>Не женат</option>
                        <option>Встречаюсь</option>
                        <option>Помолвлен</option>
                        <option>Женат(замужем)</option>
                        <option>В гражданском браке</option>
                        <option>В люблен(на)</option>
                        <option>В активном поиске</option>
                        <option>Все сложно</option>
                    </select>
                    <br><br>
                    
                    <b>Пол:</b>
                    <select id=sex name=sex>
                        <option>" . $r_2['sex'] . "</option>
                        <option>Мужской</option>
                        <option>Женский</option>
                        <option>Небинарная персона</option>
                    </select>
                    <br><br>
                    
                    <b>Дата рождения:</b>
                    <select name=day id=day>
                        <option>" . $r_2['day'] . "</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                        <option>6</option>
                        <option>7</option>
                        <option>8</option>
                        <option>9</option>
                        <option>10</option>
                        <option>11</option>
                        <option>12</option>
                        <option>13</option>
                        <option>14</option>
                        <option>15</option>
                        <option>16</option>
                        <option>17</option>
                        <option>18</option>
                        <option>19</option>
                        <option>20</option>
                        <option>21</option>
                        <option>22</option>
                        <option>23</option>
                        <option>24</option>
                        <option>25</option>
                        <option>26</option>
                        <option>27</option>
                        <option>28</option>
                        <option>29</option>
                        <option>30</option>
                        <option>31</option>
                    </select>
                    
                    <select id=monday name=monday>
                        <option>" . $r_2['monday'] . "</option>
                        <option>Января</option>
                        <option>Февраля</option>
                        <option>Марта</option>
                        <option>Апреля</option>
                        <option>Мая</option>
                        <option>Июня</option>
                        <option>Июля</option>
                        <option>Августа</option>
                        <option>Сентября</option>
                        <option>Октября</option>
                        <option>Ноября</option>
                        <option>Декабря</option>
                    </select>
                    
                    <select id=year name=year>
                        <option>" . $r_2['year'] . "</option>
                        <option>2004</option>
                        <option>2003</option>
                        <option>2002</option>
                        <option>2001</option>
                        <option>2000</option>
                        <option>1999</option>
                        <option>1998</option>
                        <option>1997</option>
                        <option>1996</option>
                        <option>1995</option>
                        <option>1994</option>
                        <option>1993</option>
                        <option>1992</option>
                        <option>1991</option>
                        <option>1990</option>
                        <option>1989</option>
                        <option>1988</option>
                        <option>1987</option>
                        <option>1986</option>
                        <option>1985</option>
                        <option>1984</option>
                        <option>1983</option>
                        <option>1982</option>
                        <option>1981</option>
                        <option>1980</option>
                        <option>1979</option>
                        <option>1978</option>
                        <option>1977</option>
                        <option>1976</option>
                        <option>1975</option>
                        <option>1974</option>
                        <option>1973</option>
                        <option>1972</option>
                        <option>1971</option>
                        <option>1970</option>
                        <option>1969</option>
                        <option>1968</option>
                        <option>1967</option>
                        <option>1966</option>
                        <option>1965</option>
                        <option>1964</option>
                        <option>1963</option>
                        <option>1962</option>
                        <option>1961</option>
                        <option>1960</option>
                        <option>1959</option>
                        <option>1958</option>
                        <option>1957</option>
                        <option>1956</option>
                        <option>1955</option>
                        <option>1954</option>
                        <option>1953</option>
                        <option>1952</option>
                        <option>1951</option>
                        <option>1950</option>
                    </select>
                    <br><br>
                    <hr>
                    <input type=submit id=submit name=enter value=Сохранить>
                    <br><br><br>
                </form>
            </div>
        </div>
        ";
        break;


    case"interes":
        $interes = $_GET['interes'];
        echo "
        <div id=profile>
            <div class=profile>
                <p>Интересы:</p>
                <hr>
                <br>
                <b>" . $_SESSION['profile'] . "</b>
        ";

        unset($_SESSION['profile']);
        echo "
                <br>
                <form action=/action_edit method=post>
                    <span>Любимый фильм</span>
                    <br><br>
                    <textarea name=film id=film>" . $r_2['film'] . "</textarea>
                    <br><br>
                    
                    <br><span>Любимая музыка</span>
                    <br><br>
                    <textarea name=music id=music>" . $r_2['music'] . "</textarea>
                    <br><br><br>
                    
                    <span>Любимое телешоу</span>
                    <br><br>
                    <textarea name=tele id=tele>" . $r_2['tele'] . "</textarea>
                    <br><br><br>
                    
                    <span>Любимые книги</span>
                    <br><br>
                    <textarea name=book id=book>" . $r_2['book'] . "</textarea>
                    <br><br><br>
                    
                    <span>Любимые игры</span>
                    <br><br>
                    <textarea name=game id=game>" . $r_2['game'] . "</textarea>
                    <br><br><br>
                    
                    <span>Хобби</span>
                    <br><br>
                    <textarea name=hobbi id=hobbi>" . $r_2['hobbi'] . "</textarea>
                    <br><br><br>
                    
                    <span>О себе</span>
                    <br><br>
                    <textarea name=osebe id=osebe>" . $r_2['osebe'] . "</textarea>
                    <br><br><br><br><br><br>
                    <hr>
                    
                    <input type=submit id=submit_2 name=enter_2 value=Сохранить>
                    <br><br><br>
                </form>
            </div>
        </div>
        ";
        break;


    case"kontakt":
        $kontakt = $_GET['kontakt'];
        echo "
        <div id=profile>
            <div class=profile>
                <p>Контакты:</p>
                <hr>
                <br>
                <b>" . $_SESSION['profile'] . "</b>
        ";

        unset($_SESSION['profile']);
        echo "
                <br> 
                <form action=/action_edit method=post>
                    <b>E-mail</b>
                    <input type=text name=email id=email value=" . $r['email'] . " disabled>
                    <br><br>
                    
                    <b>Мобильный телефон</b>
                    <input type=text name=phone id=phone  value=" . $r_2['phone'] . ">
                    <br><br>
                    
                    <b>Дополнительный телефон</b>
                    <input type=text name=phone_2 id=phone_2  value=" . $r_2['phone_2'] . ">
                    <br><br>
                    
                    <b>Скайп</b>
                    <input type=text name=skape id=skape  value=" . $r_2['skape'] . ">
                    <br><br>
                    
                    <b>Личный сайт</b>
                    <input type=text name=sate id=sate  value=" . $r_2['sate'] . ">
                    <br><br>
                    <hr>
                    
                    <input type=submit id=submit_3 name=enter_3 value=Сохранить>
                    <br><br><br>
                </form>
            </div>
        </div>
        ";
        break;


    case"password":
    $password = $_GET['password'];
    echo "
    <div id=profile>
        <div class=profile>
            <p>Редактирование пароля:</p>
            <hr>
            <br>
            <div id=pass></div>
    ";

    echo "
            <br> 
            <form action=/action_newpassword method=post>
                <b>Введите старый пароль</b>
                <input type=password  class=password name=password>
                <br><br>
                
                <b>Придумайте новый пароль</b>
                <input type=password  id=npassword>
                <br><br>
                
                <b>Повторите пароль</b>
                <input type=password id=opassword>
                <br><br><hr>
                
                <input type=submit id=submit_4 value='Сохранить пароль'>
                <br><br><br>
                
            </form>
        </div>
    </div>
    ";
        break;
}