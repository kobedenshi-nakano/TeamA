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

						$data[] = "<br />    " ;
					
						
						if (empty($_POST['main-name'])) {
							$error[] = "列名を入力してください";
						}
						else{
							$data[] = $_POST['main-name']; //列名
						
						}


						if ($_POST['Type'] == ' 未入力(型)') {
							$error[] = "列の型を選択してください。";
						}		
						else{
							$data[] = $_POST['Type']; //列の型名	
						}


						if ($_POST['Type'] == ' CHAR' || $_POST['Type'] == ' VARCHAR') {
							if (empty($_POST['Type-numerical'])) {
								$error[] = "入力可能な文字の数を入力してください";
							}
							else{
								$data[] = " (".$_POST['Type-numerical'].") "; //
								
							}
						}		
						else{
							$data[] = ''; //
						}

                        
						if (empty($_POST['start'])) {
							$data[] = "";
						}
						else if (is_numeric($_POST['start']) == 1) { //数字か文字列かを識別する関数
							$data[] = " default ".$_POST['start']; //初期値
						}
						else {
							$data[] = " default '".$_POST['start']."'"; //初期値
						}
							
						
						if ($_POST['重複'] == ' 未入力(重複)') {
							$error[] = "重複への処理を入力してください";
						}
						else if($_POST['重複']== ' UNIQUE'){
							if($_POST['main-key'] == ' PRIMARY KEY'){
								$error[]="重複欄もしくは主キー欄を選びなおしてください。";
							}
						}


						if (empty($_POST['else-rule'])) {
							$data[] = "";
						}
						else{
							$data[] = " check ( ".$_POST['else-rule']." )"; //check型
							
						}


						if ($_POST['yes-no-null'] == ' 未入力(null)') {
							$error[] = "Null値への対応を決めてください";
						}
						else{
							$data[] = $_POST['yes-no-null']; //Null値
						}


						if ($_POST['main-key'] == ' 未入力(主キー)') {
							$error[] = "主キーの有無を決めてください";
						}
						else{
							$data[] = $_POST['main-key']; //主キー
							
						}

					    
						if ($_POST['forign-key'] == ' 未入力(外部キー)') {
							$error[] = "外部キーの有無を決めてください";
						}
						else{
							$data[] = $_POST['forign-key']; //外部キー制約
						}

						if ($_POST['forign-key'] == ' REFERENCES') {
							if (empty($_POST['forign-name'])) {
								$error[] = "外部キーとして扱う値を入力してください";
							}
							else{
								$data[] = " (".$_POST['forign-name'].") "; //
								
							}
						}		
						else{
							$data[] = ''; //
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
<link rel="stylesheet" href="../css/subnav.css">

<div class="main-contents">
	<div class="main-contents-container">
		<div class="column1">
			<ul class="subnav">
				<li><a href="update.php">update</a></li>
				<li><a href="delete.php">delete</a></li>
				<li><a href="insert.php">insert</a></li>
				<li><a href="createuser01.php">create user</a></li>
				<li><a href="createbun.php" style="color:red">create table</a></li>
			</ul>
</div>

		<div class="column2">
				<ul class="news-contents">
			<form method="post" action="">
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
				 <div class="table">
					<p>テーブル名</p>&nbsp;&nbsp;&nbsp;
					<input type="text" name="test" size="10" maxlength="10">
				 </div>
					<ul class="globalnav">
						<table>
				
							<colgroup span="1"></colgroup>
							<colgroup>
								<col class="main-name">
								<col class="Type">
								<col class="Type-numerical">
								<col class="start">
								<col class="重複">
								<col class="else-rule">
								<col class="yes-no-null">
								<col class="main-key">
								<col class="forign-key">
								<col class="forign-name">
							</colgroup>
							<tbody>
								<tr>
									<th scope="col">列名</th>
									<th scope="col">列の型名</th>
									<th scope="col">型の桁など</th>
									<th scope="col">初期値</th>
									<th scope="col">重複</th>
									<th scope="col">その他ルール</th>
									<th scope="col">未入力</th>
									<th scope="col">主キー</th>
									<th scope="col">外部キー</th>
									<th scope="col">どれ</th>
								</tr>
								<tr>
									<th scope="row"> 
										<input type="text" name="main-name" size="10" maxlength="10">
									</th>
									<td>
										<select name='Type' >
										<option value=' 未入力(型)'>--</option>
										<option value=' INTEGER'>INTEGER(整数値)</option>
										<option value=' DECIMAL'>DECIMAL(小数)</option>
										<option value=' CHAR'>CHAR(固定長 文字列)</option>
										<option value=' VARCHAR'>VARCHAR(可変長 文字列)</option>
										<option value=' DATETIME'>DATETIME(日付と時間)</option>
										<option value=' DATE'>DATE(日付)</option>
										<option value=' TIME'>TIME(時間)</option>
										</select>
									</td>
									<td>
										<input type="text" name="Type-numerical" size="3" maxlength="3">
									</td>
									<td><input type="text" name="start" size="5" maxlength="10"></td>
									<td>
										<select name='重複'>
											<option value=' 未入力(重複)'>--</option>
											<option value=''>重複可</option>
											<option value=' UNIQUE'>重複なし</option>
										</select>
									</td>
									<td>
										<input type="text" name="else-rule" size="5" maxlength="10">
									</td>
									<td>
										<select name='yes-no-null' >
											<option value=' 未入力(null)'>--</option>
											<option value=' NOT NULL'>不可</option>
											<option value=''>可</option>
										</select>
									</td>
									<td>
										<select name='main-key' >
										<option value=' 未入力(主キー)'>--</option>
										<option value=''>不要</option>
										<option value=' PRIMARY KEY'>必要</option>
										</select>
									</td>
									<td>
										<select name='forign-key'>
											<option value=' 未入力(外部キー)'>--</option>
											<option value=''>不要</option>
											<option value=' REFERENCES'>必要</option>
										</select>
									</td>
									<td>
										<input type="text" name="forign-name" size="10" maxlength="10">
									</td>
								</tr>
								<tr>
									<th scope="row">4/2</th>
								</tr>
							</tbody>
							<tfoot>
								<tr>
									<th scope="row">4/2</th>
								</tr>
							</tfoot>
						</table>
					</ul>
						
						<br><input type="submit" value="生成">
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
		    </div>
		   </ul>
		</div>
<?php
      require_once __DIR__ .'./footer.php';
?>