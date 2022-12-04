<?
$db_connect = pg_connect("host=localhost dbname=postgres port=5432 user=postgres password=password");
if(!$_SESSION['email'] AND !$_SESSION['password']){
    
}else{
     $query=pg_query($db_connect, "SELECT * FROM users WHERE id='{$_SESSION['id']}'");
    $result=pg_fetch_array($query);
     $q_2=pg_query($db_connect, "SELECT * FROM message WHERE id={$_GET['id']} AND poluchatel='{$_SESSION['id']}'");
    $r_2=pg_fetch_array($q_2);
     $q_4=pg_query($db_connect, "SELECT * FROM message WHERE id={$_GET['id']} AND author='{$_SESSION['id']}'");
    $r_4=pg_fetch_array($q_4);
   // $q_3=pg_query($db_connect, "SELECT * FROM message WHERE author='{$_GET['id']}'");
   // $r_3=pg_fetch_array($q_3);
}
$id=$_GET['id'];
if(isset($_GET['id'])){
   
        pg_query($db_connect, "DELETE FROM message WHERE id='{$r_2['id']}'");
        pg_query($db_connect, "DELETE FROM message WHERE id='{$r_4['id']}'");
   
        
     header('location:' . $_SERVER['HTTP_REFERER']);
    }
    ?>