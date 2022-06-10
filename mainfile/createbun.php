<!DOCTYPE html>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo $_POST['test'];
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

				
				<br><br>
            <!--項目表示-->
			    <nav>
					<div class="nav-container">
						<ul class="globalnav">
							<li><p>列名</p></li>
							<li><p>別名</p></li>
							<li><p>列の型名</p></li>
							<li><p>NULLについて</p></li>
							<li><p>初期値</p></li>
							<li><p>重複</p></li>
							<li><p>主キー</p></li>
							<li><p>外部キー制約</p></li>
						</ul>
						<input type="text" name="test">
					</div>
                </nav>

			</form>
				
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
			