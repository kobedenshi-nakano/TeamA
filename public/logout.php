<?php
session_start();
require_once '../classes/UserLogic.php';

if(!$logout = filter_input(INPUT_POST,'logout')){
    exit('不正なリクエスト');
}

$result = UserLogic::checkLogin();

if (!$result){
    exit('セッションが切れましたので、ログインしなおしてください');
}

UserLogic::logout();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>ログアウト</title>
</head>
<body>
    <div class="bg_pattern Diagonal"></div>
    <h2>ログアウト完了</h2>
    <p>ログアウトしました</p>
    <a href="login_form.php">ログイン画面へ</a>
</body>
</html>