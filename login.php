<?php
session_start();

$id = $_POST['id'];
$pw = md5($_POST['pw']);
$ip = $_SERVER['REMOTE_ADDR'];



if (isset($_SESSION['user_id'])) {
    header("Location: main.php?un={$_SESSION['user_nm']}");
    exit();
}

if (file_exists("USER\\ID\\".$id."_id.txt")){
    $validId = trim(file_get_contents("USER\\ID\\".$id."_id.txt"));
    $validPassword = trim(file_get_contents("USER\\PW\\".$id."_pw.txt"));

    if ($id == $validId && $pw == $validPassword){
        $username = trim(file_get_contents("USER\\UN\\".$id."_un.txt"));
        if (isset($_POST['session'])) {
            echo "chekced";
            $_SESSION['user_id'] = $id;
            $_SESSION['user_nm'] = $username;
        }
        echo "
    <html>
    <head>
        <link rel='stylesheet' href='style.css'>
    </head>
    <body>
        <div class='echowrap flex'>
            <p>로그인 성공!</p>
        </div>
        <script>
            setTimeout(function() {
                location.replace('main.php?un={$username}');
            }, 1000);
        </script>
    </body>
    </html>";
    } 

} else {
    $log = fopen("log.txt", "a");
    fwrite($log, $ip.', '.$id.', '.$pw."\n");
    fclose($log);
    
    echo "
    <html>
    <head>
        <link rel='stylesheet' href='style.css'>
    </head>
    <body>
        <div class='echowrap flex'>
            <p>로그인에 실패했습니다.</p>
        </div>
        <script>
            setTimeout(function() {
                location.replace('index.html');
            }, 1000);
        </script>
    </body>
    </html>";
}
?>
