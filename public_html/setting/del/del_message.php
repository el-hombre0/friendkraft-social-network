<?
if(!$_SESSION['email'] AND !$_SESSION['password']){
    
}else{
     $query=mysql_query("SELECT * FROM users WHERE id='{$_SESSION['id']}'");
    $result=mysql_fetch_array($query);
     $q_2=mysql_query("SELECT * FROM message WHERE id={$_GET['id']} AND poluchatel='{$_SESSION['id']}'");
    $r_2=mysql_fetch_array($q_2);
     $q_4=mysql_query("SELECT * FROM message WHERE id={$_GET['id']} AND author='{$_SESSION['id']}'");
    $r_4=mysql_fetch_array($q_4);
   // $q_3=mysql_query("SELECT * FROM message WHERE author='{$_GET['id']}'");
   // $r_3=mysql_fetch_array($q_3);
}
$id=$_GET['id'];
if(isset($_GET['id'])){
   
        mysql_query("DELETE FROM message WHERE id='{$r_2['id']}'");
        mysql_query("DELETE FROM message WHERE id='{$r_4['id']}'");
   
        
     header('location:' . $_SERVER['HTTP_REFERER']);
    }
    ?>