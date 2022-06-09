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
			<div class="news">
				<!--<h2>お知らせ</h2>-->
				<ul class="news-contents">
					<!--<li>
						<p>固定席お試しキャンペーン実施中。11月1日〜14日の2週間、固定席をシェアードスペース料金でご利用いただけます。毎日先着2席分です！</p>
					</li>
					<li>
						<p>ご利用者主催のイベントをバックアップします。座卓スペース予約、エリア予約、全体貸切など、大小様々なイベントにご利用ください。</p>
					</li>
					<li>
						<p>ウェブデザイナー／フロントエンドエンジニアの交流勉強会を定期的に開催しています。次回は11月30日、エントリー受付中です。</p>
					</li>
					<li>
						<p>話題のトースターがキッチンスペースに登場しました。いつでも自由にご利用いただけますので、お試しください。</p>
					</li>-->
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
			