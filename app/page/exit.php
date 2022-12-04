<?
if(!$_SESSION['email'] AND !$_SESSION['password']){
    
}else{
    
unset($_SESSION['email']);
unset($_SESSION['password']);
unset($_SESSION['id']);

exit("<meta http-equiv='Refresh' content='0; URL=/index'>");

}
?>