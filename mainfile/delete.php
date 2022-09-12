<?php
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
       $naiyou=array();
	   $naiyou1=array();
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
			if(empty($_POST['table'])){
				$error[]="テーブル名が入力されていません。";
			}else{
				$naiyou[]="Delete from '".$_POST['table']."' ";
			}
       		if(empty($_POST['col_name10'])){
				$error[]="列名を入力してください";
       		}else if(empty($_POST['value10'])){
				$error[]="値を入力してください";
	    	}else{
           		$naiyou[]="where ".$_POST['col_name10']." ="." '".$_POST['value10']."'";
                if(empty($_POST['col_name11'])){
					$naiyou[]="";
				}else if(empty($_POST['value11'])){
					$naiyou[]="";
				}else if(empty($_POST['col_name12'])||empty($_POST['value12'])){
                    $naiyou[]=" and ".$_POST['col_name11']." ="." '".$_POST['value11']."'";
				}else{
					
				}
				$naiyou[]=';<br>';	
       		}	    
		}
		//上の部分と下の部分を両方選んだ時に出力画面に表示されない問題
		if(isset($_POST['check2'])){
			if(empty($_POST['table'])){
				$error[]="テーブル名が入力されていません。";
			}else{
				$naiyou1[]="Delete from '".$_POST['table']."' ";
			}
			if(empty($_POST['col_name20'])){
				$error[]="列名を入力してください";
       		}else if(empty($_POST['value20'])){
				$error[]="値を入力してください";
	    	}else{
           		$naiyou1[]="where ".$_POST['col_name20']." ="." '".$_POST['value20']."'";
                if(empty($_POST['col_name21'])){
					$naiyou1[]="";
				}else if(empty($_POST['value21'])){
					$naiyou1[]="";
				}else if(empty($_POST['col_name22'])||empty($_POST['value22'])){
                    $naiyou1[]="and ".$_POST['col_name21']." ="." '".$_POST['value21']."'";
				}else{
					
				}	
       		}
			$naiyou1[]=';<br>';
		}
	}
}
?>
<?php
      require_once __DIR__ .'./header.php';
	  /*require_once __DIR__ .'./subnav.php';*/
?>
<script>
				var j=1;
				function deleteBtn(target1) {
  					var target_id = target1.id;
  					var parent = document.getElementById('col_data2');
  					/*このした5行を削除するとリロードがかかるが値がリセットされるので配列に影響が出ない*/
  					var ipt_id = document.getElementById('col_name20' + target_id);
  					var ipt_id = document.getElementById('value20' + target_id);
  					var tgt_id = document.getElementById(target_id);
  					parent.removeChild(ipt_id);
  					parent.removeChild(tgt_id);	
				}

				function addform2() {
					if(j<2){
  					var input_data = document.createElement('input');
  						input_data.type = 'text';
  						input_data.name = 'col_name2' + i;
  						input_data.placeholder = '主キーじゃない列名を入力してください' + i;
  						input_data.innerHTML="&nbsp;";
  					var parent = document.getElementById('col_data2');
  						parent.appendChild(input_data);

  					var input_data = document.createElement('input');
  						input_data.type = 'text';
  						input_data.name = 'value2' + i;
  						input_data.placeholder = '値を入力' + i;
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
				var i=1;
				function deleteBtn(target) {
  					var target_id = target.id;
  					var parent = document.getElementById('col_data1');
  					/*このした5行を削除するとリロードがかかるが値がリセットされるので配列に影響が出ない*/
  					var ipt_id = document.getElementById('col_name10' + target_id);
  					var ipt_id = document.getElementById('value10' + target_id);
  					var tgt_id = document.getElementById(target_id);
  					parent.removeChild(ipt_id);
  					parent.removeChild(tgt_id);	
				}

				function addform() {
					if(i<2){
  					var input_data = document.createElement('input');
  						input_data.type = 'text';
  						input_data.name = 'col_name1' + i;
  						input_data.placeholder = '主キーに当たる列名を入力してください' + i;
  						input_data.innerHTML="&nbsp;";
  					var parent = document.getElementById('col_data1');
  						parent.appendChild(input_data);

  					var input_data = document.createElement('input');
  						input_data.type = 'text';
  						input_data.name = 'value1' + i;
  						input_data.placeholder = '値を入力' + i;
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
<link rel="stylesheet" href="../css/home.css">
<link rel="stylesheet" href="../css/delete.css">
<link rel="stylesheet" href="../css/subnav.css">

<div class="main-contents">
	<div class="main-contents-container">
		<div class="column1">
			<ul class="subnav">
				<li><a href="update.php">update</a></li>
				<li><a href="delete.php" style="color:red">delete</a></li>
				<li><a href="insert.php">insert</a></li>
				<li><a href="createuser01.php">create user</a></li>
				<li><a href="createbun.php">create table</a></li>
			</ul>
</div>

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
				<input type="text" name="col_name10" size="20" maxlength="20" placeholder="主キーに当たる列名を入力してください">
				</p>
				<p class="mainkey1"><input type="text" name="value10" size="20" maxlength="20" placeholder="値を入力してください"></p><br>
                </div>
				<!--<input type="button" value="フォーム追加" onclick="addform()">-->
				<p><input type="checkbox" name="check1"></p>
				<input type="button" value="フォーム追加" onclick="addform()">
				<p class="koumoku2">テーブル内の値を細かく削除</p>
				<div id="col_data2">
				<p class="colname1">
				<input type="text" name="col_name20" size="20" maxlength="20" placeholder="主キーじゃない列名を入力してください">
				</p>
				<p class="mainkey2"><input type="text" name="value20" size="20" maxlength="20" placeholder="値を入力してください"></p>
			    </div>
				<!--<input type="button" value="フォーム追加" onclick="addform2()">-->	
				<p><input type="checkbox" name="check2"></p>
				<input type="button" value="フォーム追加" onclick="addform2()">
				<input type="submit" value="生成">
				<!--<p><input type="checkbox" name="check1"></p>
				<p><input type="checkbox" name="check2"></p>-->
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
					if(isset($naiyou1)){
						foreach($naiyou1 as $value1){
							echo $value1;
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