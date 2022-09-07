<?
if($_REQUEST["search"]){
//submitされた検索条件を使いDBに問い合わせる処理
}
?>
<?php
      require_once __DIR__ .'./header.php';
	  require_once __DIR__ .'./subnav.php';
?>
<link rel="stylesheet" href="../css/home.css">


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
<?php
      require_once __DIR__ .'./footer.php';
?>
			