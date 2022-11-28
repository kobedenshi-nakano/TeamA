<?php

session_start();

require_once '../classes/UserLogic.php';



$err = [];

if(!$email = filter_input(INPUT_POST, 'email')){
    $err['email'] = 'メールアドレスを記入してください';
}

if(!$password = filter_input(INPUT_POST, 'password')){
    $err['password'] = 'パスワードをを記入してください';
}


if (count($err) > 0){
    //エラーがあった場合は戻す
    $_SESSION = $err;
    header('Location: login_form.php');
    return;
}

$result = UserLogic::login($email,$password);

if (!$result) {
    header('Location: login_form.php');
    return;
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>ログイン完了画面</title>
</head>
<body>
    <div class="bg_pattern Diagonal"></div>
<h2>ログイン完了</h2>
    <p>ログインが完了しました</p>
<a href="./mypage.php">マイページへ</a>
</body>
</html>