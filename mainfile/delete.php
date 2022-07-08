<?php
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
       $naiyou=array();
	   $error=array();
	   
       if(empty($_POST['tbl_name'])){
           $error[]="テーブル名が入力されていません。";
       }else{
           $naiyou[]="insert into ".$_POST['tbl_name'];
       }

       if(empty($_POST['value_name'])){
           $error[]="values句が入力されていません。";
       }else{
           $naiyou[]=" values (".$_POST['value_name'].");";
       }
   }
?>
<?php
      require_once __DIR__ .'./header.php';
	  require_once __DIR__ .'./subnav.php';
?>
<link rel="stylesheet" href="../css/home.css">
<link rel="stylesheet" href="../css/delete.css">
	
<div class="column2">
	<ul class="news-contents">
				
	<?php if(!empty($error)):?>
			<ul class="error_list">
				<?php  foreach($error as $value){
						echo $value;
						echo '<br>';
					}?>
			</ul>
				<?php endif; ?>
			<br>
			<div class="formnav">
				<form method="post" action="">
				<li>追加するテーブル名:
						<select name="tbl_name">
							<option value="none">---</option>
							<option value=' create role'>create文で生成したテーブル名1</option>
						</select>
						<label>全データを削除する<input type="checkbox" name=""></label>
				</li>
			
				    <li>
						主キーでの削除
					    <p>選択</p>
				    </li>
				
					<li>
						<select name="col_name">
							<option value="none">---</option>
							<option value='id'>id</option>
						</select>
						<input type="text" size="10" maxlength="20">
						<input type="checkbox" name="check1">
				    </li>	
					<li>
						<p>テーブル内の値を細かく削除</p>
				    </li>
					<li>
						<select name="col_name2">
							<option value="none">---</option>
							<option value='name'>name</option>
						</select>
						<input type="text" size="10" maxlength="20">
						<input type="checkbox" name="check2">
				    </li>
				<li><input type="submit" value="生成"></li>
				</form>
			</div>
	</ul>

		<div class="kekka-container">
			<p>出力結果</p>
			<li>
			<?php
				if(empty($error)){
					if(isset($naiyou)){
						foreach($naiyou as $value){
							echo $value;
							echo '';
						}
					}
				}
				?>
			</li>
		</div>

	</ul>
</div>
<?php
      require_once __DIR__ .'./footer.php';
?>