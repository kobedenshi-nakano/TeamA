<?php
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
       $naiyou=array();
	   $error=array();
	   if(empty($_POST['table'])){
           $error[]="テーブル名が入力されていません。";
	   }else{
           $naiyou[]="update ".$_POST['table'];
	   }

	   if(empty($_POST['inputform_0'])){
           $error[]="更新する列が入力されていません。";
	   }else{
           $naiyou[]=" set ".$_POST['inputform_0'];
	   }

	   if(empty($_POST['inputformnext_0'])){
		$error[]="更新する列の値が入力されていません。";
	   }else{
		$naiyou[]=" = ".$_POST['inputformnext_0'];
	   }

	   if(isset($_POST['inputform_1'])){
		$naiyou[]=",".$_POST['inputform_1'];
		}

		if(isset($_POST['inputformnext_1'])){
	 	$naiyou[]=" = ".$_POST['inputformnext_1'];
		}

	   if(!empty($_POST['where'])){
		 $naiyou[]=" where ".$_POST['inputform_0']."=".$_POST['where'];
	   }

	   if(!($_POST['order']==="none")){
		$naiyou[]=" order by ".$_POST['inputform_0']." ".$_POST['order'];
		}

	   if(!empty($_POST['limit'])){
		$naiyou[]=" limit ".$_POST['limit'];
	   }
   }
?>
<?php
      require_once __DIR__ .'./header.php';
	  require_once __DIR__ .'./subnav.php';
?>
<link rel="stylesheet" href="../css/home.css">
<link rel="stylesheet" href="../css/createuser.css">

		<div class="column2">
			<ul class="news-contents">
				<?php if(!empty($error)):?>
			    <ul class="error_list">
                     <?php
					     foreach($error as $value){
							echo $value;
							echo '<br>';
						 }
					 ?>
				</ul>
				<?php endif; ?>
			<ul class="formnav">
		        <form method="post" action="">
				    <li>テーブル名:<input type="text" name="table" size="10" maxlength="10"></li>
					<!--
					<input type="text" id="sampleUserInput" placeholder="更新する列">
					<input type="button" value="追加" onclick="AddStringToTextarea();">
					<textarea cols="30" rows="6" id="sampleInputedList" readonly>
						
					</textarea>
						-->
				
					<div id="form_area">
  						<input type="text" name="inputform_0" placeholder="列の名前">
						<input type="text" name="inputformnext_0" placeholder="更新する列の値">
  						<!--<button id="0" onclick="deleteBtn(this)">削除</button>-->
					</div>
						<input type="button" value="フォーム追加" onclick="addForm()">
				
			        <li>where句の指定:<input type="text" name="where" size="20" maxlength="20" placeholder="最初の列名のみ適用"></li>
					<li>order by句の指定:<select name='order'>
											<option value='none' >--</option>
                            				<option value='ASC' >昇順</option>
											<option value='DESC' >降順</option>
										</select><li>
					<li>limit句:<input type="text" name="limit"  size="10" maxlength="10" placeholder="半角のみ"></li>	
			        <li><input type="submit" value="生成"></li>
		        </form>
				<!--<input type="button" value="行を追加" id="coladd" onclick="coladd()">
        
					<table id="table" border="1">
   					 <tr>
        				<td>
            				SAMPLE FOR TABLE-ROWADD
       					 </td>
        				<td>
           					 SAMPLE FOR TABLE-ROWDELETE
        				</td>
    				 </tr>
					</table>-->
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
			