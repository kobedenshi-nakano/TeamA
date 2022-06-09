<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="format-detection" content="telephone=no">
<title>2コラムレイアウト(画像なし)flexbox版</title>
<link rel="stylesheet" href="home.css">
</head>
<body>
<header>
	<div class="header-container">
		<a href="#"><h1>aaaaaaaaaaaaaaaaaaaaaaaa</h1></a>
	</div>
</header>
<!--<nav>
	<div class="nav-container">
		<ul class="globalnav">
			<li><a href="#" class="current">About</a></li>
			<li><a href="#">Price</a></li>
			<li><a href="#">Facilities</a></li>
			<li><a href="#">Access</a></li>
			<li><a href="#">Contact</a></li>
		</ul>
	</div>
</nav>-->
<div class="main-contents">
	<div class="main-contents-container">
		<div class="column1">
			<!--<h1>About</h1>-->
			<ul class="subnav">
				<li><a href="#">update</a></li>
				<li><a href="#">drop</a></li>
				<li><a href="#">delete</a></li>
				<li><a href="#">insert</a></li>
			</ul>
		</div>
		<div class="column2">
			<div class="news">
				<h2>お知らせ</h2>
				<ul class="news-contents">
					<li><img src="images/photo1.jpg" alt="">
						<p>固定席お試しキャンペーン実施中。11月1日〜14日の2週間、固定席をシェアードスペース料金でご利用いただけます。毎日先着2席分です！</p>
					</li>
					<li><img src="images/photo2.jpg" alt="">
						<p>ご利用者主催のイベントをバックアップします。座卓スペース予約、エリア予約、全体貸切など、大小様々なイベントにご利用ください。</p>
					</li>
					<li><img src="images/photo3.jpg" alt="">
						<p>ウェブデザイナー／フロントエンドエンジニアの交流勉強会を定期的に開催しています。次回は11月30日、エントリー受付中です。</p>
					</li>
					<li><img src="images/photo4.jpg" alt="">
						<p>話題のトースターがキッチンスペースに登場しました。いつでも自由にご利用いただけますので、お試しください。</p>
					</li>
				</ul>
			</div>
		</div>
		<!--<div class="column3">
			<div class="map">
				<h2>MAP</h2>
				<div class="map-image"><img src="images/map.png" alt="NEST 505 地図"></div>
				<p class="map-txt">東京都新宿区若葉町1-2-3<br>
					03-9876-5432<br>
					みどり駅西口より徒歩3分</p>
			</div>
		</div>-->
	</div>
</div>
<footer>
	<div class="footer-container">
		<p class="copyright">©NEST 505</p>
	</div>
</footer>
</body>
</html>
			