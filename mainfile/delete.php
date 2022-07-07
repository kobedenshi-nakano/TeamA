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
			<ul class="formnav">
				<form method="post" action="">
				
				<li>追加するテーブル名:
						<select name="tbl_name">
							<option value="none">---</option>
							<option value=' create role'>create文で生成したテーブル名1</option>
						</select>
						<label>全データを削除する<input type="checkbox" name=""></label>
				</li>
				    <tr>
						<th scope="col">主キーでの削除</th>
						<th scope="col">選択</th>	
					</tr>
						<br><br>
						<label>ID<input type="text" size="10" maxlength="20"><input type="checkbox" name=""></label>
						<br><br>
						
					<tr>
						<th scope="col">テーブル内の値を細かく削除</th>
					</tr>
					    <br><br>
						<label>名前<input type="text" size="10" maxlength="20"><input type="checkbox" name=""></label>
						<br><br>
							
				<li><input type="submit" value="生成"></li>
				</form>
			</ul>
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
			