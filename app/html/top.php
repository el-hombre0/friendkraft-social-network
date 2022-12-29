<?php
//Верхушка страницы
echo "
    <!DOCTYPE html>
    <html lang=\"en\">
        <head>
            <meta charset=\"UTF-8\">
            <meta name=viewport content=\"width=device-width, initial-scale=1.0\">
           
            <!--<script type=text/javascript src= https://code.jquery.com/jquery-1.11.2.js></script>-->
            <script type=text/javascript src=/script/jquery-3.6.1.min.js></script>            
            <script type=\"text/javascript\" src=\"/script/ajaxupload.js\"></script>
            <script type=\"text/javascript\" src=\"/script/js.js\"></script>
            <script type=\"text/javascript\" src=\"/script/password.js\"></script>
            <script type=\"text/javascript\" src=\"/script/messages.js\"></script>
            <script type=\"text/javascript\" src=\"/script/photo.js\"></script>

            
            <link rel=\"stylesheet\" href=\"/css/style.css\">
            <link rel=\"stylesheet\" href=\"/css/novosti.css\">
            <link rel=\"stylesheet\" href=\"/css/user.css\">
            <link rel=\"stylesheet\" href=\"/css/profile.css\">
            <link rel=\"stylesheet\" href=\"/css/messages.css\">
            <link rel=\"stylesheet\" href=\"/css/friends.css\">
            <title>" . $title . "</title>

        </head>
        <body>
";