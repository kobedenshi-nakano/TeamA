<!DOCTYPE html>
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
				 <div class="table">
					<p>テーブル名</p>&nbsp;&nbsp;&nbsp;
					<input type="text" name="test" size="10" maxlength="10">
				 </div>
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
						<input type="text" name="main-name" size="10" maxlength="10"> 
						<input type="text" name="another-name" size="10" maxlength="10">
						<select name='Type' >
							<option value=' 未入力(型)'>--</option>
							<option value=' INTRGER'>INTEGER(数値)</option>
							<option value=' VARCHAR(10)'>VARCHAR(文章10文字)</option>
							<option value=' VARCHAR(100)'>VARCHAR(文章100文字)</option>
							<option value=' DATE'>DATE(日付)</option>
						</select>
						<select name='yes-no-null' >
							<option value=' 未入力(null)'>--</option>
							<option value=' NOT NULL'>NOT NULL</option>
							<option value=' NULL'>NULL</option>
						</select>
						<input type="text" name="start" >
						<select name='重複'>
							<option value=' 未入力(重複)'>--</option>
							<option value=' UNIQUE'>重複あってもいい</option>
							<option value=''>重複なし</option>
						</select>
						<select name='main-key' >
							<option value=' 未入力(主キー)'>--</option>
							<option value=' PRIMARY KEY'>Yes</option>
							<option value=''>No</option>
						</select>
						<select name='forign-key'>
							<option value=' 未入力(外部キー)'>--</option>
							<option value=' REFERENCES'>Yes</option>
							<option value=''>No</option>
						</select>
						<br><input type="submit" value="生成">
					</div>
                </nav>
			</form>

			<div class="kekka-container">
				<p>出力結果</p>
		        <li>
				<!--出力結果-->
				<?php
					if ($_SERVER['REQUEST_METHOD'] === 'POST') {
						$error = array();
						if (empty($_POST['test'])) {
							$error[] = "テーブル名は必ず入力してください。";
							return $error;
						}
						else{
							echo $_POST['test']; //テーブル名
							echo ' ';
						}
						echo $_POST['main-name']; //列名
						echo $_POST['another-name']; //別名

						if ($_POST['Type'] == '') {
							echo '列の型名が入力されていません。';
						}		
						else{
							echo $_POST['Type']; //列の型名
							echo ' ';
							
						}
                            
						 echo $_POST['yes-no-null']; //Null
						 echo $_POST['start']; //初期値
						 echo $_POST['重複']; //重複
						 echo $_POST['main-key']; //主キー
						 echo $_POST['forign-key']; //外部キー規約
						
					}
					
				?>

				</li>
		    </div>
		   </ul>
		</div>
	</div>
</div>
				<div class="error_list">
				<?php if(isset($error)): ?>
					<?php foreach( $error as $value ): ?>
					<li><?php echo $value;  ?></li>
					<?php endforeach; ?>
					<?php endif; ?>
				</div>

<footer>
	<div class="footer-container">
		<p class="copyright">©PBL2-Aチーム</p>
	</div>
</footer>
</body>
</html>
			