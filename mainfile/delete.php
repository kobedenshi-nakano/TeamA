<?php
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
       $naiyou=array();
	   $error=array();
	   
	   if(isset($_POST['truncate'])){
           $naiyou[]="Drop table";
	   
       if(!empty($_POST['table'])){
           $naiyou[]=" if exists  '".$_POST['table']."' ";
       }else{
		   $error[]="テーブル名が入力されていません。";
       }
	  }else{
		if(!empty($_POST['table'])){
			$naiyou[]="Delete from '".$_POST['table']."' ";
		}else{
			$error[]="テーブル名が入力されていません。";
		}
       if(!empty($_POST['col_name1'])){
           $naiyou[]="where '".$_POST['col_name1']."' =";
       }else{
           $error[]="列名を入力してください";
       }
	    if(!empty($_POST['value1'])){
		$naiyou[]=" ".$_POST['value1']."";
	    }else{
		$error[]="値を入力してください";
	    }
		
       if(!empty($_POST['col_name2'])){
           $naiyou[]="where '".$_POST['col_name2']."' =";
       }else{
           $error[]="列名を入力してください";
       }
	    if(!empty($_POST['value2'])){
		$naiyou[]=" ".$_POST['value1']."";
	    }else{
		$error[]="値を入力してください";
	    }
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
	<div class="news-contents">
				
	<?php if(!empty($error)):?>
			<ul class="error_list">
				<?php  foreach($error as $value){
						echo $value;
						echo '<br>';
					}?>
			</ul>
				<?php endif; ?>
			<br>
			<ul class="formnav1">
				<form method="post" action="">
				<p class="addtable">追加するテーブル名:
				<input type="text" name="table" size="10" maxlength="10">
						<!--<select name="tbl_name">
							<option value="none">---</option>
							<option value=' create role'>create文で生成したテーブル名1</option>
						</select>-->
				</p>
				<p>全データを削除する<input type="checkbox" name="truncate"></p>
			
				<p class="koumoku">主キーでの削除</p>
				<p>選択</p>
                <p class="colname1">
				<input type="text" name="col_name1" size="10" maxlength="10" placeholder="主キーに当たる列名を入力してください">
					<!--<select name="col_name">
						<option value="none1">---</option>
						<option value='id'>id</option>
					</select>-->
				</p>
				<p class="mainkey1"><input type="text" name="value1" size="10" maxlength="20" placeholder="値を入力してください"></p>
				<p><input type="checkbox" name="check1"></p>
				<p class="koumoku2">テーブル内の値を細かく削除</p>
				<p class="colname1">
				<input type="text" name="col_name2" size="10" maxlength="10" placeholder="主キーじゃない列名を入力してください">
					<!--<select name="col_name2">
						<option value="none2">---</option>
						<option value='name'>name</option>
					</select>-->
				</p>
				<p class="mainkey2"><input type="text" name="value2" size="10" maxlength="20" placeholder="値を入力してください"></p>
				<p><input type="checkbox" name="check2"></p>
				<input type="submit" value="生成">
				</form>
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

	</div>
</div>
<?php
      require_once __DIR__ .'./footer.php';
?>