<?top("Профиль");?>
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
          <div id=novosti>";
 include("form/profile.php");
          echo"</div>
          <div id=rightcol>";
           
       include("html/profile_user.php");
       
          echo"</div>";
   
}
bottom();?>