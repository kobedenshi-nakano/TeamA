<?php
if($_SERVER['REQUEST_METHOD'] === 'POST'){
//submitされた検索条件を使いDBに問い合わせる処理
$naiyou=array();
$error=array();

if(!empty($_POST['select'])){
	if(!empty($_POST['colom_name_0'])){		
		if(!empty($_POST['ASsearch_0'])){//<-as句の疑問文
			$naiyou[]="select ".$_POST['colom_name_0']." AS '".$_POST['ASsearch_0']."'";
		}else{
			$naiyou[]="select ".$_POST['colom_name_0'];

		}
	    if(!empty($_POST['colom_name_1'])){
			if(!empty($_POST['ASsearch_1'])){
				$naiyou[]=",".$_POST['colom_name_1']." AS '".$_POST['ASsearch_1']."'";
			}else{
				$naiyou[]=",".$_POST['colom_name_1']." from ".$_POST['select'];
			}
			if(!empty($_POST['colom_name_2'])){
				if(!empty($_POST['ASsearch_2'])){
					$naiyou[]=",".$_POST['colom_name_2']." AS '".$_POST['ASsearch_2']."' from ".$_POST['select'];
				}else{
					$naiyou[]=",".$_POST['colom_name_2']." from ".$_POST['select'];
				}
			/*ここまでAS句*/
			}
			else{
				$naiyou[]=" from ".$_POST['select'];
			}
		}
		else{
			$naiyou[]=" from ".$_POST['select'];
		}
		
	if(!empty($_POST['join_table'])){//<-join句の疑問文
			if(!empty($_POST['join_colom'])){
				$naiyou[]=" join ".$_POST['join_table']." on ".$_POST['select'].".".$_POST['join_colom']." = ".$_POST['join_table'].".".$_POST['join_colom'];
			}else{
				$naiyou[]=" join ".$_POST['join_table'];
			}

		}/*else if(isset($_POST['join_colom'])||empty($_POST['join_table'])){
			$error[]="正しく入力してください。";
			$naiyou[]="";
		}else if(empty($_POST['join_colom'])||isset($_POST['join_table'])){
			$error[]="正しく入力してください。";
			$naiyou="";
		}*/
		if(!empty($_POST['where_0'])){//<-where句の疑問文
			if(!empty($_POST['search_0'])){
				if(!empty($_POST['comparion'])){
					//and orを使う場合
					$naiyou[]=" where ".$_POST['where_0']." ".$_POST['symbol_0']." ".$_POST['search_0']." ".$_POST['comparion']." ".$_POST['where_1']." ".$_POST['symbol_1']." ".$_POST['search_1'];
				}else{
					//=のみ使う場合
                    $naiyou[]=" where ".$_POST['where_0']." ".$_POST['symbol_0']." ".$_POST['search_0'];
				}
			}
		}
			/*if(!empty($_POST['search_0'])){
				//比較演算子を使いながらandを使う
				$naiyou[]=" where ".$_POST['where_0'].$_POST['searchh'].$_POST['search_0'];
			}
			if(!empty($_POST['search_0'])){
				//比較演算子を使いながらandを使う
				$naiyou[]=" where ".$_POST['where_0'].$_POST['searchh'].$_POST['search_0'];
			}*/
			else{
				$naiyou[]="  ";
			}

		}
		else{
			$naiyou[]="select * from ".$_POST['select'];
			if(!empty($_POST['where_0'])){//<-where句の疑問文
				if(!empty($_POST['search_0'])){
					if(!empty($_POST['comparion'])){
						//and orを使う場合
						$naiyou[]=" where ".$_POST['where_0']." ".$_POST['symbol']." ".$_POST['search_0']." ".$_POST['comparion']." ".$_POST['where_1']." ".$_POST['symbol_1']." ".$_POST['search_1'];
					}else{
						//=のみ使う場合
						$naiyou[]=" where ".$_POST['where_0']." ".$_POST['symbol']." ".$_POST['search_0'];
					}
				}
			}
		}
		$naiyou[]=";";
		if((!empty($_POST['ASsearch_0']))&&((!empty($_POST['join_table']))||(!empty($_POST['join_colom'])))){//<-as句の疑問文
			$naiyou[]="";
			$error[]="併用できません。";
		}
    }
	else{
		$error[]="テーブル名を入力してください。";
	}
}

/*
else if(isset($_POST['colom_name_1'])&&!($_POST['group_0']==="none")){
			if(isset($_POST['colom_name_2'])&&!($_POST['group_0']==="none")){
				$naiyou[]="select ".$_POST['group_0']." (".$_POST['colom_name_0']."), ".$_POST['group_0']." (".$_POST['colom_name_1']."), ".$_POST['group_0']." (".$_POST['colom_name_2'].") from ".$_POST['select'].";";
			}
			else{
				$naiyou[]="select ".$_POST['group_0']." (".$_POST['colom_name_0']."),".$_POST['group_0']." (".$_POST['colom_name_1'].") from ".$_POST['select'].";";
			}
}else{
	$naiyou[]="select ".$_POST['colom_name_0']." from ".$_POST['select'].";";
	if(!($_POST['group_0']==="none")){
		$naiyou[]= "select ".$_POST['group_0']." (".$_POST['colom_name_0'].") "." from ".$_POST['select'].";";
	}
}


if(!empty($_POST['where_0']) || !empty($_POST['search_0'])){
	$naiyou[]=" where ".$_POST['where_0']."=".$_POST['search_0'];
}


if(!empty($_POST['group'])){
	$naiyou[]=" group by ".$_POST['group'];
}
*/



?>

<?php
    require_once __DIR__ .'./header.php';
	/*require_once __DIR__ .'./subnav.php';*/
?>
<link rel="stylesheet" href="../css/home.css">
<link rel="stylesheet" href="../css/subnav.css">
<link rel="stylesheet" href="../css/createuser.css">
<link rel="stylesheet" href="../css/select.css">
<div class="main-contents">
	<div class="main-contents-container">
		<div class="column1">
			<ul class="subnav">
				<li><a href="select.php" style="color:red">select</a></li>
				<li><a href="update.php">update</a></li>
				<li><a href="delete.php">delete</a></li>
				<li><a href="insert.php">insert</a></li>
				<li><a href="createuser01.php">create user</a></li>
				<li><a href="createbun.php">create table</a></li>
			</ul>
</div>

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
                    
                    <li>参照するテーブル名:<input type="text" name="select" size="10" maxlength="10"></li>
                        
                        <table>
                            <tr>
                            <tbody>
                            <li>column(文字型の場合は""を付ける)</li>
                                <div id="colom_area">
                                <input type="text" name="colom_name_0" placeholder="カラム名"></li>
  						        <!--<button id="0" onclick="deleteBtn(this)">削除</button>-->
					            </div>
						        <input type="button" value="フォーム追加" onclick="addselect()">
                                </tbody>
                            </tr>
							
							<!--<li>集合関数の指定:<select name='group_0'>
								<option value='none' >--</option>
                            	<option value='SUM' >総和</option>
								<option value='MAX' >最大値</option>
								<option value="MIN">最小値</option>
								<option value="AVG">平均値</option>
								<option value="COUNT">カウント</option>
					            </select>
							<li>-->
						
						<!-- as句入力 -->
						<li>as句の指定</li>
						<div id=ASarea>
							<input type="text" name="ASsearch_0"  placeholder="別名">
						</div>
						<input type="button" value="フォーム追加" onclick="addAS()">
				
						<!-- as句入力ここまで -->

						<!-- join句入力 -->
						<li>join句の指定</li>
						<div id="join">
							<input type="text" name="join_colom" size="20" maxlength="20" placeholder="結合されるカラム">
							<input type="text" name="join_table" size="20" placeholder="結合したいテーブル">
						</div>
						
						<!--join句ここまで -->

						<!-- where句入力 -->
						<li>where句の指定</li>
							<div id="where">
								<input type="text" name="where_0" id="where1" size="20" maxlength="20" placeholder="条件にしたいカラム名">
								<select name="symbol_0">
									<option value="="> = </option>
                                    <option value=">"> > </option>
                                    <option value="<"> < </option>
		                            <option value=">="> >= </option>
									<option value="<="> <= </option>
					            </select>
								<input type="text" name="search_0" size="20" placeholder="カラム名検索内容">
								<select name="comparion">
								    <option value=""> </option>
									<option value="and"> and </option>
                                    <option value="or"> or </option>
                                    <option value="between"> between </option>
		                            <option value="in"> in </option>
									<option value="like"> like </option>
					            </select>
								<input type="text" name="where_1" id="where1" size="20" maxlength="20" placeholder="条件にしたいカラム名2">
								<select name="symbol_1">
									<option value="="> = </option>
                                    <option value=">"> > </option>
                                    <option value="<"> < </option>
		                            <option value=">="> >= </option>
									<option value="<="> <= </option>
					            </select>
								<input type="text" name="search_1" size="20" placeholder="カラム名検索内容2">
							</div>
						
						<!-- where句ここまで-->

							<li>group by句の指定:<input type="text" name="group"  size="10" maxlength="10" placeholder="半角のみ"></li>	

				
			        <li><input type="submit" class="generatebtn" value="生成"></li>
                    </table>
                    </form>
				</ul>

		</ul>

		    <div class="kekka-container">
				<p>出力結果</p>
		        <li id="text">
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
				<button id="button">COPY!</button>
		    </div>
		</ul>
	</div>
<?php
    require_once __DIR__ .'./footer.php';
?>


<script type="text/javascript">
 const btn = document.getElementById("button"); // button要素取得
		const txt = document.getElementById("text").textContent; // テキスト取得

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



	var i = 1 ;
function addAS() {//AS句追加処理

if(i<=2){
	/*
   var d = document;
   var link = d.createElement('link').getElementsByTagName('input');
      link.href = '../css/select.css';
	  link.rel = 'stylesheet';
	  link.type = 'text/css';
   var parent = document.getElementById('ASarea');
       parent.appendChild(link);
*/

   var input_data = document.createElement('input');
 	   input_data.type = 'text';
       input_data.name = 'ASsearch_' + i;
       input_data.placeholder = '別名' + i;
   var parent = document.getElementById('ASarea');
       parent.appendChild(input_data);

if(i==2){
  var button_data = document.createElement('button');
  button_data.name = i;
  button_data.onclick = function(){deleteBtn(this);}
  button_data.innerHTML = '削除';
  var input_area = document.getElementById(input_data.name);
  parent.appendChild(button_data);
}
  //ここまでAS句処理
  
}
  

  i++;
}

var k = 1 ;
function addselect() {//カラム追加処理
if(k<=2){
	/*
   var d = document;
   var link = d.createElement('link').getElementsByTagName('input');
      link.href = '../css/select.css';
	  link.rel = 'stylesheet';
	  link.type = 'text/css';
   var parent = document.getElementById('ASarea');
       parent.appendChild(link);
*/

   var input_data = document.createElement('input');
 	   input_data.type = 'text';
       input_data.name = 'colom_name_' + k;
       input_data.placeholder = 'カラム' + k;
   var parent = document.getElementById('colom_area');
       parent.appendChild(input_data);

if(k==2){
  var button_data = document.createElement('button');
  button_data.name = k;
  button_data.onclick = function(){deleteBtn(this);}
  button_data.innerHTML = '削除';
  var input_area = document.getElementById(input_data.name);
  parent.appendChild(button_data);
}
  //ここまでカラム処理
  
}
  

  k++;
}
</script>