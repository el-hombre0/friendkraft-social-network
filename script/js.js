$(document).ready(function(){
   $("#button").click(function (){
        $("#popur").css("display", "block");
       $("#hover").css("display", "block");
   });
   $(".submit").click(function(event){ // при нажатии на кнопку подствердить
       event.preventDefault(); // обработка и обновление на этой же странице
       let email = $("#email").val();
       let password = $("#password").val();
       let password_2 = $("#password_2").val();
       // запрос, отправляющийся аяксом
       $.ajax({
           type:"POST",
           url:"../setting/action_register.php", // адрес обработчика
           data:{ // передаваемые переменные
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

$(".submit_2").click(function(event){
    event.preventDefault();
    let email_2 = $("#email_2").val();
    let password_2 = $("#password").val();
    // запрос, отправляющийся аяксом
    $.ajax({
        type:"POST",
        url:"../setting/action_login.php", // адрес обработчика
        data:{ // передаваемые переменные
            email_2:email_2,
            password_3:password_3,
        },
        success:function(data){
            $("#inform_2").html(data); // где будет выводиться информация
        }
    });
});