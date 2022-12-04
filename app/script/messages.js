$(document).ready(function(){
     
         
   $("#button").click(function(){
   $("#popur_messages").css("display","block"); 
    $("#popur_messages").show("fast");
      $("#hover").css("display","block");
   });
 
$('#novosti_3').scrollTop(400);

$("#submit_mess").click(function(event){
       event.preventDefault();
       var author=$("#author").val();
       var poluchatel=$("#poluchatel").val();
         var mess=$("#mess").val();
       
       $.ajax({
          type:"post",
          url:"/action_message",
          data:{
              author:author,
              poluchatel:poluchatel,
              mess:mess
           
          },
          success:function(data){
             $(".inform_mess").html(data); 
          }
       });
   });
   $("#submit_5").click(function(event){
       event.preventDefault();
       var author=$("#author").val();
       var poluchatel=$("#poluchatel").val();
         var textarea=$("#textarea").val();
       
       $.ajax({
          type:"post",
          url:"/action_messages_2",
          data:{
              author:author,
              poluchatel:poluchatel,
              textarea:textarea
           
          },
          success:function(data){
             $("#inform_3").html(data); 
          }
       });
   });
    
});