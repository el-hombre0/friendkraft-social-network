$(document).ready(function(){
$(".submit_pass").click(function(event){
       event.preventDefault();
       var email=$("#email").val();
       
      
       $.ajax({
          type:"post",
          url:"/action_password",
          data:{
              email:email
            
            
          },
          success:function(data){
             $("#pass").html(data); 
          }
       });
   });
   
  
$("#submit_4").click(function(event){
       event.preventDefault();
       var password=$(".password").val();
           var npassword=$("#npassword").val();
               var opassword=$("#opassword").val();
       
      
       $.ajax({
          type:"post",
          url:"/action_newpassword",
          data:{
              password:password,
               npassword:npassword,
                opassword:opassword
            
            
          },
          success:function(data){
             $("#pass").html(data); 
          }
       });
   });
  
});