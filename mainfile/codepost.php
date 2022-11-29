<?php

require_once('../classes/dbc.php');

$blogs = $_POST;




if(empty($blogs['code'])){
    exit('本文を入力してください');
}

if(empty($blogs['category'])){
    exit('カテゴリーは必須です');
}


$dbc = new Dbc();
$dbc->blogCreate($blogs);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>保存確認画面</title>
</head>
<body>
<a href="./savehistory.php">保存確認画面へ</a>
</body>
</html>