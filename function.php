<?php

/**
 * xss
 * 
 * @param string $str 対象の文字列
 * @return string 処理された文字列
 */
function h($str){
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}


/**
 * csrf
 * @param void
 * @return string $csrf_token
 */
function setToken(){
    //生成
    //フォームからそのトークンを送信
    //送信後の画面で照会
    //トークンを削除
    $csrf_token = bin2hex(random_bytes(32));
    $_SESSION['csrf_token'] = $csrf_token;

    return $csrf_token;
}