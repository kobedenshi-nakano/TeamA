<!DOCTYPE html>
<?
if($_REQUEST["search"]){
//submitされた検索条件を使いDBに問い合わせる処理
}
?>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="format-detection" content="telephone=no">
<title>SQLツクール</title>
<link rel="stylesheet" href="../css/home.css">
<link rel="stylesheet" href="../css/createbun.css">
</head>
<body>
<header>
	<div class="header-container">
		<a href="createbun.php"><h1>タイトル</h1></a>
	</div>
</header>
<div class="main-contents">
	<div class="main-contents-container">
		<div class="column1">
			<ul class="subnav">
				<li><a href="update.php">update</a></li>
				<li><a href="select.php">select</a></li>
				<li><a href="delete.php">delete</a></li>
				<li><a href="insert.php">insert</a></li>
			</ul>
		</div>
		<div class="column2">
		
			<ul class="news-contents">
					
		<form method="post" action="">

			<ul class="globalnav">
					


			</ul>
						

						<input type="submit" value="生成">
		</form>

			<div class="kekka-container">
				<p>出力結果</p>
		        <li>
				<!--出力結果-->
				<?php
					if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   						 echo $_POST['test'];
						}
				?>

				</li>
		    </div>
				</ul>
			</div>
	</div>
</div>
<footer>
	<div class="footer-container">
		<p class="copyright">©PBL2-Aチーム</p>
	</div>
</footer>
</body>
</html>
			