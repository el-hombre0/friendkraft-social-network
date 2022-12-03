<?top("Люди");?>
<?
if(!$_SESSION['email'] AND !$_SESSION['password']){
    echo"<meta http-equiv='refresh' content='0, url=/index'>";
}else{
    $q=mysql_query("SELECT * FROM users  WHERE id='{$_SESSION['id']}'");
    $r=mysql_fetch_array($q);
   




        echo"<div id=header>Шапка</div>
  <div id=leftcol>";
        
       include("html/user_menu.php");
       
          echo"</div>
          <div id=novosti><div class=lyoudi><h3>Люди</h3><br><br><br><br><hr>";
         
    $q_2=mysql_query("SELECT * FROM users");
    while($r_2=mysql_fetch_array($q_2)){
         if(!$r_2['avatar']){
                 $r_2['avatar']="/file/1.jpg width=200 height=260";
             }
        echo"<div id=lyoudi><p><img src=".$r_2['avatar']." align=top>&nbsp;&nbsp;&nbsp;&nbsp;<a href=/index?id=".$r_2['id'].">".$r_2['name']."&nbsp;&nbsp;".$r_2['lastname']."</a><br>
  <b>&nbsp;&nbsp;&nbsp;&nbsp;".$r_2['country']."&nbsp;&nbsp;".$r_2['city']."</b><br>&nbsp;&nbsp;&nbsp;&nbsp;<a href=mail?act=inbox&id=".$r_2['id'].">Написать сообщение</a></p><br><hr>";
       
        echo"</div>";
    }
         echo"</div></div>
          <div id=rightcol>
        
          </div>";
   
}
bottom();?>