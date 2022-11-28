<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
	<title>Document</title>
</head>
<body>
	

<?php
			
					if ($_SERVER['REQUEST_METHOD'] === 'POST') {
						 
						$data = array();
						$error = array();
						

						if (empty($_POST['test'])) {
							$error[] = "テーブル名は必ず入力してください";
						}
						else{
							$data[] = "create table ".$_POST['test']." ("; //テーブル名
							
						}
					if(!empty($_POST["hoge"])){
						$count =$_POST["hoge"];
					}
					else{
						$count=1;
					}
						
						
						for($i = 0 ;$i < $count; $i++) {
							$data[] = "<br />    " ;
							if (empty($_POST['main-name'][$i])) {
								$error[] = ($i+1)."行目の列名を入力してください &nbsp;";
							}
							else{
								$data[] = $_POST['main-name'][$i]; //列名
							
							}


							if ($_POST['Type'][$i] == ' 未入力(型)') {
								$error[] = ($i+1)."行目の列の型を選択してください。&nbsp;";
							}		
							else{
								$data[] = $_POST['Type'][$i]; //列の型名	
							}


							if ($_POST['Type'][$i] == ' CHAR' || $_POST['Type'][$i] == ' VARCHAR') {
								if (empty($_POST['Type-numerical'][$i])) {
									$error[] = ($i+1)."行目の入力可能な文字の数を入力してください";
								}
								else{
									$data[] = " (".$_POST['Type-numerical'][$i].") "; //
									
								}
							}		
							else{
								$data[] = ''; //
							}

							
							if (empty($_POST['start'][$i])) {
								$data[] = "";
							}
							else if (is_numeric($_POST['start'][$i]) == 1) { //数字か文字列かを識別する関数
								$data[] = " default ".$_POST['start'][$i]; //初期値
							}
							else {
								$data[] = " default '".$_POST['start'][$i]."'"; //初期値
							}
								
							
							if ($_POST['重複'][$i] == ' 未入力(重複)') {
								$error[] = ($i+1)."行目の重複への処理を入力してください";
							}
							else if($_POST['重複'][$i]== ' UNIQUE'){
								if($_POST['main-key'][$i] == ' PRIMARY KEY'){
									$error[]= ($i+1)."行目の重複欄もしくは主キー欄を選びなおしてください。";
								}
							}


							if (empty($_POST['else-rule'][$i])) {
								$data[] = "";
							}
							else{
								$data[] = " check ( ".$_POST['else-rule'][$i]." )"; //check型
								
							}


							if ($_POST['yes-no-null'][$i] == ' 未入力(null)') {
								$error[] = ($i+1)."行目のNull値への対応を決めてください";
							}
							else{
								$data[] = $_POST['yes-no-null'][$i]; //Null値
							}


							if ($_POST['main-key'][$i] == ' 未入力(主キー)') {
								$error[] = ($i+1)."行目の主キーの有無を決めてください";
							}
							else{
								$data[] = $_POST['main-key'][$i]; //主キー
								
							}

							
							if ($_POST['forign-key'][$i] == ' 未入力(外部キー)') {
								$error[] = ($i+1)."行目の外部キーの有無を決めてください";
							}
							else{
								$data[] = $_POST['forign-key'][$i]; //外部キー制約
							}

							if ($_POST['forign-key'][$i] == ' REFERENCES') {
								if (empty($_POST['forign-name'][$i])) {
									$error[] = ($i+1)."行目の外部キーとして扱う値を入力してください";
								}
								else{
									$data[] = " (".$_POST['forign-name'][$i].") "; //
									
								}
							}		
							else{
								$data[] = ''; //
							}

							if ($i < $count-1) {
								$data[] = " ,";
							}
							else{
								$data[] = ''; 
								
							}

							
						}


						$data[] = "<br /> ) ;" ;
						
						
					}
?>
<?php
      require_once __DIR__ .'./header.php';
	  /*require_once __DIR__ .'./subnav.php';*/
?>

<link rel="stylesheet" href="../css/home.css">
<link rel="stylesheet" href="../css/subnav.css">

<div class="main-contents">
	<div class="main-contents-container">
		<div class="column1">
			<ul class="subnav">
				<li><a href="select.php">select</a></li>
				<li><a href="update.php">update</a></li>
				<li><a href="delete.php">delete</a></li>
				<li><a href="insert.php">insert</a></li>
				<li><a href="createuser01.php">create user</a></li>
				<li><a href="createbun.php" style="color:red">create table</a></li>
			</ul>
</div>

		<div class="column2">
				<ul class="news-contents">
			
				<br><br>
            <!--項目表示-->
			    <nav>
				<?php if(!empty($error)): ?>
				<ul class="error_list">
				<?php foreach( $error as $value ): ?>
				<li><?php echo $value; ?></li>
				<?php endforeach; ?>
				</ul>
				<?php endif; ?>
				
			<div class="nav-container">
				<form name="hidden_data" method="POST">
					<input type="hidden" name="hoge" id="hoge" value="">
				 <div class="table">
					<p>テーブル名</p>&nbsp;&nbsp;&nbsp;
					<input type="text" name="test" size="10" maxlength="10">
				 </div>
					<ul class="globalnav">
						<table>
				<thead>
					<tr>
						<th class="main-name">列名</th>
						<th class="Type">列の型名</th>
						<th class="Type-numerical">型の桁など</th>
						<th class="start">初期値</th>
						<th class="重複">重複</th>
						<th class="else-rule">その他ルール</th>
						<th class="yes-no-null">未入力</th>
						<th class="main-key">主キー</th>
						<th class="forign-key">外部キー</th>
						<th class="forign-name">どれ</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td><input type="text" name="main-name[0]" size="10" maxlength="10"></td>
						<td>
						<div id="view_1"></div>
							<select name="Type[0]" >
							<option value=" 未入力(型)">--</option>
							<option value=" INTEGER">INTEGER(整数値)</option>
							<option value=" DECIMAL">DECIMAL(小数)</option>
							<option value=" CHAR">CHAR(固定長 文字列)</option>
							<option value=" VARCHAR">VARCHAR(可変長 文字列)</option>
							<option value=" DATETIME">DATETIME(日付と時間)</option>
							<option value=" DATE">DATE(日付)</option>
							<option value=" TIME">TIME(時間)</option>
							</select>
						</td>
						<td><input type="text" name="Type-numerical[0]" size="3" maxlength="3"></td>
						<td><input type="text" name="start[0]" size="5" maxlength="10"></td>
						<td>
						<div id="view_1"></div>
							<select name="重複[0]">
								
								<option value="" selected>2つ以上可</option>
								<option value=" UNIQUE">1つだけ</option>
							</select>
						</td>
						<td><input type="text" name="else-rule[0]" size="5" maxlength="10"></td>
						<td>
						<div id="view_1"></div>
							<select name="yes-no-null[0]" >
								
								<option value=" NOT NULL" selected>NG</option>
								<option value="">OK</option>
							</select>
						</td>
						<td>
						<div id="view_1"></div>
							<select name="main-key[0]" >
							
							<option value="" selected>いらない</option>
							<option value=" PRIMARY KEY">いる</option>
							</select>
						</td>
						<td>
						<div id="view_1"></div>
							<select name="forign-key[0]">
								
								<option value="" selected>いらない</option>
								<option value=" REFERENCES">いる</option>
							</select>
						</td>
						<td><input type="text" name="forign-name[0]" size="10" maxlength="10"></td>
					</tr>
					
				</tbody>
				<tfoot>
				<tr>
     <td >
      <button id="add" type="button">追加</button><span id="reload"></span>
     </td>
    </tr>
				</tfoot>
			</table>
			
					</ul>
						
						<br><input type="submit" class="generatebtn"  value="生成">
					</div>
                </nav>
			</form>

			<div class="kekka-container">
				<p>出力結果</p>
		        <li>
				<!--出力結果-->
				<?php if(isset($data) ): ?>
				<?php foreach( $data as $value ): ?>
				<?php echo $value; ?>
				<?php echo ' '; ?>
				<?php endforeach; ?>
				<?php endif; ?>
				</li>
				<button id="button">COPY!</button>
		    </div>

<?php
      require_once __DIR__ .'./footer.php';
?>
 <script src="createbun.js"></script>
	<!--<script src="Copy.js"></script>-->
</body>
</html>