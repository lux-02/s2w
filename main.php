<?php
$username = $_GET['un'];

echo "
<html>
    <head>
        <title>main page</title>
        <link rel='stylesheet' href='style.css'>
    </head>
    <body>
        <div class='echowrap flex'>
            <p>{$username}님,안녕하세요!</p>
            <a href='logout.php'>로그아웃</a>
        </div>
    </body>
    </html>"
    ?>