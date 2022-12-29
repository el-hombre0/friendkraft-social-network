// Скрипт обработки личных сообщений
$(document).ready(function () {


    $("#button").click(function () { // При нажатии на кнопку
        $("#popur_messages").css("display", "block"); // Для отображения всплывающего окна
        $("#popur_messages").show("fast");
        $("#hover").css("display", "block");
    });

    $('#novosti_3').scrollTop(400); // Чтобы сообщения в диалоге не вылезали за пределы контейнера

    $("#submit_mess").click(function (event) { // Обработка простых сообщений
        event.preventDefault();
        var author = $("#author").val(); // Отправитель
        var poluchatel = $("#poluchatel").val(); // Получатель
        var mess = $("#mess").val(); // Текст сообщения

        $.ajax({
            type: "post",
            url: "/action_message", // Обработчик
            data: {
                author: author,
                poluchatel: poluchatel,
                mess: mess

            },
            success: function (data) {
                $(".inform_mess").html(data); // Вывод информации
            }
        });
    });
    $("#submit_5").click(function (event) { // Обработка сообщений диалога
        event.preventDefault();
        var author = $("#author").val();
        var poluchatel = $("#poluchatel").val();
        var textarea = $("#textarea").val();

        $.ajax({
            type: "post",
            url: "/action_messages_2",
            data: {
                author: author,
                poluchatel: poluchatel,
                textarea: textarea

            },
            success: function (data) {
                $("#inform_3").html(data);
            }
        });
    });

});