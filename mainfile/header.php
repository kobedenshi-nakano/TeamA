<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="format-detection" content="telephone=no">
<title>SQLツクール</title>
<link rel="stylesheet" href="../css/header.css">
</head>
<body>

<script>
    				function coladd() {
        			var table = document.getElementById("table");
        			// 行を行末に追加
        			var row = table.insertRow(-1);
        			//td分追加
        			var cell1 = row.insertCell(-1);
        			var cell2 = row.insertCell(-1);
        			// セルの内容入力
        			cell1.innerHTML = '更新する列:<input type="text" name="colatai" size="10" maxlength="10">';
        			cell2.innerHTML = '更新する列の値:<input type="text" name="colatai2" size="10" maxlength="10">この行を削除しますか？<input type="button" value=削除" id="addition" onclick="coldel(this)">';
    				}
    				function coldel(obj) {
        			// 削除ボタンを押下された行を取得
        			tr = obj.parentNode.parentNode;
        			// trのインデックスを取得して行を削除する
        			tr.parentNode.deleteRow(tr.sectionRowIndex);
    				}
</script>
<header>
	<div class="header-container">
		<a href="createbun.php"><h1>SQLツクール</h1></a>
	</div>
</header>