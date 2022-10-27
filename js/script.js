$(document).ready(function(){
   $("#button").click(function (){
        $("#popur").css("display", "block");
       $("#hover").css("display", "block");
   });
   $(".submit").click(function(event){
       event.preventDefault();
       let email=$("#email").val();
       let password=$("#password").val();
       let password_2=$("#password_2").val();
       $.ajax({
           type:"POST",
           url:"/action_register",
           data:{
               email:email,
               password:password,
               password_2:password_2
           },
           success:function(data){
               $("#inform").html(data);
           }
       });
   });
});