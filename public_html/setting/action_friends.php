<?
if(!$_SESSION['email'] AND !$_SESSION['password']){
    
}else{
    $q=mysql_query("SELECT * FROM users WHERE id='{$_SESSION['id']}'");
    $r=mysql_fetch_array($q);
}
 
    if(isset($_GET)){
                    $id_user_2=$_GET['id_user_2'];
             
        $query_3="INSERT INTO friends(id_user, id_user_2, status)VALUES('{$_SESSION['id']}', '$id_user_2', '1')";
                   $result_3=mysql_query($query_3) or die (mysql_error());    
                   
         echo"<meta http-equiv='refresh' content='0 url=/index?id=".$id_user_2."'>";
}


    
   


?>