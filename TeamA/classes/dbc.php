<?php
Class Dbc
{
//接続する
//引数：なし
//返り値；接続結果を返す
function dbconnect(){
    $dsn= 'mysql:host=localhost;dbname=localtest;charset=utf8';
    $user = 'root';
    $pass = 'pass';
    
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
        $sql = 'SELECT * FROM memory';
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
        return '日常';
    }elseif ($category === '2'){
        return 'プログラミング';
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
    $stmt = $dbh->prepare('SELECT * FROM blog Where id = :id');
    $stmt->bindValue(':id',(int)$id,\PDO::PARAM_INT);
    
    //sql実行
    $stmt->execute();
    
    //結果を取得
    $result = $stmt->fetch(\PDO::FETCH_ASSOC);
    
    if(!$result){
        exit('ブログがありません');
    }
    return $result;
}

function blogCreate($blogs){
        $sql = 'INSERT INTO memory(category,code)
        VALUES (:category, :code)';

$dbh = $this->dbconnect();
$dbh->beginTransaction();
try{
    $stmt  = $dbh->prepare($sql);
    $stmt->bindValue(':category',$blogs['category'],PDO::PARAM_INT);
    $stmt->bindValue(':code',$blogs['code'],PDO::PARAM_STR);
    $stmt->execute();
    $dbh->commit();
    echo 'コードを投稿しました';
    
} catch(PDOException $e){
    $dbh->rollBack();
    exit($e);
}
    }
}
?>