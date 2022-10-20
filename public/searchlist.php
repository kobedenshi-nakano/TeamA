<?php
require_once '../classes/dbc.php';
require_once '../function.php';
$dbc = new Dbc();
$blogData = $dbc->getAllBlog();
/*
try{

    //DBに接続
    $dsn = 'mysql:dbname=blog_app; host=localhost';
    $user= 'blog_user';
    $pass= 'asasin322';

    $dbh = new \PDO($dsn,$user,$pass,[
        \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
        ]);

    $blog = $_POST;
    $sql ="select blogs.id,blogs.pn,blogs.title,blogs.content,blogs.category,blogs.kazu,blogs.post_at,blogs.publish_status from blogs where category like '".$blog["category"]."%' and kazu like '".$blog["kazu"]."%'" ;
    $sth = $dbh->prepare($sql);
    $sth->execute();
    $result = $sth->fetchAll();

    $goal=$result;

} catch(PDOException $e){
    echo "失敗:" . $e->getMessage() . "\n";
    exit();
}
*/
?>

<!doctype html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>検索結果</title>
    <link rel="stylesheet" href="../css/style.css">
    <div class="bg_pattern Diagonal"></div>
</head>

<header>

    <ul>
    <li><a class="active" href="mypage.php">Home</a></li>
    <li><a href="../blog_app/form.html" >投稿</a></li>
    <li><a href="search.php">検索</a></li>
    <li><a href="../blog_app/index1.php">投稿一覧</a></li>
    </ul>
</header>

    <h2>検索結果</h2>

<?php   if(!empty($goal)):?>
            <th>No</th>
            <th>ニックネーム</th>
            <th>タイトル</th>
            <th>カテゴリ</th>
            <th>人数</th>
            <br>

<?php foreach($goal as $colum): ?>
        <tr>
            <td><?php echo $colum['id']?></td>
            <td><?php echo $colum['pn']?></td>
            <td><?php echo $colum['title']?></td>
            <td><?php echo $dbc->setCategoryName($colum['category'])?></td>
            <td><?php echo $dbc->setkazuName($colum['kazu'])?></td>
            <td><a href="../blog_app/detail.php?id=<?php echo $colum['id']?>">詳細</a></td>
        </tr>
        <hr>
        <?php endforeach; ?>
<?php else : ?>
<p>記事がありません</p>
<?php endif;?>
    <div class="button">
     <a type="button" onclick="history.back()">戻る</a>
    </div>