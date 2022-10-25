<?php
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
       $naiyou=array();
	   $naiyou1=array();
	   $error=array();
	   
	   if(isset($_POST['truncate'])){
           $naiyou[]="Drop table ";
       		if(!empty($_POST['table'])){
           		$naiyou[]=$_POST['table'];
       		}else{
		   		$error[]="テーブル名が入力されていません。";
       		}
	  	}
		else{
		if(isset($_POST['check1'])){
			if(empty($_POST['table'])){
				$error[]="テーブル名が入力されていません。";
			}else{
				$naiyou[]="Delete from ".$_POST['table']." ";
			}
       		if(empty($_POST['col_name10'])){
				$error[]="列名を入力してください";
       		}else if(empty($_POST['value10'])){
				$error[]="値を入力してください";
	    	}else{
           		$naiyou[]="where ".$_POST['col_name10']." ="." ".$_POST['value10']."";
                if(empty($_POST['col_name11'])){
					$naiyou[]="";
				}else if(empty($_POST['value11'])){
					$naiyou[]="";
				}else if(empty($_POST['col_name12'])||empty($_POST['value12'])){
                    $naiyou[]=" and ".$_POST['col_name11']." ="." ".$_POST['value11']."";
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
  					var parent = document.getElementById('formadd2');
  					/*このした5行を削除するとリロードがかかるが値がリセットされるので配列に影響が出ない*/
  					var ipt_id = document.getElementById('col_name20' + target_id);
  					var ipt_id = document.getElementById('value20' + target_id);
  					var tgt_id = document.getElementById(target_id);
  					parent.removeChild(ipt_id);
  					parent.removeChild(tgt_id);	
				}

				function addForm2() {
					if(j<2){
  					var input_data = document.createElement('input');
  						input_data.type = 'text';
  						input_data.name = 'col_name2' + i;
  						input_data.placeholder = 'columnを入力' + i;
  						input_data.innerHTML="&nbsp;";
  					var parent = document.getElementById('formadd2');
  						parent.appendChild(input_data);

  					var input_data = document.createElement('input');
  						input_data.type = 'text';
  						input_data.name = 'value2' + i;
  						input_data.placeholder = 'valueを入力' + i;
  						input_data.innerHTML="&nbsp;";
  					var parent = document.getElementById('formadd2');
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
  					var parent = document.getElementById('formadd');
  					/*このした5行を削除するとリロードがかかるが値がリセットされるので配列に影響が出ない*/
  					var ipt_id = document.getElementById('col_name10' + target_id);
  					var ipt_id = document.getElementById('value10' + target_id);
  					var tgt_id = document.getElementById(target_id);
  					parent.removeChild(ipt_id);
  					parent.removeChild(tgt_id);	
				}

				function addForm1() {
					if(i<2){
  					var input_data = document.createElement('input');
  						input_data.type = 'text';
  						input_data.name = 'col_name1' + i;
  						input_data.placeholder = 'columnを入力' + i;
  						input_data.innerHTML="&nbsp;";
  					var parent = document.getElementById('formadd');
  						parent.appendChild(input_data);

  					var input_data = document.createElement('input');
  						input_data.type = 'text';
  						input_data.name = 'value1' + i;
  						input_data.placeholder = 'valueを入力' + i;
  						input_data.innerHTML="&nbsp;";
  					var parent = document.getElementById('formadd');
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
				<li><a href="select.php">select</a></li>
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
				<p class="addtable">削除するテーブル名:
				<input type="text" name="table" size="10" maxlength="10">
				<!--文字列型を入れるときクォーテーションを入れる案内を書く-->		
				</p>
				<p>全データを削除する<input type="checkbox" name="truncate"></p>
			    <li>columnとvalue:(文字型の場合は""を付ける)</li>
				<li><p id="koumoku">主キーでの削除</p><p>選択</p></li>
				<div id="formadd">
				<li>
                <p id="colname1"><input type="text" name="col_name10" placeholder="columnを入力"></p>
				<p id="mainkey1"><input type="text" name="value10" placeholder="valueを入力"></p>
				<p><input type="checkbox" name="check1"></p>
				</li>
				</div>
				<input type="button" value="フォーム追加" onclick="addForm1()">
				<li>テーブル内の値を細かく削除</li>
				<div id="formadd2">
				<li>
				<p id="colname1"><input type="text" name="col_name20" placeholder="columnを入力"></p>
				<p id="mainkey1"><input type="text" name="value20" placeholder="valueを入力"></p>
				<p><input type="checkbox" name="check2"></p>
				</li>
				</div>
				<input type="button" value="フォーム追加" onclick="addForm2()"><br>
				<input type="submit" class="generatebtn" value="生成">
				</form>
			</ul>

		<div class="kekka-container">
			<p>出力結果</p>
			<li>
			<span id="copy-text">
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
			</span>
			</li>
		</div>
		<button id="button">Copy!</button>
<script>
		const btn = document.getElementById("button"); // button要素取得
		const txt = document.getElementById("copy-text").textContent; // テキスト取得

	btn.addEventListener("click", () => { // ボタンをクリックしたら
 		 navigator.clipboard
   		 .writeText(txt) // テキストをクリップボードに書き込み（＝コピー）
    	.then(
      	(success) => console.log('テキストのコピーに成功'),
      	(error) => console.log('テキストのコピーに失敗')
    	);

	    btn.innerHTML = "OK!"; // ボタンの文字変更
  	    setTimeout(() => (btn.innerHTML = "COPY!"), 1000); // ボタンの文字を戻す
	});
</script>
	</div>
</div>
<?php
      require_once __DIR__ .'./footer.php';
?>