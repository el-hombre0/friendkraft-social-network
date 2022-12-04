$(document).ready(function(){
       $("#popur_top").css("display","block"); 
         
   $("#button").click(function(){
   $("#popur").css("display","block"); 
      $("#hover").css("display","block");
   });
   
   $(".spoller-body").hide();
   $(".spoller_title").click(function(){
       $(this).next().slideToggle();
   });
   $(".submit").click(function(event){
       event.preventDefault();
       var email=$("#email").val();
       var password=$("#password").val();
       var password_2=$("#password_2").val();
       $.ajax({
          type:"post",
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
   $(".submit_2").click(function(event){
       event.preventDefault();
       var email_2=$("#email_2").val();
       var password_3=$("#password_3").val();
       
       $.ajax({
          type:"post",
          url:"/action_login",
          data:{
              email_2:email_2,
              password_3:password_3
           
          },
          success:function(data){
             $("#inform_2").html(data); 
          }
       });
   });
   
    $(".submit_3").click(function(event){
       event.preventDefault();
       var name=$("#name").val();
            var lastname=$("#lastname").val();
                  var country=$("#country").val();
                        var city=$("#city").val();
       
       $.ajax({
          type:"post",
          url:"/action_inform",
          data:{
              name:name,
              lastname:lastname,
              country:country,
              city:city
              
           
          },
          success:function(data){
             $("#inform_3").html(data); 
          }
       });
   });
    $("#button_2").click(function(event){
       event.preventDefault();
       var id_user=$("#id_user").val();
            var id_user_2=$("#id_user_2").val();   
       
       $.ajax({
          type:"get",
          url:"/action_friends",
          data:{
              id_user:id_user,
           id_user_2:id_user_2
              
           
          },
          success:function(data){
             $("#time").html(data); 
          }
       });
   });


$(".enter").click(function(event){
       event.preventDefault();
      var input=$(".input").val();
         
       
       $.ajax({
          type:"post",
          url:"/action_novogo",
          data:{
              input:input
   
              
           
          },
          success:function(data){
        
             location.reload();
          }
       });
   });
   
   
   $(".enter_2").click(function(event){
       event.preventDefault();
       var input_2=$(".input_2").val();
          var poluchatel=$("#poluchatel").val();
       
       $.ajax({
          type:"post",
          url:"/action_novogo",
          data:{
              input_2:input_2,
              poluchatel:poluchatel
   
              
           
          },
          success:function(data){
           $("#time_2").html(data); 
             location.reload();
          }
       });
   });
});