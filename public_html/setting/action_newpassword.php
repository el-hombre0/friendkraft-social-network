<?
$db_connect = pg_connect("host=localhost dbname=postgres port=5432 user=postgres password=password");

if(!$_SESSION['email'] AND !$_SESSION['password']){
    
}else{

    $q=pg_query($db_connect, "SELECT * FROM users WHERE id='{$_SESSION['id']}'");
       $r=pg_fetch_assoc($q);
      
}
if(isset($_POST)){
    if(empty($_POST['password'])){
        echo"<center><font size=4 color=red>Введите старый пароль</font></center>";
    }
     elseif(empty($_POST['npassword'])){
        echo"<center><font size=4 color=red>Придумайте новый пароль</font></center>";
    }
     elseif(empty($_POST['opassword'])){
        echo"<center><font size=4 color=red>Повторите новый пароль</font></center>";
    }
    elseif($_POST['npassword']!=$_POST['opassword']){
            echo"<center><font size=4 color=red>Введенные пароли не совпадают</font></center>";   
    }
    else{
             $password=$_POST['password'];
                $password=md5($password);
       $query=pg_query($db_connect, "SELECT password FROM users WHERE id='{$_SESSION['id']}'");
        $result=pg_fetch_assoc($query);
      if($result['password']!=$password){
                  echo"<center><font size=4 color=red>Старый пароль введен не верно! ВЫ можете востановить пароль, если выйти из аккаунта</font></center>";    

        }else{
       $npassword=$_POST['npassword'];
            $opassword=$_POST['opassword'];
                 $password=$_POST['npassword'];
                 $npassword=md5($password);
                 pg_query($db_connect, "UPDATE users SET password='$npassword' WHERE id='{$_SESSION['id']}'");
                  echo"<center><font size=4 color=green>Пароль успешно изменен</font></center>";   
        }
    }
}
?>