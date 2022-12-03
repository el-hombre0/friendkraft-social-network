<?
if(isset($_POST)){
    if(empty($_POST['email'])){
        echo"<b><center><font size=4 color=red>Введите ваш E-mail</font></center></b>";
    
    } elseif(!preg_match("/^[a-zA-Z0-9_\.\-]+@([a-zA-Z0-9\-]+\.)+[a-zA-Z]{2,6}$/",$_POST['email'])){
      echo"<b><center><font size=4 color=red>некоректный E-mail, например domain@domain.ru</font></center></b>";
        }
        elseif(empty($_POST['password'])){
        echo"<b><center><font size=4 color=red>Придумайте пароль</font></center></b>";
    }
    elseif(!preg_match("/\A(\w){6,20}\Z/", $_POST['password'])){
         echo"<b><center><font size=4 color=red>Пароль должен быь от 6 до 20 символов</font></center></b>"; 
    }
    elseif(empty($_POST['password_2'])){
        echo"<b><center><font size=4 color=red>Повторите ваш пароль</font></center></b>";
    }
     elseif($_POST['password']!=$_POST['password_2']){
        echo"<b><center><font size=4 color=red>Введеные пароли не совпадают</font></center></b>";
    }else{
        $email=htmlspecialchars($_POST['email']);
        $password=htmlspecialchars($_POST['password']);
        $password_2=htmlspecialchars($_POST['password_2']);
        $data=date("Y-m-d");
        $password=(md5($_POST['password']));
        $ip=$_SERVER['REMOTE_ADDR'];
        $db_connect = pg_connect("host=localhost dbname=postgres port=5432 user=postgres password=password");
        $sql = pg_query($db_connect, "SELECT id FROM users WHERE email='$email'") or die(pg_result_error());
//      $query=("SELECT id FROM users WHERE email='$email'");

//      $sql=mysql_query($query)or die (mysql_error());
        if(pg_num_rows($sql)>0){
            echo"<b><center><font size=4 color=red>пользователь с таким E-mail уже зарегистрированн</font></center></b>";
        }else{
            $q="INSERT INTO users(email, password, data, ip, activation)VALUES('$email','$password', '$data', '$ip', '0')";
            $result=pg_query($q)or die (mysql_error());
            $id_active=pg_fetch_array($activ);
            $activation=md5($id_active['id']);
            $subject="Подтверждение регистрации";
            $message="Здравствуйте, спасибо за регистрацию на сайте RESEPTO.RU \n Ваш E-mail ".$email."\n
            Для того чтобы ввойти в свой аккаунт, его нужно активировать \n чтобы активировать ваш аккаунт,
            перейдите по ссылке: \n http://www.emel84i8.bget.ru/index?email=".$email."&act=".$activation."\n\n
            С уважением администрация сайта RESEPTO.RU ";
            mail($email, $subject, $message, "Content-type:text/plane Charset=utf-8\n\n");
            exit("<b><center><font size=4 color=green>Вы успешно зарегистрировались, на ваш E-mail отправленна ссылка для активации вашего аккаунта!</font></center></b>");
        }
    }
}
?>