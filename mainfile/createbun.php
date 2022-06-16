<?php
					if ($_SERVER['REQUEST_METHOD'] === 'POST') {
						$date=array();
						$error = array();
						if (empty($_POST['test'])) {
							$error[] = "テーブル名は必ず入力してください";
						}
						else{
							$date[] = "create table ".$_POST['test']." ("; //テーブル名
							
						}
						$date[] = "<br />    " ;
						if (empty($_POST['main-name'])) {
							$error[] = "列名を入力してください";
						}
						else{
							$date[] = $_POST['main-name']; //列名
						
						}
						if (empty($_POST['sub-name'])) {
							$date[] = "";
						}
						else{
							$date[] = " as ".$_POST['sub-name']; //列名
							
						}

						if ($_POST['Type'] == ' 未入力(型)') {
							$error[] = "列の型を選択してください。";
						}		
						else{
							$date[] = $_POST['Type']; //列の型名
							
							
						}
                        if ($_POST['yes-no-null'] == ' 未入力(null)') {
							$error[] = "Null値への対応を決めてください";
						}
						else{
							$date[] = $_POST['yes-no-null']; //Null値
						
						}
						if (empty($_POST['start'])) {
							$date[] = "";
						}
						else if (is_numeric($_POST['start']) == 1) { //数字か文字列かを識別する関数
							$date[] = " default ".$_POST['start']; //初期値
						}
						else {
							$date[] = " default '".$_POST['start']."'"; //初期値
						}
							
						
						if ($_POST['重複'] == ' 未入力(重複)') {
							$error[] = "重複への処理を入力してください";
						}
						else{
							$date[] = $_POST['重複']; //重複
							
						}
						if ($_POST['main-key'] == ' 未入力(主キー)') {
							$error[] = "主キーの有無を決めてください";
						}
						else{
							$date[] = $_POST['main-key']; //主キー
							
						}
						if ($_POST['forign-key'] == ' 未入力(外部キー)') {
							$error[] = "外部キーの有無を決めてください";
						}
						else{
							$date[] = $_POST['forign-key']; //外部キー規約
						}
						$date[] = "<br /> ) ;" ;
						
					}
?>
<?php
      require_once __DIR__ .'./header.php';
?>
<div class="main-contents">
	<div class="main-contents-container">
		<div class="column1">
			<ul class="subnav">
				<li><a href="update.php">update</a></li>
				<li><a href="select.php">select</a></li>
				<li><a href="delete.php">delete</a></li>
				<li><a href="insert.php">insert</a></li>
				<li><a href="createuser01.php">createuser</a></li>
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
						<div class="1">
							<li><p>列名</p></li>
							<input type="text" name="main-name" size="10" maxlength="10"> 
						</div>
						<div class="2">
							<li><p>別名</p></li>
							<input type="text" name="sub-name" size="10" maxlength="10">
						</div>
						<div class="3">
							<li><p>列の型名</p></li>
							<select name='Type' >
							<option value=' 未入力(型)'>--</option>
							<option value=' INTRGER'>INTEGER(整数値)</option>
							<option value=' DECIMAL'>DECIMAL(小数)</option>
							<option value=' CHAR'>DATE(固定長 文字列)</option>
							<option value=' VARCHAR(10)'>VARCHAR(可変長 文字列10文字)</option>
							<option value=' VARCHAR(100)'>VARCHAR(可変長 文字列100文字)</option>
							<option value=' DATETIME'>DATETIME(日付と時間)</option>
							<option value=' DATE'>DATE(日付)</option>
							<option value=' TIME'>TIME(時間)</option>
						</select>
						</div>
						<div class="4">
							<li><p>NULLについて</p></li>
							<select name='yes-no-null' >
							<option value=' 未入力(null)'>--</option>
							<option value=' NOT NULL'>NOT NULL</option>
							<option value=' NULL'>NULL</option>
							</select>
						</div>
						<div class="5">
							<li><p>初期値</p></li>
							<input type="text" name="start" >
				        </div>
						<div class="6">
							<li><p>重複</p></li>
							<select name='重複'>
							<option value=' 未入力(重複)'>--</option>
							<option value=''>重複あってもいい</option>
							<option value=' UNIQUE'>重複なし</option>
						    </select>
				        </div>
                        <div class="7">
							<li><p>主キー</p></li>
							<select name='main-key' >
							<option value=' 未入力(主キー)'>--</option>
							<option value=' PRIMARY KEY'>Yes</option>
							<option value=''>No</option>
						    </select>
				        </div>
						<div class="8">	
							<li><p>外部キー制約</p></li>
							<select name='forign-key'>
							<option value=' 未入力(外部キー)'>--</option>
							<option value=' REFERENCES'>Yes</option>
							<option value=''>No</option>
						</select>
				        </div>
					</ul>
						
						<br><input type="submit" value="生成">
					</div>
                </nav>
			</form>

			<div class="kekka-container">
				<p>出力結果</p>
		        <li>
				<!--出力結果-->
				<?php if(isset($date) ): ?>
				<?php foreach( $date as $value ): ?>
				<?php echo $value; ?>
				<?php echo ' '; ?>
				<?php endforeach; ?>
				<?php endif; ?>
				</li>
		    </div>
		   </ul>
		</div>
	</div>
</div>
<?php
      require_once __DIR__ .'./footer.php';
?>
			