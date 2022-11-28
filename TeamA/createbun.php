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

						
						
						
						for($i = 0 ;$i < 4; $i++) {
							$data[] = "<br />    " ;
							if (empty($_POST['main-name-'.$i])) {
								$error[] = ($i+1)."行目の列名を入力してください &nbsp;";
							}
							else{
								$data[] = $_POST['main-name-'.$i]; //列名
							
							}


							if ($_POST['Type-'.$i] == ' 未入力(型)') {
								$error[] = ($i+1)."行目の列の型を選択してください。&nbsp;";
							}		
							else{
								$data[] = $_POST['Type-'.$i]; //列の型名	
							}


							if ($_POST['Type-'.$i] == ' CHAR' || $_POST['Type-'.$i] == ' VARCHAR') {
								if (empty($_POST['Type-numerical-'.$i])) {
									$error[] = ($i+1)."行目の入力可能な文字の数を入力してください";
								}
								else{
									$data[] = " (".$_POST['Type-numerical-'.$i].") "; //
									
								}
							}		
							else{
								$data[] = ''; //
							}

							
							if (empty($_POST['start-'.$i])) {
								$data[] = "";
							}
							else if (is_numeric($_POST['start-'.$i]) == 1) { //数字か文字列かを識別する関数
								$data[] = " default ".$_POST['start-'.$i]; //初期値
							}
							else {
								$data[] = " default '".$_POST['start-'.$i]."'"; //初期値
							}
								
							
							if ($_POST['重複-'.$i] == ' 未入力(重複)') {
								$error[] = ($i+1)."行目の重複への処理を入力してください";
							}
							else if($_POST['重複-'.$i]== ' UNIQUE'){
								if($_POST['main-key-'.$i] == ' PRIMARY KEY'){
									$error[]= ($i+1)."行目の重複欄もしくは主キー欄を選びなおしてください。";
								}
							}


							if (empty($_POST['else-rule-'.$i])) {
								$data[] = "";
							}
							else{
								$data[] = " check ( ".$_POST['else-rule-'.$i]." )"; //check型
								
							}


							if ($_POST['yes-no-null-'.$i] == ' 未入力(null)') {
								$error[] = ($i+1)."行目のNull値への対応を決めてください";
							}
							else{
								$data[] = $_POST['yes-no-null-'.$i]; //Null値
							}


							if ($_POST['main-key-'.$i] == ' 未入力(主キー)') {
								$error[] = ($i+1)."行目の主キーの有無を決めてください";
							}
							else{
								$data[] = $_POST['main-key-'.$i]; //主キー
								
							}

							
							if ($_POST['forign-key-'.$i] == ' 未入力(外部キー)') {
								$error[] = ($i+1)."行目の外部キーの有無を決めてください";
							}
							else{
								$data[] = $_POST['forign-key-'.$i]; //外部キー制約
							}

							if ($_POST['forign-key-'.$i] == ' REFERENCES') {
								if (empty($_POST['forign-name-'.$i])) {
									$error[] = ($i+1)."行目の外部キーとして扱う値を入力してください";
								}
								else{
									$data[] = " (".$_POST['forign-name-'.$i].") "; //
									
								}
							}		
							else{
								$data[] = ''; //
							}

							if ($i < 3) {
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
	  require_once __DIR__ .'./subnav.php';
?>

<link rel="stylesheet" href="../css/home.css">
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
										<input type="text" name="main-name-0" size="10" maxlength="10">
									</th>
									<td>
										<select name='Type-0' >
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
										<input type="text" name="Type-numerical-0" size="3" maxlength="3">
									</td>
									<td><input type="text" name="start-0" size="5" maxlength="10"></td>
									<td>
										<select name='重複-0'>
											<option value=' 未入力(重複)'>--</option>
											<option value=''>重複可</option>
											<option value=' UNIQUE'>重複なし</option>
										</select>
									</td>
									<td>
										<input type="text" name="else-rule-0" size="5" maxlength="10">
									</td>
									<td>
										<select name='yes-no-null-0' >
											<option value=' 未入力(null)'>--</option>
											<option value=' NOT NULL'>不可</option>
											<option value=''>可</option>
										</select>
									</td>
									<td>
										<select name='main-key-0' >
										<option value=' 未入力(主キー)'>--</option>
										<option value=''>不要</option>
										<option value=' PRIMARY KEY'>必要</option>
										</select>
									</td>
									<td>
										<select name='forign-key-0'>
											<option value=' 未入力(外部キー)'>--</option>
											<option value=''>不要</option>
											<option value=' REFERENCES'>必要</option>
										</select>
									</td>
									<td>
										<input type="text" name="forign-name-0" size="10" maxlength="10">
									</td>
								</tr>
								<tr>
									<th scope="row"> 
										<input type="text" name="main-name-1" size="10" maxlength="10">
									</th>
									<td>
										<select name='Type-1' >
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
										<input type="text" name="Type-numerical-1" size="3" maxlength="3">
									</td>
									<td><input type="text" name="start-1" size="5" maxlength="10"></td>
									<td>
										<select name='重複-1'>
											<option value=' 未入力(重複)'>--</option>
											<option value=''>重複可</option>
											<option value=' UNIQUE'>重複なし</option>
										</select>
									</td>
									<td>
										<input type="text" name="else-rule-1" size="5" maxlength="10">
									</td>
									<td>
										<select name='yes-no-null-1' >
											<option value=' 未入力(null)'>--</option>
											<option value=' NOT NULL'>不可</option>
											<option value=''>可</option>
										</select>
									</td>
									<td>
										<select name='main-key-1' >
										<option value=' 未入力(主キー)'>--</option>
										<option value=''>不要</option>
										<option value=' PRIMARY KEY'>必要</option>
										</select>
									</td>
									<td>
										<select name='forign-key-1'>
											<option value=' 未入力(外部キー)'>--</option>
											<option value=''>不要</option>
											<option value=' REFERENCES'>必要</option>
										</select>
									</td>
									<td>
										<input type="text" name="forign-name-1" size="10" maxlength="10">
									</td>
								</tr>
								<tr>
									<th scope="row"> 
										<input type="text" name="main-name-2" size="10" maxlength="10">
									</th>
									<td>
										<select name='Type-2' >
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
										<input type="text" name="Type-numerical-2" size="3" maxlength="3">
									</td>
									<td><input type="text" name="start-2" size="5" maxlength="10"></td>
									<td>
										<select name='重複-2'>
											<option value=' 未入力(重複)'>--</option>
											<option value=''>重複可</option>
											<option value=' UNIQUE'>重複なし</option>
										</select>
									</td>
									<td>
										<input type="text" name="else-rule-2" size="5" maxlength="10">
									</td>
									<td>
										<select name='yes-no-null-2' >
											<option value=' 未入力(null)'>--</option>
											<option value=' NOT NULL'>不可</option>
											<option value=''>可</option>
										</select>
									</td>
									<td>
										<select name='main-key-2' >
										<option value=' 未入力(主キー)'>--</option>
										<option value=''>不要</option>
										<option value=' PRIMARY KEY'>必要</option>
										</select>
									</td>
									<td>
										<select name='forign-key-2'>
											<option value=' 未入力(外部キー)'>--</option>
											<option value=''>不要</option>
											<option value=' REFERENCES'>必要</option>
										</select>
									</td>
									<td>
										<input type="text" name="forign-name-2" size="10" maxlength="10">
									</td>
								</tr>
								<tr>
									<th scope="row"> 
										<input type="text" name="main-name-3" size="10" maxlength="10">
									</th>
									<td>
										<select name='Type-3' >
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
										<input type="text" name="Type-numerical-3" size="3" maxlength="3">
									</td>
									<td><input type="text" name="start-3" size="5" maxlength="10"></td>
									<td>
										<select name='重複-3'>
											<option value=' 未入力(重複)'>--</option>
											<option value=''>重複可</option>
											<option value=' UNIQUE'>重複なし</option>
										</select>
									</td>
									<td>
										<input type="text" name="else-rule-3" size="5" maxlength="10">
									</td>
									<td>
										<select name='yes-no-null-3' >
											<option value=' 未入力(null)'>--</option>
											<option value=' NOT NULL'>不可</option>
											<option value=''>可</option>
										</select>
									</td>
									<td>
										<select name='main-key-3' >
										<option value=' 未入力(主キー)'>--</option>
										<option value=''>不要</option>
										<option value=' PRIMARY KEY'>必要</option>
										</select>
									</td>
									<td>
										<select name='forign-key-3'>
											<option value=' 未入力(外部キー)'>--</option>
											<option value=''>不要</option>
											<option value=' REFERENCES'>必要</option>
										</select>
									</td>
									<td>
										<input type="text" name="forign-name-3" size="10" maxlength="10">
									</td>
								</tr>
							</tbody>
							<tfoot>
							
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