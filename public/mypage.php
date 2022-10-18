<?php
session_start();

require_once '../classes/UserLogic.php';
require_once '../function.php';

$result = UserLogic::checkLogin();

$err = [];

if(!$email = filter_input(INPUT_POST, 'email')){
    $err['email'] = 'メールアドレスを記入してください';
}

if(!$password = filter_input(INPUT_POST, 'password')){
    $err['password'] = 'パスワードを記入してください';
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
/*ここから新規登録*/
/**$result = UserLogic::checkLogin();

if (!$result){
    $_SESSION['login_err'] = 'ユーザを登録してログインしてください';
    header('Location: signup_form.php');
    return;
}


$login_user = $_SESSION['login_user'];
*/
?>

<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home</title>
    <link rel="stylesheet" href="../css/mypage.css">
    
    <body>
    <div class="bg_pattern Diagonal"></div>
    <section class="wrapper">
    <div class="container">
        <div class="content">
            <h2 class="heading">おうちじかん</h2>
            <div class="list">
                <div class="list-item">
                    <button onclick="location.href='../blog_app/form.html'" > <img src="../img/blog.jpg" class="image"/></button>
                    <div class="text">投稿</div>
                </div>
                <div class="list-item">
                <button onclick="location.href='search.php'" > <img src="../img/search.jpg" class="image"/></button>
                    <div class="text">検索</div>
                </div>    
                <div class="list-item">
                <button onclick="location.href='../blog_app/index1.php'" > <img src="../img/index1.jpg" class="image"/></button>
                    <div class="text">投稿一覧</div>
                </div>
            </div>
        </div>
    </div>
</section>
    </body>
  
</head>
</html>