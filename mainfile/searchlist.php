<?php
	require_once '../classes/dbc.php';
    require_once __DIR__ .'./header.php';
	/*require_once __DIR__ .'./subnav.php';*/
	$goal = array();
	$error=array();
	$naiyou = array();
	$blog = array();
	
	if (!empty($_POST['category_bun'])&&empty($_POST['category_code'])){
	try{
		//DBに接続
		$dsn = 'mysql:host=localhost;dbname=localtest;charset=utf8';
		$user= 'root';
		$pass= 'pass';
	
		$dbh = new \PDO($dsn,$user,$pass,[
			\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
			]);
	
		$blog = $_POST;
		$sql ="select * from memory where category = ".$blog["category_bun"]."" ;
		$sth = $dbh->prepare($sql);
		$sth->execute();
		$result = $sth->fetchAll();
	
		$goal=$result;
	
	} catch(PDOException $e){
		echo "失敗:" . $e->getMessage() . "\n";
		exit();
	}
}elseif(!empty($_POST['category_code'])&&empty($_POST['category_bun'])){
	try{

		//DBに接続
		$dsn = 'mysql:host=localhost;dbname=localtest;charset=utf8';
		$user= 'root';
		$pass= 'pass';
	
		$dbh = new \PDO($dsn,$user,$pass,[
			\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
			]);
	
		$blog = $_POST;
		$sql ="select * from memory where code like '%".$blog["category_code"]."%'" ;
		$sth = $dbh->prepare($sql);
		$sth->execute();
		$result = $sth->fetchAll();
	
		$goal=$result;
	
	} catch(PDOException $e){
		echo "失敗:" . $e->getMessage() . "\n";
		exit();
	}
}else if(!empty($_POST['category_bun'])&&!empty($_POST['category_code'])){
	try{
		//DBに接続
		$dsn = 'mysql:host=localhost;dbname=localtest;charset=utf8';
		$user= 'root';
		$pass= 'pass';
	
		$dbh = new \PDO($dsn,$user,$pass,[
			\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
			]);
	
		$blog = $_POST;
		$sql ="select * from memory where category = ".$blog["category_bun"]." and code like '%".$blog["category_code"]."%'" ;
		$sth = $dbh->prepare($sql);
		$sth->execute();
		$result = $sth->fetchAll();
	
		$goal=$result;
	
	} catch(PDOException $e){
		echo "失敗:" . $e->getMessage() . "\n";
		exit();
	}

}elseif (empty($goal)){
	$error[]="どちらか入力してください。";
}
?>
<link rel="stylesheet" href="../css/home.css">
<link rel="stylesheet" href="../css/subnav.css">
<link rel="stylesheet" href="../css/createuser.css">
<link rel="stylesheet" href="../css/select.css">
<div class="main-contents">
	<div class="main-contents-container">
		<div class="column1">
			<ul class="subnav">
				<li><a href="newpost.php">新着</a></li>
				<li><a href="select.php" >select</a></li>
				<li><a href="update.php">update</a></li>
				<li><a href="delete.php">delete</a></li>
				<li><a href="insert.php">insert</a></li>
				<li><a href="createuser01.php">create user</a></li>
				<li><a href="createbun.php">create table</a></li>
				<li><a href="search.php" style="color:red">検索</a></li>
			</ul>
</div>

	<div class="column2">
		<ul class="news-contents">
					
		<?php if(!empty($error)):?>
                <ul class="error_list">
                    <?php  foreach($error as $value){
                            echo $value;
                            echo '<br>';
                        }?>
                </ul>
                    <?php endif; ?>
				<br>
                
		</ul>

		<div class="kekka-container">
			<p>出力結果</p>
		<li>
			<?php foreach($goal as $colum): ?>
			<div id="text">
			<?php echo $colum['code']?>
			</div>
			<button id="button">COPY!</button>
			<hr>
        <?php endforeach ;?>
		</li>
		</div>
				
				<input type="button" id="save" name="qsave" onclick="window.open('./saveconfirm.php')" value="保存確認画面へ" class="quikSave">
		</div>
		</ul>
	</div>
<?php
    require_once __DIR__ .'./footer.php';
?>
<script type="text/javascript">
	const btn = document.getElementById("button"); // button要素取得
		const txt = document.getElementById("text").textContent; // テキスト取得

		btn.addEventListener("click", () => { // ボタンをクリックしたら
 		 navigator.clipboard
   		 .writeText(txt) // テキストをクリップボードに書き込み（＝コピー）
    	.then(
      	(success) => console.log('テキストのコピーに成功'),
      	(error) => console.log('テキストのコピーに失敗')
    	);

	    btn.innerHTML = "OK!"; // ボタンの文字変更
  	    setTimeout(() => (btn.innerHTML = "COPY!"), 1000); // ボタンの文字を戻す
		});
</script>