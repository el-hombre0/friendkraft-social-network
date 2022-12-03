<?top("Мои сообщения");?>
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
          <div id=novosti><div class=messages>";
          
      
               
         
     
          
          
          
          
          
          
          $act=$_GET['act'];
   switch($act){
       default:
               echo"<h3>Диалоги</h3><br><br><br><br><hr>";
            $q_2=mysql_query("SELECT * FROM message WHERE poluchatel='{$r['id']}' ORDER BY id DESC");
               while($r_2=mysql_fetch_array($q_2)){
                     $id=$r_2['id'];
                     $author=$r_2['author'];
                        $poluchatel=$r_2['poluchatel'];
                           $mess=$r_2['mess'];
                            $data=$r_2['data'];
              
                            
                            $q_3=mysql_query("SELECT * FROM users WHERE id='$author'");
               while($r_3=mysql_fetch_array($q_3)){
                   $id=$r_3['id'];
                                $name=$r_3['name'];
                                 $lastname=$r_3['lastname'];
                                  $avatar=$r_3['avatar'];
                                   
                                  if(!$r_3['avatar']){
                 $r_3['avatar']="/file/1.jpg width=60 height=60";
             }
             if($r_2['ready']==0){
                  echo"<div id=act><a class=del href=/del_message?id=".$r_2['id'].">&times;</a>
                 <p><img src=".$r_3['avatar']." align=top><b><a href=/index?id=".$r_3['id'].">".$r_3['name']."&nbsp;&nbsp;".$r_3['lastname']."</a></b><br><br>&nbsp;&nbsp;
                    <a href=mail?act=inbox&id=".$r_3['id']."><font style=background:Silver;>".substr($r_2['mess'], 0,50)."</font></a><br><small>".$r_2['data']."</small><br></p><hr></div>";
             }else{
         
                   echo"<div id=act><a class=del href=/del_message?id=".$r_2['id'].">&times;</a><p><img src=".$r_3['avatar']." align=top><b><a href=/index?id=".$r_3['id'].">".$r_3['name']."&nbsp;&nbsp;".$r_3['lastname']."</a></b><br><br>&nbsp;&nbsp;
                    <a href=mail?act=inbox&id=".$r_3['id'].">".substr($r_2['mess'], 0,50)."</a><br><small>".$r_2['data']."</small><br></p><hr></div>";
               }
               }       
               } 
               
               
               
           
           break;
           
           
           
           case"vxod":
                 $vxod=$_GET['vxod'];
                  echo"<h3>Входящие сообщение</h3><br><br><br><br><hr>";
                  $q_2=mysql_query("SELECT id, author, poluchatel, mess, data, ready FROM message WHERE poluchatel='{$r['id']}' ORDER BY id DESC");
               while($r_2=mysql_fetch_array($q_2)){
                     $id=$r_2['id'];
                     $author=$r_2['author'];
                        $poluchatel=$r_2['poluchatel'];
                           $mess=$r_2['mess'];
                            $data=$r_2['data'];
              $ready=$r_2['ready'];
                            
                            $q_3=mysql_query("SELECT * FROM users WHERE id='$author'");
               while($r_3=mysql_fetch_array($q_3)){
                   $id=$r_3['id'];
                                $name=$r_3['name'];
                                 $lastname=$r_3['lastname'];
                                  $avatar=$r_3['avatar'];
                                   
                                  if(!$r_3['avatar']){
                 $r_3['avatar']="/file/1.jpg width=60 height=60";
             }
             if($ready==0){
              echo"<div id=act><a class=del href=/del_message?id=".$r_2['id'].">&times;</a><p><img src=".$r_3['avatar']." align=top><b><a href=/index?id=".$r_3['id'].">".$r_3['name']."&nbsp;&nbsp;".$r_3['lastname']."</a></b><br><br>&nbsp;&nbsp;
                    <a href=mail?act=inbox&id=".$r_3['id']."><font style=background:Silver;>".substr($r_2['mess'], 0,50)."</font></a><br><small>".$r_2['data']."</small><br></p><hr></div>";
             }else{
                   echo"<div id=act><a class=del href=/del_message?id=".$r_2['id'].">&times;</a><p><img src=".$r_3['avatar']." align=top><b><a href=/index?id=".$r_3['id'].">".$r_3['name']."&nbsp;&nbsp;".$r_3['lastname']."</a></b><br><br>&nbsp;&nbsp;
                    <a href=mail?act=inbox&id=".$r_3['id'].">".substr($r_2['mess'], 0,50)."</a><br><small>".$r_2['data']."</small><br></p><hr></div>";
             }
               }
                        
               } 
                 break;
                 
                  case"isxod":
                 $isxod=$_GET['isxod'];
                    echo"<h3>Исходящие сообщение</h3><br><br><br><br><hr>";
                 $q_4=mysql_query("SELECT * FROM message WHERE author='{$r['id']}' ORDER BY id DESC");
               while($r_4=mysql_fetch_array($q_4)){
                     $id=$r_4['id'];
                     $author=$r_4['author'];
                        $poluchatel=$r_4['poluchatel'];
                           $mess=$r_4['mess'];
                            $data=$r_4['data'];
              
                            
                            $q_5=mysql_query("SELECT * FROM users WHERE id='$author'");
               while($r_5=mysql_fetch_array($q_5)){
                   $id=$r_5['id'];
                                $name=$r_5['name'];
                                 $lastname=$r_5['lastname'];
                                  $avatar=$r_5['avatar'];
                                   
                                  if(!$r_5['avatar']){
                 $r_5['avatar']="/file/1.jpg width=60 height=60";
             }
          
           
          if($r_4['ready']==0){
                   echo"<div id=act><a class=del href=/del_message?id=".$r_4['id'].">&times;</a><p><img src=".$r_5['avatar']." align=top><b><a href=/index?id=".$r_5['id'].">".$r_5['name']."&nbsp;&nbsp;".$r_5['lastname']."</a></b><br><br>&nbsp;&nbsp;
                    <a href=mail?act=inbox&id=".$r_4['id']."><font style=background:Silver;>".substr($r_4['mess'], 0,50)."</font></a><br><small>".$r_4['data']."</small><br></p><hr></div>";
          }else{
               echo"<div id=act><a class=del href=/del_message?id=".$r_4['id'].">&times;</a><p><img src=".$r_5['avatar']." align=top><b><a href=/index?id=".$r_5['id'].">".$r_5['name']."&nbsp;&nbsp;".$r_5['lastname']."</a></b><br><br>&nbsp;&nbsp;
                    <a href=mail?act=inbox&id=".$r_4['id'].">".substr($r_4['mess'], 0,50)."</a><br><small>".$r_4['data']."</small><br></p><hr></div>";   
          }
               }        
               }
               break;
               
                case"read_1":
                 $read_1=$_GET['read_1'];
                    echo"<h3>Прочитанные сообщение</h3><br><br><br><br><hr>";
                  $q_6=mysql_query("SELECT * FROM message WHERE poluchatel='{$r['id']}' AND ready='1' ORDER BY id DESC");
               while($r_6=mysql_fetch_array($q_6)){
                     $id=$r_6['id'];
                     $author=$r_6['author'];
                        $poluchatel=$r_6['poluchatel'];
                           $mess=$r_6['mess'];
                            $data=$r_6['data'];
              
                            
                            $q_7=mysql_query("SELECT * FROM users WHERE id='$author'");
               while($r_7=mysql_fetch_array($q_7)){
                   $id=$r_7['id'];
                                $name=$r_7['name'];
                                 $lastname=$r_7['lastname'];
                                  $avatar=$r_7['avatar'];
                                   
                                  if(!$r_7['avatar']){
                 $r_7['avatar']="/file/1.jpg width=60 height=60";
             }
                   echo"<div id=act><a class=del href=/del_message?id=".$r_6['id'].">&times;</a><p><img src=".$r_7['avatar']." align=top><b><a href=/index?id=".$r_7['id'].">".$r_7['name']."&nbsp;&nbsp;".$r_7['lastname']."</a></b><br><br>&nbsp;&nbsp;
                    <a href=mail?act=inbox&id=".$r_6['id'].">".substr($r_6['mess'], 0,50)."</a><br><small>".$r_6['data']."</small><br></p><hr></div>";
               }
                        
               } 
               break;
               
                case"read_0":
                 $read_0=$_GET['read_0'];
                    echo"<h3>Не прочитанные сообщение</h3><br><br><br><br><hr>";
                  $q_8=mysql_query("SELECT * FROM message WHERE poluchatel='{$r['id']}' AND ready='0' ORDER BY id DESC");
               while($r_8=mysql_fetch_array($q_8)){
                     $id=$r_8['id'];
                     $author=$r_8['author'];
                        $poluchatel=$r_8['poluchatel'];
                           $mess=$r_8['mess'];
                            $data=$r_8['data'];
              
                            
                            $q_9=mysql_query("SELECT * FROM users WHERE id='$author'");
               while($r_9=mysql_fetch_array($q_9)){
                   $id=$r_9['id'];
                                $name=$r_9['name'];
                                 $lastname=$r_9['lastname'];
                                  $avatar=$r_9['avatar'];
                                   
                                  if(!$r_9['avatar']){
                 $r_9['avatar']="/file/1.jpg width=60 height=60";
             }
    
                   echo"<div id=act><a class=del href=/del_message?id=".$r_8['id'].">&times;</a><p><img src=".$r_9['avatar']." align=top><b><a href=/index?id=".$r_9['id'].">".$r_9['name']."&nbsp;&nbsp;".$r_9['lastname']."</a></b><br><br>&nbsp;&nbsp;
                     <a href=mail?act=inbox&id=".$r_8['id']."><font style=background:Silver;>".substr($r_8['mess'], 0,50)."</font></a><br><small>".$r_8['data']."</small><br></p><hr></div>";
           
                  
               
               }
                        
               } 
               
                   break;
                
               case"inbox":
                   $inbox=$_GET['inbox'];
                   if(isset($_GET['id'])){
                     $id=$_GET['id'];
             $s=mysql_query("SELECT * FROM message WHERE poluchatel='{$_SESSION['id']}'");
             $su=mysql_fetch_array($s);
                   $query_2=mysql_query("SELECT * FROM users WHERE id='{$_GET['id']}'");
                   $result_2=mysql_fetch_array($query_2);
                 if($su['poluchatel']==$_SESSION['id']){
               mysql_query("UPDATE message SET ready='1' WHERE author='{$_GET['id']}' AND poluchatel='{$r['id']}'");
                mysql_query("UPDATE message SET ready='1' WHERE poluchatel='{$_GET['id']}' AND author='{$r['id']}'");
                   
                 }
                   }
               //{
               echo"<div id=novosti_3>";
              // if(isset($_GET['id'])){
                   //$id=$_GET['id'];
                $qur=mysql_query("SELECT * FROM dialog WHERE poluchatel='{$_SESSION['id']}' AND author='{$_GET['id']}' OR poluchatel='{$_GET['id']}' AND author='{$_SESSION['id']}'");
               while($ru=mysql_fetch_array($qur)){
                   $author=$ru['author'];
                         $poluchatel=$ru['poluchatel'];
                         $mess=$ru['mess'];
                         $data=$ru['data'];
                $qu_2=mysql_query("SELECT * FROM users WHERE id='$author'");
                while($res_2=mysql_fetch_array($qu_2)){
                    $avatar=$res_2['avatar'];
                      if(!$res_2['avatar']){
                 $res_2['avatar']="/file/1.jpg width=60 height=60";
             }
               echo"<div id=act_2><p><img src=".$res_2['avatar']." align=top><b><a href=/index?id=".$res_2['id'].">".$res_2['name']."&nbsp;&nbsp;".$res_2['lastname']."</a><small>".$ru['data']."</small></b><br><br>&nbsp;&nbsp;
                     ".$ru['mess']."<br></p></div>";
               }
               }
               //}
           echo"</div>";
             
             
          
               echo"<br><hr><div id=text_mess><div id=inform_3></div>
               <form action=/action_messages_2 method=post>
                <input type=hidden id=poluchatel name=poluchatel value=".$su['author'].">
               <textarea id=textarea name=textarea placeholder='Введите текст сообщения'></textarea><br>
               <input type=submit id=submit_5 value=Отправить>
              
              
               </form>
               </div>";
               break;
   }
 
          echo"</div></div>";
         echo" <div id=rightcol>";
            include("html/users_mess.php");
          echo"</div>";
   
}
?>

<? bottom();
?>