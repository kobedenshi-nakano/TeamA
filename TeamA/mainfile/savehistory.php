<?php
	require_once '../classes/dbc.php';
    require_once __DIR__ .'./header.php';
	/*require_once __DIR__ .'./subnav.php';*/
	$dbc = new Dbc();
	$blogdata = $dbc->getAllBlog();
	try{

		//DBに接続
		$dsn = 'mysql:host=localhost;dbname=localtest;charset=utf8';
		$user= 'root';
		$pass= 'pass';
	
		$dbh = new \PDO($dsn,$user,$pass,[
			\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
			]);
	
		$blog = $_POST;
		$sql ="select * from memory" ;
		$sth = $dbh->prepare($sql);
		$sth->execute();
		$result = $sth->fetchAll();
	
		$goal=$result;
	
	} catch(PDOException $e){
		echo "失敗:" . $e->getMessage() . "\n";
		exit();
	}


?>
<link rel="stylesheet" href="../css/home.css">
<link rel="stylesheet" href="../css/subnav.css">
<link rel="stylesheet" href="../css/createuser.css">
<div class="main-contents">
	<div class="main-contents-container">
		<div class="column1">
			<ul class="subnav">
				<li><a href="select.php" style="color:red">select</a></li>
				<li><a href="update.php">update</a></li>
				<li><a href="delete.php">delete</a></li>
				<li><a href="insert.php">insert</a></li>
				<li><a href="createuser01.php">create user</a></li>
				<li><a href="createbun.php">create table</a></li>
			</ul>
</div>

<div class="column2">
		<ul class="news-contents">
            <li>保存履歴</li>
            <div class="kekka-container">
		        
			<li>
			

<?php foreach($goal as $colum): ?>
        <tr>
			<td><?php echo $colum['id']?></td>
            <td><?php echo $colum['data']?></td>
			<td><?php echo $colum['code']?></td>
        </tr>
        <hr>
        <?php endforeach; ?>

            </li>
            </div>
		</ul>
</div>
<?php
    require_once __DIR__ .'./footer.php';
?>