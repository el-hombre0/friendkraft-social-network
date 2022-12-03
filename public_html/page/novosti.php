<?top("новости");?>
<?
if(!$_SESSION['email'] AND !$_SESSION['password']){
    echo"<meta http-equiv='refresh' content='0, url=/index'>";
}else{
    $q=mysql_query("SELECT * FROM users  WHERE id='{$_SESSION['id']}'");
    $r=mysql_fetch_array($q);
    if($r['name']=='' or $r['lastname']=='' or $r['country']==''){
        include("form/inform_form.php");
    }




        echo"<div id=header>Шапка</div>
  <div id=leftcol>";
        
       include("html/user_menu.php");
       
          echo"</div>
          <div id=novosti>
       новости
          </div>
          <div id=rightcol>
        
          </div>";
   
}
bottom();?>