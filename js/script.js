$(document).ready(function(){
   $("#button").click(function (){
        $("#popur").css("display", "block");
       $("#hover").css("display", "block");
   });
   $(".submit").click(function(event){
       event.preventDefault(); // обработка и обновление на этой же странице
       let email = $("#email").val();
       let password = $("#password").val();
       let password_2 = $("#password_2").val();
       // запрос, отправляющийся аяксом
       $.ajax({
           type:"POST",
           url:"/action_register", // адрес обработчика
           data:{
               email:email,
               password:password,
               password_2:password_2
           },
           success:function(data){
               $("#inform").html(data); // где будет выводиться информация
           }
       });
   });
});