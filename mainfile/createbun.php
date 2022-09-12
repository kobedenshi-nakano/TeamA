
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
				<?php
    				if ($_SERVER['REQUEST_METHOD'] === 'POST') {
						$data = array();
						$error = array();
					}
				?>
					<div class="table">
						<p>テーブル名</p>&nbsp;&nbsp;&nbsp;
						<input type="text" name="test" size="10" maxlength="10">
						<?php
    						if ($_SERVER['REQUEST_METHOD'] === 'POST') {
								if (empty($_POST['test'])) {
									$error[] = "テーブル名は必ず入力してください";
								}
								else{
									$data[] = "create table ".$_POST['test']." ("; //テーブル名
									
								}
							}
						?>
					</div>
						<ul class="globalnav">
							<table>
					
								<colgroup span="1"></colgroup>
								<colgroup>
									<col class="main-name".$count>
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
									<!-- -->
									<?php $count = 1 ?>
									<tr>
										<th scope="row"> 
											<input type="text" name="main-name".$count size="10" maxlength="10">
											<?php
    											if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                                                    $data[] = "<br />    " ;
							                        if (empty($_POST['main-name'.$count])) {
								                        $error[] = "行目の列名を入力してください &nbsp;";
							                        }
							                        else{
								                        $data[] = $_POST['main-name'.$count]; //列名
							
							                        }
												}
											?>
										</th>
										<td>
											<select name='Type'.$count >
											<option value=' 未入力(型)'>--</option>
											<option value=' INTEGER'>INTEGER(整数値)</option>
											<option value=' DECIMAL'>DECIMAL(小数)</option>
											<option value=' CHAR'>CHAR(固定長 文字列)</option>
											<option value=' VARCHAR'>VARCHAR(可変長 文字列)</option>
											<option value=' DATETIME'>DATETIME(日付と時間)</option>
											<option value=' DATE'>DATE(日付)</option>
											<option value=' TIME'>TIME(時間)</option>
											</select>
											<?php
    											if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                                                    if ($_POST['Type'.$count] == ' 未入力(型)') {
                                                        $error[] = "行目の列の型を選択してください。&nbsp;";
                                                    }		
                                                    else{
                                                        $data[] = $_POST['Type'.$count]; //列の型名	
                                                    }
												}
											?>
										</td>
										<td>
											<input type="text" name="Type-numerical".$count size="3" maxlength="3">
											<?php
    											if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                                                    if ($_POST['Type'.$count] == ' CHAR' || $_POST['Type'] == ' VARCHAR') {
                                                        if (empty($_POST['Type-numerical'.$count])) {
                                                            $error[] = "行目の入力可能な文字の数を入力してください";
                                                        }
                                                        else{
                                                            $data[] = " (".$_POST['Type-numerical'.$count].") "; //
                                                            
                                                        }
                                                    }		
                                                    else{
                                                        $data[] = ''; //
                                                    }
												}
											?>
										</td>
										<td>
											<input type="text" name="start".$count size="5" maxlength="10"></td>
											<?php
											    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                                                    if (empty($_POST['start'.$count])) {
                                                        $data[] = "";
                                                    }
                                                    else if (is_numeric($_POST['start'.$count]) == 1) { //数字か文字列かを識別する関数
                                                        $data[] = " default ".$_POST['start'.$count]; //初期値
                                                    }
                                                    else {
                                                        $data[] = " default '".$_POST['start'.$count]."'"; //初期値
                                                    }
												}
											?>
										<td>
											<select name='重複'.$count>
												<option value=' 未入力(重複)'>--</option>
												<option value=''>重複可</option>
												<option value=' UNIQUE'>重複なし</option>
											</select>
											<?php
											    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                                                    if ($_POST['重複'.$count] == ' 未入力(重複)') {
                                                        $error[] = "行目の重複への処理を入力してください";
                                                    }
                                                    else if($_POST['重複'.$count]== ' UNIQUE'){
                                                        if($_POST['main-key'] == ' PRIMARY KEY'){
                                                            $error[]= "行目の重複欄もしくは主キー欄を選びなおしてください。";
                                                        }
                                                    }
												}
											?>
										</td>
										<td>
											<input type="text" name="else-rule".$count size="5" maxlength="10">
											<?php
    											if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                                                    if (empty($_POST['else-rule'.$count])) {
                                                        $data[] = "";
                                                    }
                                                    else{
                                                        $data[] = " check ( ".$_POST['else-rule'.$count]." )"; //check型
                                                        
                                                    }
												}
											?>
										</td>
										<td>
											<select name='yes-no-null'.$count >
												<option value=' 未入力(null)'>--</option>
												<option value=' NOT NULL'>不可</option>
												<option value=''>可</option>
											</select>
											<?php
    											if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                                                    if ($_POST['yes-no-null'.$count] == ' 未入力(null)') {
                                                        $error[] = "行目のNull値への対応を決めてください";
                                                    }
                                                    else{
                                                        $data[] = $_POST['yes-no-null'.$count]; //Null値
                                                    }
												}
											?>
										</td>
										<td>
											<select name='main-key'.$count >
											<option value=' 未入力(主キー)'>--</option>
											<option value=''>不要</option>
											<option value=' PRIMARY KEY'>必要</option>
											</select>
											<?php
    											if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                                                    if ($_POST['main-key'.$count] == ' 未入力(主キー)') {
                                                        $error[] = "行目の主キーの有無を決めてください";
                                                    }
                                                    else{
                                                        $data[] = $_POST['main-key'.$count]; //主キー
                                                        
                                                    }
												}
											?>
										</td>
										<td>
											<select name='forign-key'.$count>
												<option value=' 未入力(外部キー)'>--</option>
												<option value=''>不要</option>
												<option value=' REFERENCES'>必要</option>
											</select>
											<?php
											    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                                                    if ($_POST['forign-key'.$count] == ' 未入力(外部キー)') {
                                                        $error[] = "行目の外部キーの有無を決めてください";
                                                    }
                                                    else{
                                                        $data[] = $_POST['forign-key'.$count]; //外部キー制約
                                                    }
												}
											?>
										</td>
										<td>
											<input type="text" name="forign-name".$count size="10" maxlength="10">
											<?php
    											if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                                                    if ($_POST['forign-key'.$count] == ' REFERENCES') {
                                                        if (empty($_POST['forign-name'.$count])) {
                                                            $error[] = "行目の外部キーとして扱う値を入力してください";
                                                        }
                                                        else{
                                                            $data[] = " (".$_POST['forign-name'.$count].") "; //
                                                            
                                                        }
                                                    }		
                                                    else{
                                                        $data[] = ''; //
                                                    }
												}
											?>
										</td>
									</tr>
									
									<!--
										
									<?php $count = 2 ?>
									<tr>
										<th scope="row"> 
											<input type="text" name="main-name".$count size="10" maxlength="10">
											<?php
    											if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                                                    $data[] = "<br />    " ;
							                        if (empty($_POST['main-name'.$count])) {
								                        $error[] = "行目の列名を入力してください &nbsp;";
							                        }
							                        else{
								                        $data[] = $_POST['main-name'.$count]; //列名
							
							                        }
												}
											?>
										</th>
										<td>
											<select name='Type'.$count >
											<option value=' 未入力(型)'>--</option>
											<option value=' INTEGER'>INTEGER(整数値)</option>
											<option value=' DECIMAL'>DECIMAL(小数)</option>
											<option value=' CHAR'>CHAR(固定長 文字列)</option>
											<option value=' VARCHAR'>VARCHAR(可変長 文字列)</option>
											<option value=' DATETIME'>DATETIME(日付と時間)</option>
											<option value=' DATE'>DATE(日付)</option>
											<option value=' TIME'>TIME(時間)</option>
											</select>
											<?php
    											if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                                                    if ($_POST['Type'.$count] == ' 未入力(型)') {
                                                        $error[] = "行目の列の型を選択してください。&nbsp;";
                                                    }		
                                                    else{
                                                        $data[] = $_POST['Type'.$count]; //列の型名	
                                                    }
												}
											?>
										</td>
										<td>
											<input type="text" name="Type-numerical".$count size="3" maxlength="3">
											<?php
    											if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                                                    if ($_POST['Type'.$count] == ' CHAR' || $_POST['Type'] == ' VARCHAR') {
                                                        if (empty($_POST['Type-numerical'.$count])) {
                                                            $error[] = "行目の入力可能な文字の数を入力してください";
                                                        }
                                                        else{
                                                            $data[] = " (".$_POST['Type-numerical'.$count].") "; //
                                                            
                                                        }
                                                    }		
                                                    else{
                                                        $data[] = ''; //
                                                    }
												}
											?>
										</td>
										<td>
											<input type="text" name="start".$count size="5" maxlength="10"></td>
											<?php
											    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                                                    if (empty($_POST['start'.$count])) {
                                                        $data[] = "";
                                                    }
                                                    else if (is_numeric($_POST['start'.$count]) == 1) { //数字か文字列かを識別する関数
                                                        $data[] = " default ".$_POST['start'.$count]; //初期値
                                                    }
                                                    else {
                                                        $data[] = " default '".$_POST['start'.$count]."'"; //初期値
                                                    }
												}
											?>
										<td>
											<select name='重複'.$count>
												<option value=' 未入力(重複)'>--</option>
												<option value=''>重複可</option>
												<option value=' UNIQUE'>重複なし</option>
											</select>
											<?php
											    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                                                    if ($_POST['重複'.$count] == ' 未入力(重複)') {
                                                        $error[] = "行目の重複への処理を入力してください";
                                                    }
                                                    else if($_POST['重複'.$count]== ' UNIQUE'){
                                                        if($_POST['main-key'] == ' PRIMARY KEY'){
                                                            $error[]= "行目の重複欄もしくは主キー欄を選びなおしてください。";
                                                        }
                                                    }
												}
											?>
										</td>
										<td>
											<input type="text" name="else-rule".$count size="5" maxlength="10">
											<?php
    											if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                                                    if (empty($_POST['else-rule'.$count])) {
                                                        $data[] = "";
                                                    }
                                                    else{
                                                        $data[] = " check ( ".$_POST['else-rule'.$count]." )"; //check型
                                                        
                                                    }
												}
											?>
										</td>
										<td>
											<select name='yes-no-null'.$count >
												<option value=' 未入力(null)'>--</option>
												<option value=' NOT NULL'>不可</option>
												<option value=''>可</option>
											</select>
											<?php
    											if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                                                    if ($_POST['yes-no-null'.$count] == ' 未入力(null)') {
                                                        $error[] = "行目のNull値への対応を決めてください";
                                                    }
                                                    else{
                                                        $data[] = $_POST['yes-no-null'.$count]; //Null値
                                                    }
												}
											?>
										</td>
										<td>
											<select name='main-key'.$count >
											<option value=' 未入力(主キー)'>--</option>
											<option value=''>不要</option>
											<option value=' PRIMARY KEY'>必要</option>
											</select>
											<?php
    											if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                                                    if ($_POST['main-key'.$count] == ' 未入力(主キー)') {
                                                        $error[] = "行目の主キーの有無を決めてください";
                                                    }
                                                    else{
                                                        $data[] = $_POST['main-key'.$count]; //主キー
                                                        
                                                    }
												}
											?>
										</td>
										<td>
											<select name='forign-key'.$count>
												<option value=' 未入力(外部キー)'>--</option>
												<option value=''>不要</option>
												<option value=' REFERENCES'>必要</option>
											</select>
											<?php
											    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                                                    if ($_POST['forign-key'.$count] == ' 未入力(外部キー)') {
                                                        $error[] = "行目の外部キーの有無を決めてください";
                                                    }
                                                    else{
                                                        $data[] = $_POST['forign-key'.$count]; //外部キー制約
                                                    }
												}
											?>
										</td>
										<td>
											<input type="text" name="forign-name".$count size="10" maxlength="10">
											<?php
    											if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                                                    if ($_POST['forign-key'.$count] == ' REFERENCES') {
                                                        if (empty($_POST['forign-name'.$count])) {
                                                            $error[] = "行目の外部キーとして扱う値を入力してください";
                                                        }
                                                        else{
                                                            $data[] = " (".$_POST['forign-name'.$count].") "; //
                                                            
                                                        }
                                                    }		
                                                    else{
                                                        $data[] = ''; //
                                                    }
												}
											?>
										</td>
									</tr>
											-->    
									<?php
                                        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                                                            $data[] = "<br /> ) ;" ;
                                                        }
                                    ?>
									
									<!--
									 <tr>
										<th scope="row"> 
											<input type="text" name="main-name".$count size="10" maxlength="10">
										</th>
										<td>
											<select name='Type'.$count+1 >
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
											<input type="text" name="Type-numerical".$count+1 size="3" maxlength="3">
										</td>
										<td><input type="text" name="start".$count+1 size="5" maxlength="10"></td>
										<td>
											<select name='重複'.$count+1>
												<option value=' 未入力(重複)'>--</option>
												<option value=''>重複可</option>
												<option value=' UNIQUE'>重複なし</option>
											</select>
										</td>
										<td>
											<input type="text" name="else-rule".$count+1 size="5" maxlength="10">
										</td>
										<td>
											<select name='yes-no-null'.$count+1 >
												<option value=' 未入力(null)'>--</option>
												<option value=' NOT NULL'>不可</option>
												<option value=''>可</option>
											</select>
										</td>
										<td>
											<select name='main-key'.$count+1 >
											<option value=' 未入力(主キー)'>--</option>
											<option value=''>不要</option>
											<option value=' PRIMARY KEY'>必要</option>
											</select>
										</td>
										<td>
											<select name='forign-key'.$count+1>
												<option value=' 未入力(外部キー)'>--</option>
												<option value=''>不要</option>
												<option value=' REFERENCES'>必要</option>
											</select>
										</td>
										<td>
											<input type="text" name="forign-name".$count+1 size="10" maxlength="10">
										</td>
									</tr>
													-->
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