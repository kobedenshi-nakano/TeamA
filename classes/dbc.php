<?php
Class Dbc
{
//接続する
//引数：なし
//返り値；接続結果を返す
function dbconnect(){
    $dsn= 'mysql:host=localhost;dbname=blog_app;charset=utf8';
    $user = 'blog_user';
    $pass = 'asasin322';
    
    try {
        $dbh = new \PDO($dsn,$user,$pass,[
        \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
        ]);
    }catch(\PDOException $e) {
        echo '接続失敗' . $e->getMessage();
        exit();
    };

    return $dbh;
}
//データの取得
//引数：無し
//返り値：取得したデータ
function getAllBlog(){
        $dbh = $this->dbconnect();
        //sqlの準備
        $sql = 'SELECT * FROM blogs';
        //sqlの実行
        $stmt = $dbh -> query($sql);
        //sqlの結果を受け取る
        $result = $stmt -> fetchall(\PDO::FETCH_ASSOC);
        return $result;
        $dbh = null;
}




//カテゴリー名を表示
//引数：数字
//返り値：カテゴリー文字列
function setCategoryName($category){
    if ($category === '1'){
        return '食べたり飲んだりする';
    }elseif ($category === '2'){
        return 'パーティーゲームのみ';
    }elseif($category === '3') {
        return 'どちらも';
    }else {
        return 'その他';
    }
}

function setkazuName($kazu){
    if ($kazu === '1'){
        return '1～4';
    }elseif ($kazu === '2'){
        return '5～9';
    }elseif($kazu === '3') {
        return '10～';
    }else {
        return 'その他';
    }
}


//引数：$id
//返り値：$result
function getBlog($id){
    if(empty($id)){
        exit('idが不正です');
    }
    
    $dbh = $this->dbconnect();
    
    //sql準備
    $stmt = $dbh->prepare('SELECT * FROM blogs Where id = :id');
    $stmt->bindValue(':id',(int)$id,\PDO::PARAM_INT);
    
    //sql実行
    $stmt->execute();
    
    //結果を取得
    $result = $stmt->fetch(\PDO::FETCH_ASSOC);
    
    if(!$result){
        exit('投稿がありません');
    }
    return $result;
}

    function blogCreate($blogs){
        $sql = 'INSERT INTO blogs(pn, title, content ,category,kazu, publish_status)
        VALUES (:pn,:title, :content, :category,:kazu, :publish_status)';

$dbh = $this->dbconnect();
$dbh->beginTransaction();
try{
    $stmt  = $dbh->prepare($sql);
    $stmt->bindValue(':pn',$blogs['pn'],PDO::PARAM_STR);
    $stmt->bindValue(':title',$blogs['title'],PDO::PARAM_STR);
    $stmt->bindValue(':content',$blogs['content'],PDO::PARAM_STR);
    //$stmt->bindValue(':example',$blogs['example'],PDO::PARAM_STR);
    $stmt->bindValue(':category',$blogs['category'],PDO::PARAM_INT);
    $stmt->bindValue(':kazu',$blogs['kazu'],PDO::PARAM_INT);
    $stmt->bindValue(':publish_status',$blogs['publish_status'],PDO::PARAM_INT);
    $stmt->execute();
    $dbh->commit();
    echo 'ブログを投稿しました';
} catch(PDOException $e){
    $dbh->rollBack();
    exit($e);
}
    }
}
?>