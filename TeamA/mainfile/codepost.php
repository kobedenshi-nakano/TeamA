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