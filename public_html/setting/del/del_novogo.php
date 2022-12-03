<?
if(!$_SESSION['email'] AND !$_SESSION['password']){
    
}else{
     $query=mysql_query("SELECT * FROM users WHERE id='{$_SESSION['id']}'");
    $result=mysql_fetch_array($query);
     $q_2=mysql_query("SELECT * FROM novogo WHERE id_user='{$_SESSION['id']}'");
    $r_2=mysql_fetch_array($q_2);
    
}
$id=$_GET['id'];
if(isset($_GET['id'])){
   
        mysql_query("DELETE FROM novogo WHERE id='$id' AND poluchatel='{$_SESSION['id']}'");
   
   
        
     header('location:' . $_SERVER['HTTP_REFERER']);
    }
    ?>