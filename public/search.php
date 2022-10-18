<?php
session_start();

require_once '../function.php';
require_once '../classes/UserLogic.php';
$result = UserLogic::checkLogin();

$login_err = isset($_SESSION['login_err']) ? $_SESSION['login_err'] : null;
unset($_SESSION['login_err']);


?>

<!doctype html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>検索</title>
    
    <link rel="stylesheet" href="../css/style.css">
    
</head>

<header>
<ul>
    <li><a class="active" href="mypage.php">Home</a></li>
    <li><a href="../blog_app/form.html" >投稿</a></li>
    <li><a href="search.php">検索</a></li>
    <li><a href="../blog_app/index1.php">投稿一覧</a></li>
    </ul>
</header>
<form action="searchlist.php" method="POST">
<div class="bg_pattern Diagonal"></div> 
<body>
    <h2>検索</h2>
    <div class="ninzu"> 
        <p>遊ぶ人数を指定してください</p>
        
        <select  name="kazu">
        <option value="1">1～4人</option>
        <option value="2">5～9人</option>
        <option value="3">10～</option>
        </select>
    </div>

    <!--<div class="ninzu">
        <p>すでに遊ぶ内容が決まっている場合</p>
        <input type="text"value="" placeholder="遊びを入力" >
        
    </div>-->
    <p>ジャンルを指定してください</p>
        <select name="category">
            <option value="1">食べたり飲んだり</option>
            <option value="2">パーティー現在のみ</option>
            <option value="3">どちらも</option>
        </select>

        <div class = "btn">
            <input type="submit" class="button" value="検索">
        </div>
     </body>
    <form>