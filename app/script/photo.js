$(document).ready(function () {
    $("#button").click(function () {
        $("#popur_photo").show("fast");
        $("#popur_photo").css("display", "block");
        $("#hover").css("display", "block");
    });


    var button = $("#butUpload"), interval, file;
    new AjaxUpload(button, {

        action: "/action_photo",
        data: {file: file},
        name: "userfile",
        onSubmit: function (file, ext) { //расширение файла
            if (!(ext && /^(jpg|png|Jpeg|gif|)$/i.test(ext))) {
                alert("Ошибка! Допустимые разрешение: jpg, png, jpeg, gif");
                return false;
            }
            button.text("Загрузка");
            this.disable();
            interval = setInterval(function () {
                var text = button.text();//Получаем текст кнопки
                if (text.length < 11) {
                    button.text(text + ".");
                } else {
                    button.text("Загрузка");
                }
            }, 300);
        },
        onComplete: function (file, response) { //2 параметра имя файла и результат от сервера
            button.text("Загрузка завершена");
            setInterval(function () {
                location.reload();
            }, 1000);
            window.clearInterval(interval);
            console.log(file);
            response = JSON.parse(response);
            $("#filesUpload").append(response.answer).html('<br><img src="/file/' + response.file +
                '" alt="" width="160" height="200" /><br />' + response.file +
                "<br>Страница будет перезагружена через 3 сек.<meta http-equiv='refresh' content='5' >");

        }
    });
});