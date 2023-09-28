<?php
$un = $_POST['un'];
$id = $_POST['id'];
$pw = md5($_POST['pw']);

$fn = "USER\\UN\\".$id."_un.txt";
$file = fopen($fn, "w");
fwrite($file, $un);
fclose($file);

$fn = "USER\\ID\\".$id."_id.txt";
$file = fopen($fn, "w");
fwrite($file, $id);
fclose($file);

$fn = "USER\\PW\\".$id."_pw.txt";
$file = fopen($fn, "w");
fwrite($file, $pw);
fclose($file);
echo "
    <html>
    <head>
        <link rel='stylesheet' href='style.css'>
    </head>
    <body>
        <div class='echowrap flex'>
            <p>회원가입에 성공했습니다.</p>
        </div>
        <script>
            setTimeout(function() {
                location.replace('index.html');
            }, 1000);
        </script>
    </body>
    </html>";
    ?>