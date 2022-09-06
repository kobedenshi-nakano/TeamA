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
	  	}
		else{
		if(isset($_POST['check1'])){
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
		}
		else if(isset($_POST['check2'])){
			if(!empty($_POST['table'])){
				$naiyou[]="Delete from '".$_POST['table']."' ";
			}else{
				$error[]="テーブル名が入力されていません。";
			}
       		if(!empty($_POST['col_name2'])){
           		$naiyou[]="where '".$_POST['col_name2']."' =";
       		}else{
           		$error[]="列名を入力してください";
       		}
	    	if(!empty($_POST['value2'])){
				$naiyou[]=" ".$_POST['value2']."";
	    	}else{
				$error[]="値を入力してください";
	    	}
		}
    	else{
			$error[]="選択にチェックしてください";
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
				</p>
				<p>全データを削除する<input type="checkbox" name="truncate"></p>
			
				<p class="koumoku">主キーでの削除</p>
				<p>選択</p>
				<div id="col_data1">
                <p class="colname1">
				<input type="text" name="col_name1" size="20" maxlength="20" placeholder="主キーに当たる列名を入力してください">
				</p>
				<p class="mainkey1"><input type="text" name="value1" size="20" maxlength="20" placeholder="値を入力してください"></p>
                </div>
				<input type="button" value="フォーム追加" onclick="addform()">
                <script>
				var i=1;
				function deleteBtn(target) {
  					var target_id = target.id;
  					var parent = document.getElementById('col_data1');
  					/*このした5行を削除するとリロードがかかるが値がリセットされるので配列に影響が出ない*/
  					var ipt_id = document.getElementById('inputform_' + target_id);
  					var ipt_id = document.getElementById('inputformnext_' + target_id);
  					var tgt_id = document.getElementById(target_id);
  					parent.removeChild(ipt_id);
  					parent.removeChild(tgt_id);	
				}

				function addform() {
					if(i<=2){
  					var input_data = document.createElement('input');
  						input_data.type = 'text';
  						input_data.name = 'col_name1' + i;
  						input_data.placeholder = 'カラム名' + i;
  						input_data.innerHTML="&nbsp;";
  					var parent = document.getElementById('col_data1');
  						parent.appendChild(input_data);

  					var input_data = document.createElement('input');
  						input_data.type = 'text';
  						input_data.name = 'value1' + i;
  						input_data.placeholder = '値を入力(value)' + i;
  						input_data.innerHTML="&nbsp;";
  					var parent = document.getElementById('col_data1');
  						parent.appendChild(input_data);

  					var button_data = document.createElement('button');
  						button_data.name = i;
  						button_data.onclick = function(){deleteBtn(this);}
  						button_data.innerHTML = "&nbsp;";
  						button_data.innerHTML = '削除';
  					var input_area = document.getElementById(input_data.name);
  						parent.appendChild(button_data);
					}
  					i++;
				}
				</script>
				<p><input type="checkbox" name="check1"></p>
				<p class="koumoku2">テーブル内の値を細かく削除</p>
				<div id="col_data2">
				<p class="colname1">
				<input type="text" name="col_name2" size="20" maxlength="20" placeholder="主キーじゃない列名を入力してください">
				</p>
				<p class="mainkey2"><input type="text" name="value2" size="20" maxlength="20" placeholder="値を入力してください"></p>
			    </div>
				<input type="button" value="フォーム追加" onclick="addform2()">
				<script>
				var j=1;
				function deleteBtn(target1) {
  					var target_id = target1.id;
  					var parent = document.getElementById('col_data2');
  					/*このした5行を削除するとリロードがかかるが値がリセットされるので配列に影響が出ない*/
  					var ipt_id = document.getElementById('inputform_' + target_id);
  					var ipt_id = document.getElementById('inputformnext_' + target_id);
  					var tgt_id = document.getElementById(target_id);
  					parent.removeChild(ipt_id);
  					parent.removeChild(tgt_id);	
				}

				function addform2() {
					if(j<=2){
  					var input_data = document.createElement('input');
  						input_data.type = 'text';
  						input_data.name = 'col_name2' + i;
  						input_data.placeholder = 'カラム名' + i;
  						input_data.innerHTML="&nbsp;";
  					var parent = document.getElementById('col_data2');
  						parent.appendChild(input_data);

  					var input_data = document.createElement('input');
  						input_data.type = 'text';
  						input_data.name = 'value2' + i;
  						input_data.placeholder = '値を入力(value)' + i;
  						input_data.innerHTML="&nbsp;";
  					var parent = document.getElementById('col_data2');
  						parent.appendChild(input_data);

  					var button_data = document.createElement('button');
  						button_data.name = j;
  						button_data.onclick = function(){deleteBtn(this);}
  						button_data.innerHTML = "&nbsp;";
  						button_data.innerHTML = '削除';
  					var input_area = document.getElementById(input_data.name);
  						parent.appendChild(button_data);
					}
  					j++;
				}
				</script>
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